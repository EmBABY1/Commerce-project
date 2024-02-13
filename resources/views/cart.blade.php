@extends('master')
@section('content')
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <h1>Cart</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action = "/insertData" method = "post" class="form-group" style="width:70%; margin-left:15%;" action="/action_page.php"
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
                                    </tr>
                                </thead>

                                <tbody>


                                    @foreach ($products as $item)
                                        <tr class="table-body-row">
                                            <td class="product-remove"><i class=""></i></td>
                                            <td class="product-image"><img src="{{ asset($item->photo) }}"
                                                    alt=""style="max-height: 60px !important; min-height: 60px !important">
                                            </td>
                                            <input name="product_id" value="{{ $item->id }}" hidden>
                                            <input name="price" value="{{ $item->price }}" hidden>
                                            <input name="cartq" value="{{ $item->quantity }}" hidden>
                                            <td class="product-name">{{ $item->name }}</td>
                                            <td class="product-price">{{ $item->price }}$</td>
                                            <td class="product-quantity">
                                                <select name="cart_quantity" id="">
                                                    @for ($i = 1; $i <= $item->quantity; $i++)
                                                        <option value={{ $i }}>{{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>​
                                            </td>

                                            <td class="product-total"></td>

                                        </tr>


                                </tbody>
                                <td></td>
                                <td></td>
                                <td> <button type="submit" value = "Add to cart" class="btn btn-primary">Add to
                                        cart</button>
                                </td>
                                @endforeach
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </form>
