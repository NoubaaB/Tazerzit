@extends("layouts.main")
@section('title','Menu')
@section("content")
<section class="home-slider owl-carousel">

	<div class="slider-item" style="background-image: url({{asset('storage/images/bg_3.jpg')}});" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center">

				<div class="col-md-7 col-sm-12 text-center ftco-animate">
					<h1 class="mb-3 mt-5 bread">Our Menu</h1>
					<p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Home</a></span> | <span>Menu</span></p>
				</div>

			</div>
		</div>
	</div>
</section>

<section class="ftco-intro">
	<div class="container-wrap">
		<div class="wrap d-md-flex align-items-xl-end">
			<div class="info">
				<div class="row no-gutters">
					<div class="col-md-4 d-flex ftco-animate">
						<div class="icon"><span class="icon-phone"></span></div>
						<div class="text">
							<h3>000 (123) 456 7890</h3>
							<p>A small river named Duden flows by their place and supplies.</p>
						</div>
					</div>
					<div class="col-md-4 d-flex ftco-animate">
						<div class="icon"><span class="icon-my_location"></span></div>
						<div class="text">
							<h3>198 West 21th Street</h3>
							<p> 203 Fake St. Mountain View, San Francisco, California, USA</p>
						</div>
					</div>
					<div class="col-md-4 d-flex ftco-animate">
						<div class="icon"><span class="icon-clock-o"></span></div>
						<div class="text">
							<h3>Open Monday-Friday</h3>
							<p>8:00am - 9:00pm</p>
						</div>
					</div>
				</div>
			</div>
			<div id="table" class="book p-4">
				<h3>Reserve a Table</h3>
				<form action="{{route('table.reserve.add')}}" class="appointment-form">
					<div class="d-md-flex">
						<div class="form-group">
							<input v-model="table.fname" type="text" class="form-control" placeholder="First Name">
						</div>
						<div class="form-group ml-md-4">
							<input v-model="table.lname" type="text" class="form-control" placeholder="Last Name">
						</div>
					</div>
					<div class="d-md-flex">
						<div class="form-group">
							<div class="input-wrap">
								<div class="icon"><span class="ion-md-calendar"></span></div>
								<input v-model="table.date" name="date" type="text" class="form-control appointment_date" placeholder="Date">
							</div>
						</div>
						<div class="form-group ml-md-4">
							<div class="input-wrap">
								<div class="icon"><span class="ion-ios-clock"></span></div>
								<input v-model="table.time" name="time" type="text" class="form-control appointment_time" placeholder="Time">
							</div>
						</div>
						<div class="form-group ml-md-4">
							<input v-model="table.phone" type="tel" class="form-control" placeholder="Phone">
						</div>
					</div>
					<div class="d-md-flex">
						<div class="form-group">
							<textarea v-model="table.message" placeholder="Example: I would like to reserve a table for two persons.." name="massage" cols="30" rows="2" class="form-control" placeholder="Message"></textarea>
						</div>
						<div class="form-group ml-md-4">
							<input @click="addTable" type="button" value="Appointment" class="btn btn-white py-3 px-4">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

<div id="app">
	<section class="ftco-section">
		<div class="container">
			<div class="row">

				<div class="col-md-6 mb-5 pb-3">
					<h3 class="mb-1 heading-pricing ftco-animate">Starter</h3>
					@if(Auth::user())
					<div class="cart-detail p-3 p-md-4">
						<div class="form-group">
							<input href="#MenuProjetModal" @click="addModel" type="button" class="btn btn-primary py-3 px-4" value="Add Starter" data-toggle="modal">
						</div>
					</div>
					@endif
					<div :id='starter.nom+starter.updated_at' v-for="starter in starters" class="pricing-entry d-flex ftco-animate">
						<div class="img" :style="'background-image: url(storage/' + starter.image + ');'"></div>
						<div class="desc pl-3">
							<div class="d-flex text align-items-center">
								<h3><span>@{{starter.nom}}</span></h3>
								<span class="price">MAD @{{starter.prix}}</span>
							</div>
							<div class="d-block">
								<p>@{{starter.description}}</p>
							</div>
						</div>
						<div class="col-md-1">
							@if(Auth::user())
							<a title="Update" href="#MenuProjetModal" @click="updateModel(starter,'STARTER')" class="btn btn-primary btn-outline-primary" data-toggle="modal"><i class="icon-edit"></i></a>
							<a title="Delete" @click="deleteModel(starter,'STARTERS')" class="btn btn-primary btn-outline-primary" data-toggle="modal"><i class="icon-delete"></i></a>
							<a title="Add" href="#MenuProjetModal" @click="addModel" class="btn btn-primary btn-outline-primary" data-toggle="modal"><i class="icon-add"></i></a>
							@endif
						</div>
					</div>
				</div>

				<div class="col-md-6 mb-5 pb-3">
					<h3 class="mb-1 heading-pricing ftco-animate">Main Dish</h3>
					@if(Auth::user())
					<div class="cart-detail p-3 p-md-4">
						<div class="form-group">
							<input href="#MenuProjetModal" @click="addModel" type="button" class="btn btn-primary py-3 px-4" value="Add Main Dish" data-toggle="modal">
						</div>
					</div>
					@endif
					<div :id='maindish.nom+maindish.updated_at' v-for="maindish in maindishs" class="pricing-entry d-flex ftco-animate">
						<div class="img" :style="'background-image: url(storage/' + maindish.image + ');'"></div>
						<div class="desc pl-3">
							<div class="d-flex text align-items-center">
								<h3><span>@{{maindish.nom}}</span></h3>
								<span class="price">MAD @{{maindish.prix}}</span>
							</div>
							<div class="d-block">
								<p>@{{maindish.description}}</p>
							</div>
						</div>
						<div class="col-md-1">
							@if(Auth::user())
							<a title="Update" href="#MenuProjetModal" @click="updateModel(maindish,'MAIN DISH')" class="btn btn-primary btn-outline-primary" data-toggle="modal"><i class="icon-edit"></i></a>
							<a title="Delete" @click="deleteModel(maindish,'MAIN DISHS')" class="btn btn-primary btn-outline-primary" data-toggle="modal"><i class="icon-delete"></i></a>
							<a title="Add" href="#MenuProjetModal" @click="addModel" class="btn btn-primary btn-outline-primary" data-toggle="modal"><i class="icon-add"></i></a>
							@endif
						</div>
					</div>
				</div>

				<div class="col-md-6">
					<h3 class="mb-1 heading-pricing ftco-animate">Desserts</h3>
					@if(Auth::user())
					<div class="cart-detail p-3 p-md-4">
						<div class="form-group">
							<input href="#MenuProjetModal" @click="addModel" type="button" class="btn btn-primary py-3 px-4" value="Add Dessert" data-toggle="modal">
						</div>
					</div>
					@endif
					<div :id='dessert.nom+dessert.updated_at' v-for="dessert in desserts" class="pricing-entry d-flex ftco-animate">
						<div class="img" :style="'background-image: url(storage/' + dessert.image + ');'"></div>
						<div class="desc pl-3">
							<div class="d-flex text align-items-center">
								<h3><span>@{{dessert.nom}}</span></h3>
								<span class="price">MAD @{{dessert.prix}}</span>
							</div>
							<div class="d-block">
								<p>@{{dessert.description}}</p>
							</div>
						</div>
						<div class="col-md-1">
							@if(Auth::user())
							<a title="Update" href="#MenuProjetModal" @click="updateModel(dessert,'DESSERT')" class="btn btn-primary btn-outline-primary" data-toggle="modal"><i class="icon-edit"></i></a>
							<a title="Delete" @click="deleteModel(dessert,'DESSERTS')" class="btn btn-primary btn-outline-primary" data-toggle="modal"><i class="icon-delete"></i></a>
							<a title="Add" href="#MenuProjetModal" @click="addModel" class="btn btn-primary btn-outline-primary" data-toggle="modal"><i class="icon-add"></i></a>
							@endif
						</div>
					</div>
				</div>

				<div class="col-md-6 mb-5 pb-3">
					<h3 class="mb-1 heading-pricing ftco-animate">Drink</h3>
					@if(Auth::user())
					<div class="cart-detail p-3 p-md-4">
						<div class="form-group">
							<input href="#MenuProjetModal" @click="addModel" type="button" class="btn btn-primary py-3 px-4" value="Add Drink" data-toggle="modal">
						</div>
					</div>
					@endif
					<div :id='drink.nom+drink.updated_at' v-for="drink in drinks" class="pricing-entry d-flex ftco-animate">
						<div class="img" :style="'background-image: url(storage/' + drink.image + ');'"></div>
						<div class="desc pl-3">
							<div class="d-flex text align-items-center">
								<h3><span>@{{drink.nom}}</span></h3>
								<span class="price">MAD @{{drink.prix}}</span>
							</div>
							<div class="d-block">
								<p>@{{drink.description}}</p>
							</div>
						</div>
						<div class="col-md-1">
							@if(Auth::user())
							<a title="Update" href="#MenuProjetModal" @click="updateModel(drink,'DRINK')" class="btn btn-primary btn-outline-primary" data-toggle="modal"><i class="icon-edit"></i></a>
							<a title="Delete" @click="deleteModel(drink,'DRINKS')" class="btn btn-primary btn-outline-primary" data-toggle="modal"><i class="icon-delete"></i></a>
							<a title="Add" href="#MenuProjetModal" @click="addModel" class="btn btn-primary btn-outline-primary" data-toggle="modal"><i class="icon-add"></i></a>
							@endif
						</div>
					</div>
				</div>

			</div>
		</div>


		<!-- Menu -->
		<div id="MenuProjetModal" class="modal fade pt-5">
			<div class="modal-dialog">
				<div class="modal-content bg-dark">
					<form method="post" enctype='multipart/form-data'>
						@csrf
						<div class="modal-header">
							<h4 class="modal-title">Menu</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</div>
						<div class="modal-body">
							<div id="add">
								<div class="form-group">
									<label for="image">Image</label>
									<input type="file" @change="changeimage" name="image" class="form-control" accept="image/*" placeholder="image ...">
								</div>
								<div class="form-group">
									<label for="SelectMenu">Select Menu</label>
									<select v-if="!disable" class="form-control" v-model="MenuModel.type" name="menu">
										<option style="background-color:#343a40" value="STARTER">Starter</option>
										<option style="background-color:#343a40" value="MAIN DISH">Main Dish</option>
										<option style="background-color:#343a40" value="DESSERT">Desserts</option>
										<option style="background-color:#343a40" value="DRINK">Drink</option>
									</select>
									<select disabled v-else class="form-control" v-model="MenuModel.type" name="menu">
										<option style="background-color:#343a40" value="STARTER">Starter</option>
										<option style="background-color:#343a40" value="MAIN DISH">Main Dish</option>
										<option style="background-color:#343a40" value="DESSERT">Desserts</option>
										<option style="background-color:#343a40" value="DRINK">Drink</option>
									</select>

								</div>
								<div class="form-group">
									<label for="subheading">Nom</label>
									<input v-model="MenuModel.nom" type="text" name="nom" class="form-control" placeholder="Nom ...">
								</div>
								<div class="form-group">
									<label for="Description">Description</label>
									<textarea v-model="MenuModel.description" name="Description" class="form-control" rows="3" placeholder="Description ..."></textarea>
								</div>
								<div class="form-group">
									<label for="Prix">Prix</label>
									<input type="text" v-model="MenuModel.prix" name="prix" class="form-control" placeholder="Prix ...">
								</div>
								<div class="form-group">
									<label for="Prix">Want To Display this Menu In Other Pages ?</label>
									<select class="form-control" v-model="MenuModel.display" name="display">
										<option style="background-color:#343a40" value="1">true</option>
										<option style="background-color:#343a40" value="0">false</option>
									</select>
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

	</section>

	<section id="OurMenu" class=" ftco-menu">
		<div class="container">
			<div class="row justify-content-center mb-5">
				<div class="col-md-7 heading-section text-center ftco-animate">
					<span class="subheading">Discover</span>
					<h2 class="mb-4">Our Products</h2>
					<p>We offer a Eco Friendly food, very tasty and professional services, Also we provide hotel Overlooking the sea with nice view and fresh aire.</p>
				</div>
			</div>
			<div class="row d-md-flex">
				<div class="col-lg-12 ftco-animate p-md-5">
					<div class="row">
						<div class="col-md-12 nav-link-wrap mb-5">
							<div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
								<a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Main Dish</a>

								<a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Drinks</a>

								<a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Desserts</a>

								<a class="nav-link" id="v-pills-4-tab" data-toggle="pill" href="#v-pills-4" role="tab" aria-controls="v-pills-4" aria-selected="false">Starters</a>
							</div>
						</div>
						<div class="col-md-12 d-flex align-items-center">

							<div class="tab-content ftco-animate" id="v-pills-tabContent">

								<div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
									<div class="row">
										<div v-for="maindish in OurMenumaindishs" class="col-md-4 text-center">
											<div class="menu-wrap">
												<div class="img-hover-zoom img">
													<img class="menu-img img mb-4" width="327.98" :src=`{{url('storage')}}/${maindish.image}`> </div> <div class="text">
													<h3><a>@{{maindish.nom}}</a></h3>
													<p>@{{maindish.description}}</p>
													<p class="price"><span>MAD@{{maindish.prix}}</span></p>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
									<div class="row">
										<div v-for="drink in OurMenudrinks" class="col-md-4 text-center">
											<div class="menu-wrap">
												<div class="img-hover-zoom img">
													<img class="menu-img img mb-4" width="327.98" :src=`{{url('storage')}}/${drink.image}`> </div> <div class="text">
													<h3><a>@{{drink.nom}}</a></h3>
													<p>@{{drink.description}}</p>
													<p class="price"><span>MAD@{{drink.prix}}</span></p>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
									<div class="row">
										<div v-for="dessert in OurMenudesserts" class="col-md-4 text-center">
											<div class="menu-wrap">
												<div class="img-hover-zoom img">
													<img class="menu-img img mb-4" width="327.98" :src=`{{url('storage')}}/${dessert.image}`> </div> <div class="text">
													<h3><a>@{{dessert.nom}}</a></h3>
													<p>@{{dessert.description}}</p>
													<p class="price"><span>MAD@{{dessert.prix}}</span></p>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="tab-pane fade" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-4-tab">
									<div class="row">
										<div v-for="starter in OurMenustarters" class="col-md-4 text-center">
											<div class="menu-wrap">
												<div class="img-hover-zoom img">
													<img class="menu-img img mb-4" width="327.98" :src=`{{url('storage')}}/${starter.image}`> </div> <div class="text">
													<h3><a>@{{starter.nom}}</a></h3>
													<p>@{{starter.description}}</p>
													<p class="price"><span>MAD@{{starter.prix}}</span></p>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>


<script>
	new Vue({
		el: "#app",
		data: {
			OurMenustarters: [],

			OurMenumaindishs: [],

			OurMenudesserts: [],

			OurMenudrinks: [],
			fd: new FormData(),
			id: {
				id: '',
				type: ''
			},
			edit: false,
			MenuModel: {
				id: 0,
				image: null,
				nom: "",
				prix: "",
				description: "",
				type: "",
				display: false,
			},
			pModel: {
				id: 0,
				image: null,
				nom: "",
				prix: "",
				description: "",
				display: false,
			},

			starters: [],

			maindishs: [],

			desserts: [],

			drinks: [],
			disable: false,
		},
		methods: {
			OurMenu: function() {
				axios.get("{{route('getAllMenu',6)}}").then((response) => {
					this.OurMenudesserts = response.data.Desserts;
					this.OurMenustarters = response.data.Starters;
					this.OurMenumaindishs = response.data.Maindishs;
					this.OurMenudrinks = response.data.Drinks;
					console.log(this.OurMenudesserts);
					console.log(this.OurMenustarters);
					console.log(this.OurMenumaindishs);
					console.log(this.OurMenudrinks);
				}).catch((errors) => {
					console.log(errors);
				});
			},
			getData: function() {
				axios.get("{{route('menus.index')}}").then((response) => {
					this.desserts = response.data.Desserts;
					this.starters = response.data.Starters;
					this.maindishs = response.data.Maindishs;
					this.drinks = response.data.Drinks;
					console.log(this.desserts);
					console.log(this.starters);
					console.log(this.maindishs);
					console.log(this.drinks);
				}).catch((errors) => {
					console.log(errors);
				});
			},
			updateModel: function(model, type) {
				this.edit = true;
				this.MenuModel = model;
				this.MenuModel.type = type;
				this.pModel = model;
				this.disable = true;
			},
			deleteModel: function(model, type) {
				swal({
					title: 'Are you sure?',
					text: "You won't be able to revert this!",
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Yes, delete it!'
				}).then(() => {
					this.id = {
						id: model.id,
						type: type
					};
					axios.delete('{{route("menus.destroy",0)}}', {
						headers: {
							Authorization: document.getElementsByName('_token')[1].value
						},
						data: {
							source: this.id
						}
					}).then((response) => {
						console.log(response.data);
					}).catch((erorrs) => {

					});
					switch (type) {
						case 'STARTERS':
							var position = this.starters.indexOf(model);
							this.starters.splice(position, 1);
							break;
						case 'MAIN DISHS':
							var position = this.maindishs.indexOf(model);
							this.maindishs.splice(position, 1);
							break;
						case 'DESSERTS':
							var position = this.desserts.indexOf(model);
							this.desserts.splice(position, 1);
							break;
						case 'DRINKS':
							var position = this.drinks.indexOf(model);
							this.drinks.splice(position, 1);
							break;
					}
					this.OurMenu();
					swal(
						'Deleted!',
						'Your Header has been deleted.',
						'success'
					)

				});


			},
			addModel: function() {
				this.edit = false;
				this.MenuModel = {
					id: 0,
					image: null,
					nom: "",
					prix: "",
					description: "",
					type: "",
					display: false,
				};
				this.disable = false;
			},
			add: function() {
				this.fd = new FormData();
				if (document.forms[2].image.files[0]) {
					this.fd.append('image', document.forms[2].image.files[0], document.forms[2].image.files[0].name);
				}
				this.fd.append('nom', this.MenuModel.nom);
				this.fd.append('prix', this.MenuModel.prix);
				this.fd.append('description', this.MenuModel.description);
				this.fd.append('type', this.MenuModel.type);
				this.fd.append('display', this.MenuModel.display);
				axios({
					method: 'post',
					url: '{{route("menus.store")}}',
					data: this.fd,
					config: {
						headers: {
							'Content-Type': 'multipart/form-data'
						}
					}

				}).then((response) => {
					switch (this.MenuModel.type) {
						case 'STARTER':
							this.starters.push(response.data);
							var id = this.starters[this.starters.length - 1].nom + this.starters[this.starters.length - 1].updated_at;
							break;
						case 'MAIN DISH':
							console.log(this.MenuModel.type);
							this.maindishs.push(response.data);
							var id = this.maindishs[this.maindishs.length - 1].nom + this.maindishs[this.maindishs.length - 1].updated_at;
							break;
						case 'DESSERT':
							this.desserts.push(response.data);
							var id = this.desserts[this.desserts.length - 1].nom + this.desserts[this.desserts.length - 1].updated_at;
							break;
						case 'DRINK':
							this.drinks.push(response.data);
							var id = this.drinks[this.drinks.length - 1].nom + this.drinks[this.drinks.length - 1].updated_at;
							break;

					}
					this.OurMenu();
					(setTimeout(() => {
						document.getElementById(id).classList.add('fadeInUp');
						document.getElementById(id).classList.add('ftco-animated');
						swal({
							position: 'top-end',
							type: 'success',
							title: 'Menu Added with Success',
							showConfirmButton: false,
							timer: 1500
						});
						document.getElementsByName('image')[0].value = null;
						this.MenuModel = {
							id: 0,
							image: null,
							nom: "",
							prix: "",
							description: "",
							type: "",
							display: false,
						};
					}, 4000))()

				}).catch((errors) => {

				});
			},
			update: function() {
				this.fd = new FormData();
				if (document.forms[2].image.files[0]) {
					this.fd.append('image', document.forms[2].image.files[0], document.forms[2].image.files[0].name);
				}
				this.fd.append('id', this.MenuModel.id);
				this.fd.append('nom', this.MenuModel.nom);
				this.fd.append('prix', this.MenuModel.prix);
				this.fd.append('description', this.MenuModel.description);
				this.fd.append('type', this.MenuModel.type);
				this.fd.append('display', this.MenuModel.display);
				console.log(this.fd);

				axios({

					method: 'post',
					url: '{{route("menus.updatealt")}}',
					data: this.fd,
					config: {
						headers: {
							'Content-Type': 'multipart/form-data'
						}
					}

				}).then((response) => {

					switch (this.MenuModel.type) {
						case 'STARTER':
							var position = this.starters.indexOf(this.pModel);
							this.starters[position] = response.data;
							break;
						case 'MAIN DISH':
							var position = this.maindishs.indexOf(this.pModel);
							this.maindishs[position] = response.data;
							break;
						case 'DESSERT':
							var position = this.desserts.indexOf(this.pModel);
							console.log(this.pModel);
							console.log(this.desserts[2]);
							this.desserts[position] = response.data;
							break;
						case 'DRINK':
							var position = this.drinks.indexOf(this.pModel);
							this.drinks[position] = response.data;
							break;
					}
					this.OurMenu();
					swal({
						position: 'top-end',
						type: 'success',
						title: 'Menu Updated with Success',
						showConfirmButton: false,
						timer: 1500
					});
					document.getElementsByName('image')[0].value = null;
					this.MenuModel = {
						id: 0,
						image: null,
						nom: "",
						prix: "",
						description: "",
						type: "",
						display: false,
					};


				}).catch((errors) => {
					swal({
						position: 'top-end',
						type: 'error',
						title: 'Failed to Update Menu',
						showConfirmButton: false,
						timer: 2000
					});
				});
			},
			deltet: function() {

			},
			changeimage: function(event) {
				// this.MenuModel.image=event.target.files[0].name;
			}

		},
		mounted: function() {
			this.getData();
			this.OurMenu();

		}


	});
</script>
<script>
	new Vue({
		el: "#table",
		data: {
			table: {
				id: 0,
				fname: "",
				lname: "",
				date: "",
				time: "",
				phone: "",
				message: "",
			}
		},
		methods: {
			addTable: function() {
				console.log("enter");
				this.table.date = document.getElementsByName('date')[0].value;
				this.table.time = document.getElementsByName('time')[0].value;
				if (this.table.date == "") {
					swal({
						position: 'top-end',
						type: 'error',
						title: 'Please fill Date Fields befor you Appointment ',
						showConfirmButton: false,
						timer: 2000
					});
					return;
				}
				if (this.table.time == "") {
					swal({
						position: 'top-end',
						type: 'error',
						title: 'Please fill Time Fields befor you Appointment ',
						showConfirmButton: false,
						timer: 2000
					});
					return;
				}
				axios.post('{{route("table.reserve.add")}}', this.table).then((response) => {
					console.log(response.data);
				}).catch((erorrs) => {
					console.log(erorrs);
					swal({
						position: 'top-end',
						type: 'error',
						title: 'Please fill all Fields befor you Appointment ',
						showConfirmButton: false,
						timer: 1500
					});
				});
				swal({
					position: 'top-end',
					type: 'success',
					title: 'Thank you for Reservation',
					showConfirmButton: false,
					timer: 1500
				});

			}
		},
		mounted: function() {

		},
	});
</script>

@endsection