@extends("layouts.main")
@section('title','Services')
@section("content")
<section class="home-slider owl-carousel">

  <div class="slider-item" style="background-image: url({{asset('storage/images/bg_3.jpg')}});" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text justify-content-center align-items-center">

        <div class="col-md-7 col-sm-12 text-center ftco-animate">
          <h1 class="mb-3 mt-5 bread">Services</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Home</a></span> | <span>Services</span></p>
        </div>

      </div>
    </div>
  </div>
</section>

<section class="ftco-section ftco-services">
  <div class="container">
    <div class="row">
      <div class="col-md-4 ftco-animate">
        <div class="media d-block text-center block-6 services">
          <div class="icon d-flex justify-content-center align-items-center mb-5">
            <span class="flaticon-choices"></span>
          </div>
          <div class="media-body">
            <h3 class="heading">Easy to Order</h3>
            <p>Commission-free online ordering system built for seamless restaurant operations - from online menu creation, restaurant app to customer database management.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 ftco-animate">
        <div class="media d-block text-center block-6 services">
          <div class="icon d-flex justify-content-center align-items-center mb-5">
            <span class="flaticon-delivery-truck"></span>
          </div>
          <div class="media-body">
            <h3 class="heading">Fastest Delivery</h3>
            <p>Order Food Form Your Favorite Restaurants. Lezzoo Eats makes it easier for food lovers! choose your meal and we will deliver it to you! Fast Delivery.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 ftco-animate">
        <div class="media d-block text-center block-6 services">
          <div class="icon d-flex justify-content-center align-items-center mb-5">
            <span class="flaticon-coffee-bean"></span></div>
          <div class="media-body">
            <h3 class="heading">Quality Coffee</h3>
            <p>From Sourcing The Right Beans to Creating The Package That Ends up on Your Shelf, Great care is taken Each step of the Way to Develop the Perfect Cup of Coffee.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection