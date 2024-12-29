<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
      //Dynamic Delete alart
        $('body').on('click', '.delete-item', function(event){
                event.preventDefault();

                let deleteUrl = $(this).attr('href');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            type: 'DELETE',
                            url: deleteUrl,

                            success: function(data){

                                if(data.status == 'success'){
                                    Swal.fire(
                                        'Deleted!',
                                        data.message,
                                        'success'
                                    )
                                    window.location.reload();
                                }else if (data.status == 'error'){
                                    Swal.fire(
                                        'Cant Delete',
                                        data.message,
                                        'error'
                                    )
                                }
                            },
                            error: function(xhr, status, error){
                                console.log(error);
                            }
                        })
                    }
                })
            })

        // add product into cart
        $(document).on('submit', '.shopping-cart-form', function(e) {
            e.preventDefault();
            console.log($(this));
            let formData = $(this).serialize();
            let from = $(this).data('from') || '';
            let wishlistId =$(this).data('wishlist') || '';
            
            $.ajax({
                method: 'POST',
                data: formData,
                url: "{{ route('add-to-cart') }}",
                success: function(data) {
                    if(data.status === 'success'){
                        getCartCount()
                        fetchSidebarCartProducts()
                        $('.mini_cart_actions').removeClass('d-none');
                        if(from === 'wishlist') {
                            console.log(formData);
                            const params = new URLSearchParams(formData);
                            removeFromWishlist(wishlistId);
                        }
                        toastr.success(data.message);
                    }else if (data.status === 'error'){
                        toastr.error(data.message);
                    }
                },
                error: function(data) {

                }
            })
        })
        function removeFromWishlist(wishlistId) {
            $.ajax({
                method: 'POST',
                data: {'id':wishlistId},
                url: "{{ route('user.wishlist.destory-ajax') }}",
                success: function(data) {
                    if(data.status === 'success'){
                        $('#wishlist_count').text($('#wishlist_count').text() != 0 ? $('#wishlist_count').text() - 1 : 0 )
                        $('#mobile-wishlist_count').text($('#wishlist_count').text() != 0 ? $('#wishlist_count').text() - 1 : 0)

                        //update the html 
                         $("#"+wishlistId).remove();   
                    }else if (data.status === 'error'){
                        toastr.error(data.message);
                    }
                },
                error: function(data) {

                }
            })   
        }
        function getCartCount() {
            $.ajax({
                method: 'GET',
                url: "{{ route('cart-count') }}",
                success: function(data) {
                    $('#cart-count').text(data);
                    $('#mobile-cart-count').text(data);
                },
                error: function(data) {
                    console.log("Error fetching the cart count:",data.messages);
                }
            })
        }

        function fetchSidebarCartProducts() {
            $.ajax({
                method: 'GET',
                url: "{{ route('cart-products') }}",
                success: function(data) {
                    console.log(data);
                    $('.minicart-item-wrapper ul').html("");
                    var html = '';
                    for (let item in data) {
                        let product = data[item];
                        html += `
                        <li id="mini_cart_${product.rowId}" class="minicart-item" id="mini_cart_cbe9bd618baafef1d8d3458ec16ab937">
                            <div class="minicart-thumb">
                                <a href="{{ url('product-detail') }}/${product.options.slug}">
                                    <img src="{{ asset('/') }}${product.options.image}" alt="product">
                                </a>
                            </div>
                            <div class="minicart-content">
                                <h3 class="product-name">
                                    <a href="{{ url('product-detail') }}/${product.options.slug}">${product.name}</a>
                                </h3>
                                    <span class="cart-quantity">${product.qty}
                                    <strong class="">×</strong>
                                    </span>
                                    <span>{{ $settings->currency_icon }}${product.price}</span>
                                    <div>
                                        <small>Variants total: {{ $settings->currency_icon }}${product.options.variants_total}</small>
                                    </div>
                                    <div>
                                    </div>
                                </p>
                            </div>
                            <button class="minicart-remove remove_sidebar_product" data-id="${product.rowId}" href="">
                            <i class="pe-7s-close"></i></button>
                        </li>
                        `
                    }

                    $('.minicart-item-wrapper ul').html(html);

                    getSidebarCartSubtoal();

                },
                error: function(data) {

                }
            })
        }

        // reomove product from sidebar cart
        $('body').on('click', '.remove_sidebar_product', function(e) {
            e.preventDefault()
            let rowId = $(this).data('id');
            $.ajax({
                method: 'POST',
                url: "{{ route('cart.remove-sidebar-product') }}",
                data: {
                    rowId: rowId
                },
                success: function(data) {
                    let productId = '#mini_cart_' + rowId;
                    $(productId).remove()

                    getSidebarCartSubtoal()

                    if ($('.minicart-item-wrapper').find('li').length === 0) {
                        $('.mini_cart_actions').addClass('d-none');
                        $('.minicart-item-wrapper').html(
                            '<ul><li class="text-center">Oops, nothing here yet!</li></ul>');
                    }
                    toastr.success(data.message)
                    getCartCount()
                },
                error: function(data) {
                    console.log(data);
                    getCartCount()
                }
            })
        })

        // get sidebar cart sub total
        function getSidebarCartSubtoal() {
            $.ajax({
                method: 'GET',
                url: "{{ route('cart.sidebar-product-total') }}",
                success: function(data) {
                    $('#mini_cart_subtotal').text("{{ $settings->currency_icon }}" + data);
                },
                error: function(data) {

                }
            })
        }

        // add product to wishlist
        $(document).on('click','.add_to_wishlist',function(e){
            e.preventDefault();
            let id = $(this).data('id');

            $.ajax({
                method: 'GET',
                url: "{{route('wishlist.store')}}",
                data: {id:id},
                success:function(data){
                    if(data.status === 'success'){
                        $('#wishlist_count').text(data.count)
                        $('#mobile-wishlist_count').text(data.count)
                        toastr.success(data.message);
                    }else if(data.status === 'error'){
                        toastr.error(data.message);
                    }
                },
                error: function(data){
                    console.log(data);
                }
            })
        })
        // $('.add_to_wishlist').on('click', function(e){
        //     e.preventDefault();
        //     let id = $(this).data('id');

        //     $.ajax({
        //         method: 'GET',
        //         url: "{{route('wishlist.store')}}",
        //         data: {id:id},
        //         success:function(data){
        //             if(data.status === 'success'){
        //                 $('#wishlist_count').text(data.count)
        //                 $('#mobile-wishlist_count').text(data.count)
        //                 toastr.success(data.message);
        //             }else if(data.status === 'error'){
        //                 toastr.error(data.message);
        //             }
        //         },
        //         error: function(data){
        //             console.log(data);
        //         }
        //     })
        // })

        // move product to wishlist
        $(document).on('click','.move_to_wishlist',function(e){
            e.preventDefault();
            let _that = $(this);
            let id = _that.data('id');
            _that.parents('.minicart-item').find('.remove_sidebar_product').trigger('click');

            $.ajax({
                method: 'GET',
                url: "{{route('wishlist.store')}}",
                data: {id:id},
                success:function(data){
                    if (data.status === 'success'){
                        $('#wishlist_count').text(data.count);
                        $('#mobile-wishlist_count').text(data.count);
                        
                        getCartCount();
                        fetchSidebarCartProducts();
                        toastr.success(data.message);
                    } else if (data.status === 'error'){
                        toastr.error(data.message);
                    }
                },
                error: function(data){
                    console.log(data);
                }
            });
            
        })
        // $('.move_to_wishlist').on('click', function(e){
        //     e.preventDefault();
        //     let id = $(this).data('id');

        //     $.ajax({
        //         method: 'GET',
        //         url: "{{route('wishlist.store')}}",
        //         data: {id:id},
        //         success:function(data){
        //             if (data.status === 'success'){
        //                 $('#wishlist_count').text(data.count)
        //                 $('#mobile-wishlist_count').text(data.count)
        //                 toastr.success(data.message);
        //             } else if (data.status === 'error'){
        //                 toastr.error(data.message);
        //             }
        //         },
        //         error: function(data){
        //             console.log(data);
        //         }
        //     });
        //     $(this).parents('.minicart-item').find('.remove_sidebar_product').trigger('click');
        // })

        // newsletter
        $('#newsletter').on('submit', function(e){
            e.preventDefault();
            let data = $(this).serialize();
            console.log(data);

            $.ajax({
                method: 'POST',
                url: "{{route('newsletter-request')}}",
                data: data,
                beforeSend: function(){
                    $('.subscribe_btn').text('Loading...');
                },
                success: function(data){
                    if(data.status === 'success'){
                        $('.subscribe_btn').text('Subscribe');
                        $('.newsletter_email').val('');
                        toastr.success(data.message);

                    }else if(data.status === 'error'){

                        $('.subscribe_btn').text('Subscribe');
                        toastr.error(data.message);
                    }
                },
                error: function(data){
                    let errors = data.responseJSON.errors;
                    if(errors){
                        $.each(errors, function(key, value){
                            toastr.error(value);
                        })
                    }
                    $('.subscribe_btn').text('Subscribe');
                }
            })
        })


        $('.show_product_modal').on('click', function(){ 
            let id = $(this).data('id');

            $.ajax({
                mehtod: 'GET',
                url: '{{ route("show-product-modal", ":id" ) }}'.replace(":id", id),
                beforeSend: function(){
                    $('.product-details-inner').html('<span class="loader"></span>')
                },
                success: function(response){
                    $('.product-details-inner').html(response)
                },
                error: function(xhr, status, error){

                },
                complete: function(){

                }
            })
        })

    })
</script>
