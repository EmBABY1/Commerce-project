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
    <form action = "/updateData" method = "post" class="form-group" style="width:70%; margin-left:15%;" action="/action_page.php"
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
                                        <th class="product-quantity"></th>
                                    </tr>
                                </thead>

                                <tbody>


                                    @foreach ($mycart as $item)
                                        <input name="product_id" value="{{ $item->product_id }}" hidden>
                                        <tr class="table-body-row">
                                            <td class="product-remove"><i class=""></i></td>
                                            <td class="product-image"><img src="{{ asset($item->photo) }}"
                                                    alt=""style="max-height: 80px !important; min-height: 80px !important">
                                            </td>
                                            <td class="product-name">{{ $item->name }}</td>
                                            <td class="product-price">{{ $item->price * $item->cart_quantity }}$</td>
                                            <td class="product-quantity">
                                                ​{{ $item->cart_quantity }}
                                            </td>

                                            <td class="product-total">
                                                <button type="submit">
                                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/ba/Red_x.svg/1200px-Red_x.svg.png"
                                                        height="20px" width="20px">
                                                </button>
                                            </td>

                                        </tr>


                                </tbody>
                                @endforeach
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </form>
