@extends('master')
@section('content')

<div class="breadcrumb-section breadcrumb-bg">
  <div class="container">
    <div class="row">
    <div class="col-lg-8 offset-lg-2 text-center">
      <div class="breadcrumb-text">
      <h1>Product</h1>
      </div>
    </div>
    </div>
  </div>
  </div>

<!-- products -->
<div class="product-section mt-150 mb-150">
	<div class="container">


			
			
			
		<div class="row product-lists">			
			@foreach ($products as $item)
			<div class="col-lg-4 col-md-6 text-center strawberry">
				<div class="single-product-item">
					<div class="product-image">
						<img src="{{asset($item -> photo)}}" alt="" style="max-height: 150px !important; min-height: 150px !important"></a>
					</div>
					<h3>Name :{{$item -> name}} </h3>
                    <h3>Price : {{$item -> price}}$</h3>
					<h3>quantity : {{$item -> quantity}}</h3>

					<a href="/cart/{{$item -> id }}"class="cart-btn">Add To Cart</a>

				</div>
			</div>
			@endforeach
			
		</div>
		
	</div>
</div>
<!-- end products -->

<!-- logo carousel -->
<div class="logo-carousel-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="logo-carousel-inner">
					<div class="single-logo-item">
						<img src="assets/img/company-logos/1.png" alt="">
					</div>
					<div class="single-logo-item">
						<img src="assets/img/company-logos/2.png" alt="">
					</div>
					<div class="single-logo-item">
						<img src="assets/img/company-logos/3.png" alt="">
					</div>
					<div class="single-logo-item">
						<img src="assets/img/company-logos/4.png" alt="">
					</div>
					<div class="single-logo-item">
						<img src="assets/img/company-logos/5.png" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
	
	