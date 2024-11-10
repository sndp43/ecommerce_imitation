<!-- My Account Page Start -->
<div class="myaccount-page-wrapper">
    <!-- My Account Tab Menu Start -->
    <div class="row">
        <div class="col-lg-3 col-md-4">
            <div class="myaccount-tab-menu nav" role="tablist">
                <a href="{{route('user.dashboard')}}" class="{{setActive(['user.dashboard'])}}" ><i class="fa fa-dashboard"></i>
                    Dashboard</a>
                    @if (auth()->user()->role === 'vendor')
                <a href="{{route('vendor.dashbaord')}}" class="{{setActive(['vendor.dashbaord'])}}" ><i class="fas fa-tachometer"></i>Go to Vendor Dashboard</a>
                    @endif
                <a href="{{route('user.orders.index')}}" class="{{setActive(['user.orders.*'])}}"><i class="fa fa-cart-arrow-down"></i>
                    Orders</a>
                <a href="{{route('user.review.index')}}" class="{{setActive(['user.review.*'])}}"><i class="fa fa-star"></i> Reviews</a>
                <!-- <a href="#download"><i class="fa fa-cloud-download"></i>
                    Download</a> -->
                <!-- <a href="#payment-method"><i class="fa fa-credit-card"></i>
                    Payment
                    Method</a> -->
                <a class="{{setActive(['user.address.*'])}}" href="{{route('user.address.index')}}"><i class="fa fa-map-marker"></i>
                    address</a>
                    <!-- @if (auth()->user()->role !== 'vendor')
                <a class="{{setActive(['user.vendor-request.*'])}}" href="{{route('user.vendor-request.index')}}"><i class="far fa-user"></i> Request to be vendor</a>
                    @endif -->
                <a class="{{setActive(['user.profile'])}}" href="{{route('user.profile')}}"><i class="fa fa-user"></i> Account
                    Details</a>
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{route('logout')}}" onclick="event.preventDefault();
                    this.closest('form').submit();"><i class="fa fa-sign-out"></i> Logout</a>
                </form>
            </div>
        </div>
        <!-- My Account Tab Menu End -->

        <!-- My Account Tab Content Start -->
        <div class="col-lg-9 col-md-8">
            <div class="tab-content" id="myaccountContent">
                <!-- Single Tab Content Start -->
                <div class="tab-pane fade {{$activeTab === 'dashboard' ? 'active show' : ''}}"" id="dashboad" role="tabpanel">
                    <div class="myaccount-content">
                        <h5>Dashboard</h5>
                        <div class="welcome">
                            <p>Hello, <strong>{{auth()->user()->name}}</strong> (If Not <strong>{{auth()->user()->name}}
                                !</strong><a href="login-register.html" class="logout"> Logout</a>)</p>
                        </div>
                        <p class="mb-0">From your account dashboard. you can easily check &
                            view your recent orders, manage your shipping and billing addresses
                            and edit your password and account details.</p>
                    </div>
                </div>
                <!-- Single Tab Content End -->

                <!-- Single Tab Content Start -->
                
                <div class="tab-pane fade {{$activeTab === 'orders' ? 'active show' : ''}}" id="orders" role="tabpanel">
                    <div class="myaccount-content">
                        <h5>Orders</h5>
                        @php
                        if($activeTab === 'orders') {
                        @endphp
                            <div class="myaccount-table table-responsive text-center">
                            {!! $dataTable->table() !!}
                            </div>
                        @php
                        }
                        @endphp
                    </div>
                </div>
                <!-- Single Tab Content End -->

                <!-- Single Tab Content Start -->
                
                <div class="tab-pane fade {{$activeTab === 'reviews' ? 'active show' : ''}}" id="reviews" role="tabpanel">
                    <div class="myaccount-content">
                        <h5>Reviews</h5>
                        @php
                        if($activeTab === 'reviews') {
                        @endphp
                            <div class="myaccount-table table-responsive text-center">
                            {!! $dataTable->table() !!}
                            </div>
                        @php
                        }
                        @endphp
                    </div>
                </div>
                <!-- Single Tab Content End -->

                <!-- Single Tab Content Start -->
                <div class="tab-pane fade {{$activeTab === 'downloads' ? 'active show' : ''}}"" id="download" role="tabpanel">
                    <div class="myaccount-content">
                        <h5>Downloads</h5>
                        <div class="myaccount-table table-responsive text-center">
                            <table class="table table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Product</th>
                                        <th>Date</th>
                                        <th>Expire</th>
                                        <th>Download</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Haven - Free Real Estate PSD Template</td>
                                        <td>Aug 22, 2018</td>
                                        <td>Yes</td>
                                        <td><a href="#" class="btn btn-sqr"><i
                                            class="fa fa-cloud-download"></i>
                                                Download File</a></td>
                                    </tr>
                                    <tr>
                                        <td>HasTech - Profolio Business Template</td>
                                        <td>Sep 12, 2018</td>
                                        <td>Never</td>
                                        <td><a href="#" class="btn btn-sqr"><i
                                            class="fa fa-cloud-download"></i>
                                                Download File</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Single Tab Content End -->

                <!-- Single Tab Content Start -->
                <div class="tab-pane fade {{$activeTab === 'payments' ? 'active show' : ''}}"" id="payment-method" role="tabpanel">
                    <div class="myaccount-content">
                        <h5>Payment Method</h5>
                        <p class="saved-message">You Can't Saved Your Payment Method yet.</p>
                    </div>
                </div>
                <!-- Single Tab Content End -->

                <!-- Single Tab Content Start -->
                <div class="tab-pane fade {{$activeTab === 'address' ? 'active show' : ''}}"" id="address-edit" role="tabpanel">
                    <div class="myaccount-content">
                        <h5>Billing Address</h5>
                        <!-- <address>
                            <p><strong>Erik Jhonson</strong></p>
                            <p>1355 Market St, Suite 900 <br>
                                San Francisco, CA 94103</p>
                            <p>Mobile: (123) 456-7890</p>
                        </address>
                        <a href="#" class="btn btn-sqr"><i class="fa fa-edit"></i>
                            Edit Address</a> -->
                        <div class="row">
                            @php
                                if(isset($addresses)) {
                            @endphp
                                @foreach ($addresses as $address)
                                <div class="col-xl-6">
                                <div class="single-input-item">
                                <address>
                                    <h4>Billing Address</h4>
                                    <ul>
                                    <li><span>name :</span> {{$address->name}}</li>
                                    <li><span>Phone :</span> {{$address->phone}}</li>
                                    <li><span>email :</span> {{$address->email}}</li>
                                    <li><span>country :</span> {{$address->country}}</li>
                                    <li><span>state :</span> {{$address->state}}</li>
                                    <li><span>city :</span> {{$address->city}}</li>
                                    <li><span>zip code :</span> {{$address->zip}}</li>
                                    <li><span>address :</span> {{$address->address}}</li>
                                    </ul>
                                </address>
                                    <div class="wsus__address_btn">
                                    <a href="{{route('user.address.edit', $address->id)}}" class="edit"><i class="fal fa-edit"></i> edit</a>
                                    <a href="{{route('user.address.destroy', $address->id)}}" class="del delete-item"><i class="fal fa-trash-alt"></i> delete</a>
                                    </div>
                                </div>
                                </div>
                                @endforeach
                            @php
                            }
                            @endphp
                            @php
                                if(isset($activeAction) && $activeAction === 'create-address') {
                            @endphp
                            <div class="row">
                                <form action="{{route('user.address.store')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                                <label>name <b>*</b></label>
                                                <input type="text" placeholder="Name" name="name">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                                <label>email</label>
                                                <input type="email" placeholder="Email" name="email">
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                            <label>phone <b>*</b></label>
                                            <input type="text" placeholder="Phone" name="phone">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                            <label>countery <b>*</b></label>
                                            <div class="wsus__topbar_select">
                                                <select class="select_2" name="country">
                                                <option>Select</option>
                                                    @foreach (config('settings.country_list') as $country)
                                                        <option value="{{$country}}">{{$country}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            </div>
                                        </div>   
                                    </div>   
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                            <label>State <b>*</b></label>
                                            <input type="text" placeholder="State" name="state">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                            <label>City <b>*</b></label>
                                            <input type="text" placeholder="City" name="city">
                                            </div>
                                        </div>
                                    </div>    
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                            <label>zip code <b>*</b></label>
                                            <input type="text" placeholder="Zip Code" name="zip">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                            <label>Address <b>*</b></label>
                                            <input type="text" placeholder="Address" name="address">
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="row">
                                        <div class="single-input-item">
                                            <button type="submit" class="btn btn-sqr">Create</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            @php
                                }
                            @endphp
                            <div class="row">
                            @php
                                if(!isset($activeAction)) {
                            @endphp
                                <div class="single-input-item">
                                <!-- <a href="{{route('user.address.create')}}" class="add_address_btn common_btn"><i class="far fa-plus"></i>
                                    add new address</a> -->
                                <a href="{{route('user.address.create')}}" class="add_address_btn btn btn-sqr"><i class="fa fa-plus"></i> Add New Address</a>
                                </div>
                            @php
                                }
                            @endphp
                            </div>
                </div>
                </div>
                </div>
                <!-- Single Tab Content End -->

                <!-- Single Tab Content Start -->
                <div class="tab-pane fade {{$activeTab === 'account' ? 'active show' : ''}}"" id="account-info" role="tabpanel">
                    <div class="myaccount-content">
                        <h5>Account Details</h5>
                        <div class="account-details-form">
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="single-input-item">
                                            <label for="first-name" class="required">First
                                                Name</label>
                                            <input type="text" id="first-name" placeholder="First Name" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="single-input-item">
                                            <label for="last-name" class="required">Last
                                                Name</label>
                                            <input type="text" id="last-name" placeholder="Last Name" />
                                        </div>
                                    </div>
                                </div>
                                <div class="single-input-item">
                                    <label for="display-name" class="required">Display Name</label>
                                    <input type="text" id="display-name" placeholder="Display Name" />
                                </div>
                                <div class="single-input-item">
                                    <label for="email" class="required">Email Addres</label>
                                    <input type="email" id="email" placeholder="Email Address" />
                                </div>
                                <fieldset>
                                    <legend>Password change</legend>
                                    <div class="single-input-item">
                                        <label for="current-pwd" class="required">Current
                                            Password</label>
                                        <input type="password" id="current-pwd" placeholder="Current Password" />
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                                <label for="new-pwd" class="required">New
                                                    Password</label>
                                                <input type="password" id="new-pwd" placeholder="New Password" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                                <label for="confirm-pwd" class="required">Confirm
                                                    Password</label>
                                                <input type="password" id="confirm-pwd" placeholder="Confirm Password" />
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="single-input-item">
                                    <button class="btn btn-sqr">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- Single Tab Content End -->
            </div>
        </div> <!-- My Account Tab Content End -->
    </div>
</div> <!-- My Account Page End -->