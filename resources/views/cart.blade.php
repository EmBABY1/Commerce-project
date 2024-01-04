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
                  <td class="product-image"><img src="{{asset($item -> photo)}}" alt=""style="max-height: 60px !important; min-height: 60px !important"></td>
                  <td class="product-name">{{$item -> name}}</td>
                  <td class="product-price">{{$item -> price}}$</td>
                  <td class="product-quantity">
                    <select name="" id="">
                      @for ($i=1;$i<=($item -> quantity);$i++)
                      <option value="1">{{$i}}</option>
                      @endfor
                    </select>​  
                  </td>

                  <td class="product-total"></td>
                 
                </tr>
                
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
  
        <div class="col-lg-4">
          <div class="total-section">
            <table class="total-table">
              <thead class="total-table-head">
                <tr class="table-total-row">
                  <th>Total</th>
                  <th>Price</th>
                </tr>
              </thead>
              <tbody>
                <tr class="total-data">
                  <td><strong>Subtotal: </strong></td>
                  <td>$500</td>
                </tr>
                <tr class="total-data">
                  <td><strong>Shipping: </strong></td>
                  <td>$45</td>
                </tr>
                <tr class="total-data">
                  <td><strong>Total: </strong></td>
                  <td>$545</td>
                </tr>
              </tbody>
            </table>
            <div class="cart-buttons">
              <a href="" class="boxed-btn">Update Cart</a>
              <a href="/checkout" class="boxed-btn black">Check Out</a>
            </div>
          </div>
  
          <div class="coupon-section">
            <h3>Apply Coupon</h3>
            <div class="coupon-form-wrap">
              <form >
                <p><input type="text" placeholder="Coupon"></p>
                <p><input type="submit" value="Apply"></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  
  
  
  
  
  
  

  