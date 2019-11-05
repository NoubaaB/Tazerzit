@extends("layouts.main")
@section('title','Hostel')
@section("content")

<section class="home-slider owl-carousel">

  <div class="slider-item" style="background-image: url({{asset('/storage/images/bg_3.jpg')}});" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text justify-content-center align-items-center">

        <div class="col-md-7 col-sm-12 text-center ftco-animate">
          <h1 class="mb-3 mt-5 bread">Hostel</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> | <span>Hostel</span></p>
        </div>

      </div>
    </div>
  </div>
</section>

<section id="hostel" class="ftco-section">
  <!-- HeaderProject -->
  <div id="HostelProjetModal" class="modal fade pt-5">
    <div class="modal-dialog">
      <div class="modal-content bg-dark">
        <form method="post" enctype='multipart/form-data'>
          @csrf
          <div class="modal-header">
            <h4 class="modal-title">Hostel</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
            <div id="add">
              <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control" accept="image/*" placeholder="Image ...">
              </div>
              <div class="form-group">
                <label for="Nom">Nom</label>
                <input v-model="hostel.nom" type="text" name="nom" class="form-control" placeholder="Hostel nom ...">
              </div>
              <div class="form-group">
                <label for="Description">Description</label>
                <textarea placeholder="Description ..." v-model="hostel.description" name="description" class="form-control" rows="10"></textarea>
              </div>
              <div class="form-group">
                <label for="Prix">Prix</label>
                <input type="text" v-model="hostel.prix" name="prix" class="form-control" placeholder="Prix ...">
              </div>
              <div class="form-group">
                <label for="Day">Day</label>
                <input type="text" v-model="hostel.day" name="day" class="form-control" placeholder="Day ...">
              </div>
              <div class="form-group">
                <label for="Images">Add Multiple Images to this Pack</label>
                <input type="file" name="images" class="form-control" accept="image/*" placeholder="Images ..." multiple>
              </div>
              <div class="cart-detail p-3 p-md-4">
                <div class="form-group">
                  <input @click="addActivitie" type="button" class="btn btn-primary py-3 px-4" value="Add Hostel Activitie">
                </div>
              </div>
              <div v-if="edit" id="activities">
                <div class="form-group" v-for="activitie in hostel.activities">
                  <label>Activitie N°@{{activitie.id}}</label>
                  <input :id='activitie.id' v-model="activitie.article" type="text" name="activitie" class="form-control" placeholder="Activitie ...">
                </div>
              </div>
              <div v-else id="activities">

              </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="button" class="btn btn-outline-danger" data-dismiss="modal" value="Cancel">
            <input v-if="edit" type="button" @click="update" class="btn btn-success" data-dismiss="modal" value="Save">
            <input v-else type="button" @click="add" class="btn btn-success" data-dismiss="modal" value="Add">
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- End HeaderProject -->

  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 heading-section text-center ftco-animate">
        <span class="subheading">Hostel</span>
        <h2 class="mb-4">Our Pack List</h2>
        <p>We offer you the best Pack of our Hostel to make your journey very active and very amusing, Pick one of our Pack below and enjoy it.</p>
      </div>
    </div>
    @if(Auth::user())
    <div class="cart-detail ftco-bg-dark p-3 p-md-4">
      <div class="form-group">
        <input href="#HostelProjetModal" @click="addHostel" type="button" class="btn btn-primary py-3 px-4" value="Add Hostel" data-toggle="modal">
      </div>
    </div>
    @endif
    <div class="row d-flex">
      <div :id='hostel.nom+hostel.updated_at' v-for='hostel in hostels' class="col-md-4 d-flex ftco-animate">
        <div class="blog-entry align-self-stretch">

          <a target="_blank" :href='"{{url('hostels')}}"+"/"+hostel.id' class="block-20">
            <div class="img-hover-zoom">
              <img :src="'storage/'+hostel.image">
            </div>
          </a>

          <div class="text py-4 d-block">
            <div class="meta">
              <div><a title="Date Created">@{{ getMonth(hostel.created_at) }}</a></div>
              <div><a title="Prix">MAD @{{hostel.prix}}</a></div>
              <div><a title="" class="meta-chat"><span class="icon-chat"> For </span>@{{hostel.day}}</a> Day(s)</div>
            </div>
            <h3 class="heading mt-2"><a :href='"{{url('hostels')}}"+"/"+hostel.id'>@{{hostel.nom}}</a>
              @if(Auth::user())
              <a title="Update" href="#HostelProjetModal" @click="updateHostel(hostel)" class="btn btn-primary btn-outline-primary" data-toggle="modal"><i class="icon-edit"></i></a>
              <a title="Delete" @click="deleteHostel(hostel)" class="btn btn-primary btn-outline-primary" data-toggle="modal"><i class="icon-delete"></i></a>
              <a title="Add" href="#HostelProjetModal" @click="addHostel" class="btn btn-primary btn-outline-primary" data-toggle="modal"><i class="icon-add"></i></a>
              @endif
            </h3>
            <p>@{{hostel.description}}.</p>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  new Vue({
    el: "#hostel",
    data: {
      incerment: 0,
      incermentEdit: 1,
      fd: new FormData(),
      edit: false,
      monthNames: ["January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
      ],
      hostels: [],
      hostel: {
        id: 0,
        nom: '',
        description: '',
        image: '',
        prix: '',
        day: '',
        images: {
          id: 0,
          image: '',
        },
        activities: {
          id: 0,
          article: '',
        },
      },
    },
    methods: {
      addActivitie: function() {
        var label = document.createElement('label');
        var input = document.createElement('input');
        var div = document.createElement('div');
        this.incerment++;

        label.setAttribute('for', 'activitieN' + this.incerment);
        label.innerText = 'Activitie N°' + this.incerment;

        div.classList.add('form-groupe');
        input.classList.add('form-control');
        input.setAttribute('type', 'text');
        input.setAttribute('name', 'activitieN' + this.incerment);
        input.setAttribute('placeholder', 'Activitie ...');
        div.appendChild(label);
        div.appendChild(input);
        document.getElementById('activities').append(div);


      },
      update: function() {
        this.fd = new FormData();
        if (document.forms[1].image.files[0]) {
          this.fd.append('image', document.forms[1].image.files[0], document.forms[1].image.files[0].name);
        }
        if (document.forms[1].images.files[0]) {
          for (var i = 0; i < document.forms[1].images.files.length; i++) {
            let file = document.forms[1].images.files[i];

            this.fd.append('images[' + i + ']', file);
          }
        }
        if (document.getElementById('activities').childElementCount != 0) {
          for (var i = 0; i < document.getElementById('activities').childElementCount; i++) {
            let activitie = document.getElementById('activities').children[i].lastChild.value;
            let id = document.getElementById('activities').children[i].lastChild.id == "" ? 0 : document.getElementById('activities').children[i].lastChild.id;
            this.fd.append('activities[' + id + ']', activitie);
          }
        }

        this.fd.append('nom', this.hostel.nom);
        this.fd.append('description', this.hostel.description);
        this.fd.append('prix', this.hostel.prix);
        this.fd.append('day', this.hostel.day);
        this.fd.append('id', this.hostel.id);
        console.log(this.hostel);
        axios({
          method: 'post',
          url: '{{route("hostels.updatealt")}}',
          data: this.fd,
          config: {
            headers: {
              'Content-Type': 'multipart/form-data'
            }
          }

        }).then((response) => {
          var position = this.hostels.indexOf(this.hostel);
          this.hostels[position] = response.data;
          document.getElementById('activities').innerHTML = "";

          swal({
            position: 'top-end',
            type: 'success',
            title: 'Hostel Added with Success',
            showConfirmButton: false,
            timer: 2000
          });
          document.getElementsByName('image')[0].value = null;
          document.getElementsByName('images')[0].value = null;
          this.hostel = {
            id: 0,
            nom: '',
            description: '',
            image: '',
            prix: '',
            day: '',
            images: {
              id: 0,
              image: '',
            },
            activities: {
              id: 0,
              article: '',
            },
          };


        }).catch((errors) => {
          swal({
            position: 'top-end',
            type: 'error',
            title: 'Failed to Update Hostel',
            showConfirmButton: false,
            timer: 2000
          });
        });
      },
      add: function() {
        this.fd = new FormData();
        if (document.forms[1].image.files[0]) {
          this.fd.append('image', document.forms[1].image.files[0], document.forms[1].image.files[0].name);
        }
        if (document.forms[1].images.files[0]) {
          for (var i = 0; i < document.forms[1].images.files.length; i++) {
            let file = document.forms[1].images.files[i];

            this.fd.append('images[' + i + ']', file);
          }
        }
        if (document.getElementById('activities').childElementCount != 0) {
          for (var i = 0; i < document.getElementById('activities').childElementCount; i++) {
            let activitie = document.getElementById('activities').children[i].lastChild.value;

            this.fd.append('activities[' + i + ']', activitie);
          }
        }
        this.fd.append('nom', this.hostel.nom);
        this.fd.append('description', this.hostel.description);
        this.fd.append('prix', this.hostel.prix);
        this.fd.append('day', this.hostel.day);
        console.log(this.hostel);
        axios({
          method: 'post',
          url: '{{route("hostels.store")}}',
          data: this.fd,
          config: {
            headers: {
              'Content-Type': 'multipart/form-data'
            }
          }

        }).then((response) => {
          this.hostels.push(response.data);
          var id = this.hostels[this.hostels.length - 1].nom + this.hostels[this.hostels.length - 1].updated_at;
          console.log(response.data);
          document.getElementById('activities').innerHTML = "";
          (setTimeout(() => {
            document.getElementById(id).classList.add('fadeInUp');
            document.getElementById(id).classList.add('ftco-animated');
            swal({
              position: 'top-end',
              type: 'success',
              title: 'Hostel Added with Success',
              showConfirmButton: false,
              timer: 1500
            });
            document.getElementsByName('image')[0].value = null;
            document.getElementsByName('images')[0].value = null;
            this.hostel = {
              id: 0,
              nom: '',
              description: '',
              image: '',
              prix: '',
              day: '',
              images: {
                id: 0,
                image: '',
              },
              activities: {
                id: 0,
                article: '',
              },
            };
          }, 4000))()

        }).catch((errors) => {
          swal({
            position: 'top-end',
            type: 'info',
            title: 'Your Command On progress',
            showConfirmButton: false,
            timer: 2000
          });
        });
      },
      deleteHostel: function(hostel) {
        swal({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then(() => {
          axios.delete(`{{url("hostels")}}/${hostel.id}`).then((response) => {
            var position = this.hostels.indexOf(hostel);
            this.hostels.splice(position, 1);
            console.log(response.data);
            swal({
              position: 'top-end',
              type: 'success',
              title: 'Deleted Hostel with Success',
              showConfirmButton: false,
              timer: 2000
            });
          }).catch((errors) => {
            console.log(errors.data);
            swal({
              position: 'top-end',
              type: 'error',
              title: 'Failed to Delete Hostel',
              showConfirmButton: false,
              timer: 2000
            });
          });
        })
      },
      updateHostel: function(hostel) {
        this.edit = true;
        this.hostel = hostel;

      },
      addHostel: function() {
        this.hostel = {
          id: 0,
          nom: '',
          description: '',
          image: '',
          prix: '',
          day: '',
          images: {
            id: 0,
            image: '',
          },
          activities: {
            id: 0,
            article: '',
          },
        };
        this.edit = false;

      },
      getMonth: function(month) {
        return this.monthNames[new Date(month).getMonth()] + ', ' + new Date(month).getDate() + ', ' + new Date(month).getFullYear();
      },
      getHostels: function() {
        axios.get('{{route("hostels.index")}}').then((response) => {
          this.hostels = response.data;
          console.log(this.hostels);
        }).catch((errors) => {
          console.log(errors);
        });
      },
    },
    mounted: function() {
      this.getHostels();
    }

  });
</script>
@endsection