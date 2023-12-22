@extends('master')
@section('content')
<!-- products -->
<div class="product-section mt-150 mb-150">
	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<div class="product-filters">
					<ul>
						<li class="active" data-filter="*">All</li>
						<li data-filter=".strawberry">drinks</li>
					</ul>
				</div>
			</div>
		</div>
			

		
		<div class="row product-lists">			
			:@foreach ($categories as $item)
			<div class="col-lg-4 col-md-6 text-center strawberry">
				<div class="single-product-item">
					<div class="product-image">
						<a href="product/{{$item -> id}}"><img src="{{$item -> photo}}" alt="" style="max-height: 150px !important; min-height: 150px !important"></a>
					</div>
					<h3>{{$item -> name}}</h3>
					
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
	
	