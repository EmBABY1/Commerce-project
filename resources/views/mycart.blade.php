@extends('master')
@section('content')
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <h1>MyCart</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="/checkoutfun" method = "post" class="form-group" style="width:70%; margin-left:15%;"
        enctype="multipart/form-data">

        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"><input type = "hidden" name = "_token"
            value = "<?php echo csrf_token(); ?>">
        <div class="cart-section mt-150 mb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="cart-table-wrap">
                            <table class="cart-table">
                                <thead class="cart-table-head">
                                    <tr class="table-head-row">
                                        <th class="product-remove"></th>
                                        <th class="product-image">Product Image</th>
                                        <th class="product-name">Name</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-total">Total</th>
                                    </tr>
                                </thead>

                                <tbody>


                                    @foreach ($mycart as $item)
                                        <input name="product_id" value="{{ $item->product_id }}" hidden>
                                        <input name="cart_quantity" value="{{ $item->cart_quantity }}" hidden>

                                        <tr class="table-body-row">

                                            <td class=""><input type="checkbox" value={{ $item->product_id }}
                                                    name="items[]"> </td>
                                            <td class="product-image"><img src="{{ asset($item->photo) }}"
                                                    alt=""style="max-height: 80px !important; min-height: 80px !important"
                                                    href="/welcome">
                                            </td>
                                            <td class="product-name">{{ $item->name }}</td>
                                            <td class="product-price">{{ $item->price / $item->cart_quantity }}$</td>
                                            <td class="product-quantity">
                                                ​{{ $item->cart_quantity }}
                                            </td>

                                            <td class="product-total">
                                                {{ $item->price }}$</td>
                                            <td>

                                                <button type="submit" formaction="/updateData">
                                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/ba/Red_x.svg/1200px-Red_x.svg.png"
                                                        height="20px" width="20px">
                                                </button>

                                            </td>

                                        </tr>


                                </tbody>
                                @endforeach
                            </table>
                        </div>
                        <a href="/checkout">
                            <button style="margin-left: 50%" class="button">
                                Checkout
                            </button>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </form>
