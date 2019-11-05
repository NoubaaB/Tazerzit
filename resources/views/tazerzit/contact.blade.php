@extends("layouts.main")
@section('title','Contact')
@section("content")
<section class="home-slider owl-carousel">

  <div class="slider-item" style="background-image: url({{asset('storage/images/bg_3.jpg')}});" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text justify-content-center align-items-center">

        <div class="col-md-7 col-sm-12 text-center ftco-animate">
          <h1 class="mb-3 mt-5 bread">Contact Us</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Home</a></span> | <span>Contact</span></p>
        </div>

      </div>
    </div>
  </div>
</section>

<section id="contact" class="ftco-section contact-section">
  <div class="container mt-5">
    <div class="row block-9">
      <div class="col-md-4 contact-info ftco-animate">
        <div class="row">
          <div class="col-md-12 mb-4">
            <h2 class="h4">Contact Information</h2>

          </div>
          <div class="col-md-12 mb-3">
            <p><span>Address:</span> @{{info.location}}</p>
          </div>
          <div class="col-md-12 mb-3">
            <p><span>Phone:</span> <a href="tel://+212 649-8479968">@{{info.phone}}</a></p>
          </div>
          <div class="col-md-12 mb-3">
            <p><span>Email:</span> <a href="mailto:RestaurantTazerzit@gmail.com">@{{info.email}}</a></p>
          </div>
        </div>
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-6 ftco-animate">
        <form name="formSend" action="#" class="contact-form">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input name="nom" v-model="email.nom" type="text" class="form-control" placeholder="Your Name" autofocus>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input name="email" v-model="email.email" type="text" class="form-control" placeholder="Your Email">
              </div>
            </div>
          </div>
          <div class="form-group">
            <input name="subject" v-model="email.subject" type="text" class="form-control" placeholder="Subject">
          </div>
          <div class="form-group">
            <textarea name="message" v-model="email.message" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
          </div>
          <div>
            <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
            <div v-if="recaptcha_invalid != ''" class="alert alert-danger">
              <span class="invalid-fadeback" style="color:rgb(200, 49, 49)">
                <strong>@{{recaptcha_invalid}}</strong>
              </span>
            </div>
          </div>
          <div class="form-group form-control">

          </div>
          <div class="form-group">
            <input type="button" @click="sendEmail()" value="Send Message" class="btn btn-primary py-3 px-5">
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<div id="map">
  <div class="mapouter">
    <div class="gmap_canvas"><iframe width="1349" height="525" id="gmap_canvas" src="https://maps.google.com/maps?q=maroc%20%2C%20taghazout%20%2C%20restaurant%20tazerzit&t=k&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.utilitysavingexpert.com">Utility Saving Expert</a></div>
    <style>
      .mapouter {
        position: relative;
        text-align: right;
        height: 525px;
        width: 100%;
      }

      .gmap_canvas {
        overflow: hidden;
        background: none !important;
        height: 525px;
        width: 100%;
      }
    </style>
  </div>
</div>

<script>
  new Vue({
    el: "#contact",
    data: {
      recaptcha_invalid: '',
      info: {
        id: 0,
        phone: '',
        location: '',
        email: '',
      },
      email: {
        id: 0,
        nom: '',
        email: '',
        subject: '',
        message: '',
      }
    },
    methods: {
      getInfos: function() {
        axios.get("{{route('info.index')}}").then((response) => {
          this.info = response.data;
          console.log(this.info);
        }).catch((errors) => {
          console.log(errors);
        });
      },
      sendEmail: function() {

        swal({
          position: 'top-end',
          type: 'info',
          title: 'Your Message is in Progress to Sent',
          showConfirmButton: false,
          timer: 4000
        });
        axios.post('{{route("sendEmail")}}', new FormData(document.formSend)).then((response) => {
          swal({
            position: 'top-end',
            type: 'success',
            title: response.data,
            showConfirmButton: false,
            timer: 4000
          });
          this.recaptcha_invalid = "";
          this.email = {
              id: 0,
              nom: '',
              email: '',
              subject: '',
              message: '',
            };
          console.log(response.data);
        }).catch((errors) => {
          swal({
            position: 'top-end',
            type: 'error',
            title: 'Your Message Not Send , please Try Again \n',
            showConfirmButton: false,
            timer: 6000
          });
          this.recaptcha_invalid = errors;
          console.log(errors);
        });
      },
    },
    mounted: function() {
      this.getInfos();
    }
  });
</script>
@endsection