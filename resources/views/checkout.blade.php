@extends('master')
@section('content')
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <h1>check out</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- check it out --}}
    <div class="checkout-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-accordion-wrap">
                        <div class="accordion" id="accordionExample">
                            <div class="card single-accordion">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Billing Address
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="billing-address-form">
                                            <form action = "/insert_order_details" method = "post" class="form-group"
                                                style="width:70%; margin-left:15%;" action="/action_page.php"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @foreach ($mycart as $item)
                                                    <input value="{{ $item->product_id }}" hidden name="product_id[]">
                                                    <input value="{{ $item->name }}" hidden name="product_name[]">
                                                    <input value="{{ $item->price }}" hidden name="price[]">
                                                @endforeach
                                                <p><input type="text" placeholder="Name" name="name"></p>
                                                <p><input type="email" placeholder="Email" name="email"></p>
                                                <p><input type="text" placeholder="Address" name="address"></p>
                                                <p><input type="tel" placeholder="Phone" name="phone"></p>
                                                <p>
                                                    <textarea name="comment" id="bill" cols="30" rows="10" placeholder="Say Something"></textarea>
                                                </p>

                                                Payment Method <br>
                                                <input type="radio" value="visa" name="payment_method"> Visa
                                                <br> <input name="payment_method" type="radio" value="cash"> Cash
                                                <br>

                                                <button type="submit"class="button">Place Order</button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card single-accordion">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Shipping Address
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shipping-address-form">
                                            <p>Your shipping address form is here.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card single-accordion">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            Card Details
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="card-details">
                                            <p>Your card details goes here.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="order-details-wrap">
                        <table class="order-details">
                            <thead>
                                <tr>
                                    <th>Your order Details</th>
                                    <th>Price</th>
                                </tr>
                            </thead>

                            <tbody class="order-details-body">
                                <tr>
                                    <td>Product</td>
                                    <td>Total</td>
                                </tr>


                                @foreach ($mycart as $item)
                                    @php
                                        global $globalVar;
                                        $globalVar += $item->price;
                                    @endphp
                                    <tr>

                                        <td> {{ $item->name }} </td>
                                        <td>${{ $item->price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tbody class="checkout-details">
                                <tr>
                                    <td>Subtotal</td>
                                    <td>$@php echo $globalVar; @endphp</td>
                                </tr>
                                <tr>
                                    <td>Shipping</td>
                                    <td>$50</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td>$@php echo 50+$globalVar; @endphp </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end check out section -->
@endsection
