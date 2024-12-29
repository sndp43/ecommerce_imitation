        <!-- featured product area start -->
@php
    $popularCategories = $popularCategory ? json_decode($popularCategory->value, true) : [];
     //dd($popularCategories)
@endphp
        <section class="feature-product section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 class="title">Popular Categories</h2>
                            <p class="sub-title">Add featured products to weekly lineup</p>
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-carousel-4_2 slick-row-10 slick-arrow-style">
                        @php
                            $products = [];
                        @endphp
                        @foreach ($popularCategories as $key => $popularCategory)
                        @php
                            $lastKey = [];

                            foreach($popularCategory as $key => $category){
                                if($category === null ){
                                    break;
                                }
                                $lastKey = [$key => $category];
                            }

                            if(array_keys($lastKey)[0] === 'category'){
                                $category = \App\Models\Category::find($lastKey['category']);
                                $products[] = \App\Models\Product::withAvg('reviews', 'rating')
                                ->with(['variants', 'category', 'productImageGalleries'])
                                ->where('category_id', $category->id)->orderBy('id', 'DESC')->take(12)->get();
                            }elseif(array_keys($lastKey)[0] === 'sub_category'){
                                $category = \App\Models\SubCategory::find($lastKey['sub_category']);
                                $products[] = \App\Models\Product::withAvg('reviews', 'rating')
                                ->with(['variants', 'category', 'productImageGalleries'])
                                ->where('sub_category_id', $category->id)->orderBy('id', 'DESC')->take(12)->get();

                            }else {
                                $category = \App\Models\ChildCategory::find($lastKey['child_category']);
                                $products[] = \App\Models\Product::withAvg('reviews', 'rating')
                                ->with(['variants', 'category', 'productImageGalleries'])
                                ->where('child_category_id', $category->id)->orderBy('id', 'DESC')->take(12)->get();

                            }

                        @endphp
                        @endforeach     
                        @foreach ($products as $key => $product)
                            @foreach ($product as $item)
                                <!-- product item start -->
                                <div class="product-item">
                                    <figure class="product-thumb">
                                        <a href="{{route('product-detail', $item->slug)}}">
                                            <img class="pri-img" src="{{asset($item->thumb_image)}}" alt="product">
                                            <img class="sec-img" src="{{asset($item->thumb_image)}}" alt="product">
                                        </a>
                                        <div class="button-group">
                                                    <a  
                                                    data-bs-toggle="tooltip"
                                                    title="Add to Wishlist" 
                                                    href="#"
                                                    class="add_to_wishlist" 
                                                    data-id="{{$item->id}}">
                                                        <i class="pe-7s-like"></i>
                                                    </a>
                                                    <a href="#" 
                                                        data-bs-toggle="modal"  data-bs-target="#quick_view" class="show_product_modal" 
                                                        data-id="{{ $item->id }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="left" 
                                                        title="Quick View">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </div>
                                        <div class="cart-hover">
                                        <form class="shopping-cart-form">
                                                    <input type="hidden" name="product_id" value="{{$item->id}}">
                                                    <input class="" name="qty" type="hidden" min="1" max="100" value="1">
                                                    <button class="btn btn-cart add_cart" type="submit">add to cart</button>
                                                </form>
                                        </div>
                                    </figure>
                                    <div class="product-caption text-center">
                                        <h6 class="product-name">
                                            <a href="{{route('product-detail', $item->slug)}}">{!!limitText($item->name, )!!}</a>
                                        </h6>
                                        <div class="price-box">
                                        @if (checkDiscount($item))
                                            <span class="price-regular">{{$settings->currency_icon}}{{$item->offer_price}} <del>{{$settings->currency_icon}}{{$item->price}}</del></span>
                                        @else
                                            <p class="wsus__tk"></p>
                                            <span class="price-old">{{$settings->currency_icon}}{{$item->price}}</span>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- product item end -->
                            @endforeach
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- featured product area end -->