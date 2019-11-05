@extends("layouts.main")
@section('title','Booking Hostel')
@section("content")
<div id="app">

  <section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url({{asset('/storage/images/bg_3.jpg')}});" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center">

          <div class="col-md-7 col-sm-12 text-center ftco-animate">
            <h1 class="mb-3 mt-5 bread">Booking</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Booking</span></p>
          </div>

        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5   pt-5 mt-5">
            <div class="home-slider owl-carousel">
                <a v-for="image in images" :href='"{{url('storage')}}"+"/"+image.image' class="image-popup">
                  <img :src='"{{url('storage')}}"+"/"+image.image' class=" mt-5 img-fluid" alt="Colorlib Template">
              </a>
            </div>
            <div class="cart-detail  p-3 p-md-4 form-group">
              <a href="{{route('hostel')}}" class="btn btn-primary py-3 px-4" >
                  <span class="icon-chevron-left mr-1" style="color: #0d0c0c !important;" ></span>Back to Hostel Menu
              </a>
          </div>
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3>Book a Hostel</h3>
    				<p class="price"><span>MAD {{$hostel->prix}}/{{$hostel->day}} Day(s)</span></p>
    				<form action="#" class="billing-form ftco-bg-dark p-3 p-md-5">
            <h3 class="mb-4 billing-heading text-center">{{$hostel->nom}}</h3>
            <div class="row align-items-end">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="firstname">Firt Name</label>
                  <input v-model="book.fname" type="text" class="form-control" placeholder="Your First Name">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="lastname">Last Name</label>
                  <input v-model="book.lname" type="text" class="form-control" placeholder="Your Last Name">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="country">State / Country</label>
                  <div class="select-wrap">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <select v-model="book.country" name="countries" class="form-control">
                      <option style="color:#000" v-for="country in countries" :value="country.name">@{{country.name}}</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input v-model="book.phone" type="tel" class="form-control" placeholder="+212 65264-5988">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="emailaddress">Email Address</label>
                  <input v-model="book.email" type="email" class="form-control" placeholder="Exemple@gmail.com">
                </div>
              </div>
              <div class="cart-detail ftco-bg-dark p-3 p-md-4">
                <div class="form-group">
                  <input @click="add(hostel.id)" type="button" class="btn btn-primary py-3 px-4" value="Appointment">
                </div>
              </div>
            </div>

      <div class="mt-5 sidebar-box ftco-animate">
            <h3>Activities</h3>
            <li v-for="activitie in activities" class="ml-4" type="none">@{{activitie.article}}</li>
      </div>

            <div class="sidebar-box ftco-animate">
              <h3>Tag Cloud</h3>
              <div class="tagcloud">
                <a href="#" class="tag-cloud-link">dish</a>
                <a href="#" class="tag-cloud-link">menu</a>
                <a href="#" class="tag-cloud-link">food</a>
                <a href="#" class="tag-cloud-link">sweet</a>
                <a href="#" class="tag-cloud-link">tasty</a>
                <a href="#" class="tag-cloud-link">delicious</a>
                <a href="#" class="tag-cloud-link">desserts</a>
                <a href="#" class="tag-cloud-link">drinks</a>
              </div>
              <h3 class=" sidebar-box ftco-animate ">Our Hostel</h3>
              <p>Here you can spend time full of joy and tasty food with our magnificent hostel packs !</p>
            </div>
          </form><!-- END -->
    			</div>
    		</div>
      </div>
      

    </section>


</div>

<script>
  new Vue({
    el: "#app",
    data: {
      book:{
        id:0,
        fname:'',
        lname:'',
        country:'',
        phone:'',
        email:'',
        hostel_id:0,
      },
      countries: [],
      hostel:{!! $hostel !!} ,
      activities:{!! $hostel->activities !!},
      images:{!! $hostel->images !!},
    },
    methods: {
      getCountries: function() {
        axios.get('https://restcountries.eu/rest/v2/all').then((response) => {
          this.countries = response.data;
        }).catch((errors) => {
          console.log(errors);
        });
      },
      add:function(hostel_id){
        this.book.hostel_id=hostel_id;
        console.log(this.book);
        axios.post("{{route('book.store')}}",this.book).then((response)=>{

            console.log(response.data);
            swal({
					position: 'top-end',
					type: 'success',
					title: 'Thank you for Reservation',
					showConfirmButton: false,
					timer: 1500
					});
        }).catch((errors)=>{
            console.log(errors);
            swal({
					position: 'top-end',
					type: 'error',
					title: 'Failed to Reservation',
					showConfirmButton: false,
					timer: 1500
					});
        });
      }
    },
    mounted: function (){
      this.getCountries();
      console.log(this.activities);
      console.log(this.images);
    }
  });
</script>
@endsection