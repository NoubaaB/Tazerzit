<!DOCTYPE html>
<html lang="en">

<head>
  <title>Restaurant Tzerzit | @yield("title"," Taghazout")</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="{{asset('storage/images/logo.png')}}">
  <script src="{{asset('js/vue.js')}}"></script>
  <script src="{{asset('js/axios.js')}}"></script>

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Custom stlylesheet -->
  <link type="text/css" rel="stylesheet" href="{{asset('css/style404.css')}}" />

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

  <link rel="stylesheet" href="{{asset('css/css/open-iconic-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/css/animate.css')}}">

  <link rel="stylesheet" href="{{asset('css/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/css/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/css/magnific-popup.css')}}">

  <link rel="stylesheet" href="{{asset('css/css/aos.css')}}">

  <link rel="stylesheet" href="{{asset('css/css/ionicons.min.css')}}">

  <link rel="stylesheet" href="{{asset('css/css/bootstrap-datepicker.css')}}">
  <link rel="stylesheet" href="{{asset('css/css/jquery.timepicker.css')}}">


  <link rel="stylesheet" href="{{asset('css/css/flaticon.css')}}">
  <link rel="stylesheet" href="{{asset('css/css/icomoon.css')}}">
  <link rel="stylesheet" href="{{asset('css/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('css/css/whatsapp.css')}}">

  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <style>
    /* [1] The container */
    .img-hover-zoom {

      transform: scale(0.2);
      /* [1.1] Set it as per your need */
      overflow: hidden;
      transform: scale(1);
      /* [1.2] Hide the overflowing of child elements */
    }

    /* [2] Transition property for smooth transformation of images */
    .img-hover-zoom img {
      transition: transform .5s ease;
      width: 100%;
    }

    /* [3] Finally, transforming the image when container gets hovered */
    .img-hover-zoom:hover img {
      transform: scale(1.5);
    }
  </style>

  <style>
    /* [1] The container */
    .img-hover-zoom {

      transform: scale(0.2);
      /* [1.1] Set it as per your need */
      overflow: hidden;
      transform: scale(1);
      /* [1.2] Hide the overflowing of child elements */
    }

    /* [2] Transition property for smooth transformation of images */
    .img-hover-zoom a {
      transition: transform .5s ease;
      width: 100%;
    }

    /* [3] Finally, transforming the image when container gets hovered */
    .img-hover-zoom:hover a {
      transform: scale(1.5);
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <img height="50px" src="{{asset('storage/images/logo.png')}}" alt="logo_tazerzit">
      <a class="navbar-brand" href="{{route('home')}}">Restaurant<small>Tazerzit</small></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item {{session()->get('home')??''}}"><a href="{{route('home')}}" class="nav-link">Home</a></li>
          <li class="nav-item {{session()->get('menu')??''}}"><a href="{{route('menu')}}" class="nav-link">Menu</a></li>
          <li class="nav-item {{session()->get('services')??''}}"><a href="{{route('services')}}" class="nav-link">Services</a></li>
          <li class="nav-item {{session()->get('hostel')??''}}"><a href="{{route('hostel')}}" class="nav-link">Hostel</a></li>
          <li class="nav-item {{session()->get('about')??''}}"><a href="{{route('about')}}" class="nav-link">About</a></li>
          <li class="nav-item {{session()->get('contact')??''}}"><a href="{{route('contact')}}" class="nav-link">Contact</a></li>
          <!-- Authentication Links -->
          @guest

          @if (Route::has('register'))

          @endif
          @else
          <li class="nav-item {{session()->get('Reservation')??''}}"><a href="{{route('table.index')}}" class="nav-link">Reservation</a></li>
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
          @endguest
        </ul>
      </div>


    </div>
    </div>
  </nav>
  <!-- END nav -->
  @yield("content")

  <footer id="social" class="ftco-footer ftco-section img">
    @if(Auth::user())
    <!-- infosModel -->
    <div id="infosModel" class="modal fade pt-5">
      <div class="modal-dialog">
        <div class="modal-content bg-dark">
          <form method="post" enctype='multipart/form-data'>
            @csrf
            <div class="modal-header">
              <h4 class="modal-title">Update Information</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
              <div>
                <div class="form-group">
                  <label for="phone">Phone Number</label>
                  <input type="phone" v-model="info.phone" name="phone" placeholder="Phone Number..." class="form-control">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" v-model="info.email" name="email" class="form-control" placeholder="Email...">
                </div>
                <div class="form-group">
                  <label for="location">Location</label>
                  <textarea v-model="info.location" name="location" class="form-control" placeholder="Location..." cols="30" rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label for="about">About Us</label>
                  <textarea v-model="info.about" name="about" class="form-control" placeholder="About Us..." cols="30" rows="10"></textarea>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="button" class="btn btn-outline-danger" data-dismiss="modal" value="Cancel">
              <input type="button" @click="setInfos" class="btn btn-success" data-dismiss="modal" value="Save">
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- End infosModel -->
    @endif

    @if(Auth::user())
    <!-- SocialProject -->
    <div id="socialProjetModal" class="modal fade pt-5">
      <div class="modal-dialog">
        <div class="modal-content bg-dark">
          <form method="post" enctype='multipart/form-data'>
            @csrf
            <div class="modal-header">
              <h4 class="modal-title">Update Social Media</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
              <div id="add">
                <div class="form-group">
                  <label for="media">Social Media</label>
                  <input type="text" v-model="social.nom" name="nom" class="form-control" disabled>
                </div>
                <div class="form-group">
                  <label for="link">Social Media Link</label>
                  <input type="text" v-model="social.link" name="link" class="form-control" placeholder="Put link Here ex:https://google.com...">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="button" class="btn btn-outline-danger" data-dismiss="modal" value="Cancel">
              <input type="button" @click="update" class="btn btn-success" data-dismiss="modal" value="Save">
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- End SocialProject -->
    @endif
    <div class="overlay"></div>
    <div class="container">
      <div class="row mb-5">
        <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">About Us</h2>
            <p>@{{info.about}}</p>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
              <li v-for="social_ in socials" class="ftco-animate"><a @click="updateSocial(social_)" @if(Auth::user()!=null) {{'href=#socialProjetModal data-toggle=modal'}} @endif @if(Auth::user()==null) {{'target="_blank"'}} :href="social_.link" @endif><span :class="'icon-'+social_.nom"></span></a></li>
            </ul>
          </div>
        </div>
        <div id="instagrams" class="col-lg-4 col-md-6 mb-5 mb-md-5">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Recent Blog</h2>

            <div v-for="instagram in instagram_collection" class="block-21 mb-4 d-flex">
              <a :href="'https://www.instagram.com/p/'+instagram.node.shortcode+'/'" class="blog-img mr-4" :style="'background-image: url('+instagram.node.display_url+');'"></a>
              <div class="text">
                <h3 class="heading"><a :href="'https://www.instagram.com/p/'+instagram.node.shortcode+'/'">@{{instagram.node.edge_media_to_caption.edges[0].node.text}}</a></h3>
                <div class="meta">
                  <div><a :href="'https://www.instagram.com/p/'+instagram.node.shortcode+'/'"><span class="icon-calendar"></span> @{{dateDecreate(instagram)}}</a></div>
                  <div><a :href="'https://www.instagram.com/p/'+instagram.node.shortcode+'/'"><span class="icon-person"></span> Admin</a></div>
                  <div><a :href="'https://www.instagram.com/p/'+instagram.node.shortcode+'/'"><span style="color:red;" class="icon-heart"></span> @{{instagram.node.edge_liked_by.count}}</a></div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="col-lg-2 col-md-6 mb-5 mb-md-5">
          <div class="ftco-footer-widget mb-4 ml-md-4">
            <h2 class="ftco-heading-2">Services</h2>
            <ul class="list-unstyled">
              <li><a href="#" class="py-2 d-block">Cooked</a></li>
              <li><a href="#" class="py-2 d-block">Deliver</a></li>
              <li><a href="#" class="py-2 d-block">Quality Foods</a></li>
              <li><a href="#" class="py-2 d-block">Mixed</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Have a Questions?</h2>
            <div class="block-23 mb-3">
              <ul>
                <li><span class="icon icon-map-marker"></span><span class="text">@{{info.location}}</span></li>
                <li><a :href="'tel://'+info.phone"><span class="icon icon-phone"></span><span class="text">@{{info.phone}}</span></a></li>
                <li><a :href="'mailto:'+info.email"><span class="icon icon-envelope"></span><span class="text">@{{info.email}}</span></a></li>
              </ul>
              @if(Auth::user())
              <div class="cart-detail ">
                <div class="form-group">
                  <input type="button" href='#infosModel' class="btn btn-primary py-3 px-4" data-toggle='modal' value="Update Information">
                </div>
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">

          <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy; {{date("Y")}} All rights reserved | This Web App is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://www.facebook.com/Mouhcine.RSH" target="_blank">Mouhcine Jarir</a> & <a href="https://www.facebook.com/Dunkelheit.669" target="_blank">Bachir Noubaa</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
        </div>
      </div>
    </div>
  </footer>
  <!-- partial:index.partial.html -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <div class="nav-bottom">
    <div class="popup-whatsapp fadeIn">
      <div class="content-whatsapp -top"><button type="button" class="closePopup">
          <i style="color:white;" class="icon icon-close">

          </i>
        </button>
        <p>Hello, 😊 need help?</p>
      </div>
      <div class="content-whatsapp -bottom">
        <input class="whats-input" id="whats-in" type="text" Placeholder="Send message..." />
        <button class="send-msPopup" id="send-btn" type="button">
          <i class="icon icon-send">

          </i>
        </button>

      </div>
    </div>
    <button type="button" id="whats-openPopup" class="whatsapp-button">
      <img class="icon-whatsapp" src="https://image.flaticon.com/icons/svg/134/134937.svg">
    </button>
    <div class="circle-anime"></div>
  </div>
  <!-- partial -->


  <script>
    var phoneNumber = '';

    new Vue({
      el: '#social',
      data: {
        url_instagram: '',
        instagram_collection: [],
        info: {
          id: 0,
          phone: '',
          location: '',
          email: '',
          about: '',
        },
        socials: [],
        social: {
          id: 0,
          nom: '',
          link: ""
        }
      },
      methods: {
        checkSocialMediaName: function(item) {
          return item.nom === "instagram";
        },
        getInstagram_Collection: function() {

          axios.get('{{route("social")}}').then((response) => {
            this.url_instagram = `${response.data.find(this.checkSocialMediaName).link}?__a=1`;
            axios({
              method: 'GET',
              url: this.url_instagram,
              data: null,
              config: {
                headers: {
                  'Content-Type': 'multipart/form-data'
                }
              }
            }).then((response) => {
              this.instagram_collection = response.data.graphql.user.edge_owner_to_timeline_media.edges.slice(0, 2);
              console.log(this.instagram_collection);
            }).catch((errors) => {
              console.log(errors);
            });
          }).catch((errors) => {
            console.log(errors);
          });
        },
        dateDecreate: function(insta) {
          return new Date(insta.node.taken_at_timestamp * 1000).toString().split(new Date(insta.node.taken_at_timestamp * 1000).getFullYear().toString(), 1)[0] + new Date(insta.node.taken_at_timestamp * 1000).getFullYear().toString();
        },
        getInfos: function() {
          axios.get("{{route('info.index')}}").then((response) => {
            this.info = response.data;
            phoneNumber = this.info.phone.split('+212 ', 2)[1];
            console.log(phoneNumber);
          }).catch((errors) => {
            console.log(errors);
          });
        },
        setInfos: function() {
          axios({
            method: 'post',
            url: `{{url("/info")}}/${this.info.id}`,
            data: this.info,
            config: {
              headers: {
                'Content-Type': 'multipart/form-data'
              }
            }
          }).then((response) => {
            this.info = response.data;
          }).catch((errors) => {
            console.log(errors);
          });
        },
        getSocials: function() {
          axios.get('{{route("social")}}').then((response) => {
            console.log(response.data);
            this.socials = response.data;
          }).catch((errors) => {
            console.log(errors);
          });
        },
        updateSocial: function(social) {
          this.social = social;
        },
        update: function() {
          axios.post("{{route('socialUpdate')}}", this.social).then((response) => {
            this.social = response.data;
            swal({
              position: 'top-end',
              type: 'success',
              title: this.social.nom + ' link Updated with success',
              showConfirmButton: false,
              timer: 1500
            });
          }).catch((errors) => {

          })
        },
      },
      mounted: function() {
        this.getSocials();
        this.getInfos();
        this.getInstagram_Collection();
      }
    });
    // another script
    popupWhatsApp = () => {

      let btnClosePopup = document.querySelector('.closePopup');
      let btnOpenPopup = document.querySelector('.whatsapp-button');
      let popup = document.querySelector('.popup-whatsapp');
      let sendBtn = document.getElementById('send-btn');

      btnClosePopup.addEventListener("click", () => {
        popup.classList.toggle('is-active-whatsapp-popup')
      })

      btnOpenPopup.addEventListener("click", () => {
        popup.classList.toggle('is-active-whatsapp-popup')
        popup.style.animation = "fadeIn .6s 0.0s both";
      })

      sendBtn.addEventListener("click", () => {
        let msg = document.getElementById('whats-in').value;
        let relmsg = msg.replace(/ /g, "%20");
        //just change the numbers "1515551234567" for your number. Don't use +001-(555)1234567     
        window.open(`https://wa.me/212${phoneNumber}?text=` + relmsg, '_blank');

      });

      setTimeout(() => {
        popup.classList.toggle('is-active-whatsapp-popup');
      }, 3000);
    }

    popupWhatsApp();
  </script>


  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>


  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/jquery.nicescroll.min.js')}}"></script>
  <script src="{{asset('js/costum.js')}}"></script>
  <script src="{{asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('js/popper.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('js/aos.js')}}"></script>
  <script src="{{asset('js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
  <script src="{{asset('js/jquery.timepicker.min.js')}}"></script>
  <script src="{{asset('js/scrollax.min.js')}}"></script>
  <script src="{{asset('js/main.js')}}"></script>
  <script src="{{asset('js/sweetAtert.js')}}"></script>

  @csrf
</body>

</html>