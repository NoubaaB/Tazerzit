@extends("layouts.main")
@section('title','Home')
@section("content")
<div id="appHeader">
	@if(Auth::user())
	<!-- HeaderProject -->
	<div id="headerProjetModal" class="modal fade pt-5">
		<div class="modal-dialog">
			<div class="modal-content bg-dark">
				<form method="post" enctype='multipart/form-data'>
					@csrf
					<div class="modal-header">
						<h4 class="modal-title">@{{headOf}}</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div id="add">
							<div class="form-group">
								<label for="image">Image</label>
								<input @change="change" type="file" name="image" class="form-control" accept="image/*" placeholder="image ...">
							</div>
							<div class="form-group">
								<label for="subheading">Sub Heading</label>
								<input v-model="header.subheading" type="text" name="subheading" class="form-control" placeholder="Sub Heading ...">
							</div>
							<div class="form-group">
								<label for="body">body</label>
								<textarea placeholder="Body ..." v-model="header.body" name="body" class="form-control" rows="10"></textarea>
							</div>
							<div class="form-group">
								<label for="footer">Footer</label>
								<input type="text" v-model="header.footer" name="footer" class="form-control" placeholder="footer ...">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-outline-danger" data-dismiss="modal" value="Cancel">
						<input v-if="edit" type="button" @click="update" class="btn btn-success" data-dismiss="modal" value="Save">
						<input v-else type="button" @click="addH" class="btn btn-success" data-dismiss="modal" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>
	@endif
	<!-- End HeaderProject -->
	<section class="home-slider owl-carousel">
		@if($headers==null)
		@if(Auth::user())
		<div class="cart-detail ftco-bg-dark p-3 p-md-4">
			<div class="form-group">
				<input href="#HostelProjetModal" @click="addHostel" type="button" class="btn btn-primary py-3 px-4" value="Add Hostel" data-toggle="modal">
			</div>
		</div>
		@endif
		@endif
		<div v-for="header in headers" :id="header.id + header.updated_at" class="slider-item" :style="'background-image: url(storage/' + header.image + ');'">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

					<div class="col-md-8 col-sm-12 text-center ftco-animate">
						<span class="subheading">@{{header.subheading}}</span>
						<h1 class="mb-4">@{{header.body}}</h1>
						<p class="mb-4 mb-md-5">@{{header.footer}}</p>
						<p>
							@if(Auth::user()==null)
							<a href="{{route('contact')}}" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a>
							<a href="{{route('menu')}}" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a>
							@endif
							@if(Auth::user())
							<a href="#headerProjetModal" @click="updateHeader(header)" class="btn btn-info  p-3 px-xl-4 py-xl-3" data-toggle="modal">Update this Header</a>
							<a href="#deleteProjetModal" @click="deleteHeader(header)" class="btn btn-danger  p-3 px-xl-4 py-xl-3" data-toggle="modal">Delete this Header</a>
							<a href="#headerProjetModal" @click="addHeader" class="btn btn-success  p-3 px-xl-4 py-xl-3" data-toggle="modal">Add New Header</a>
							@endif
						</p>
					</div>

				</div>
			</div>
		</div>

	</section>

</div>

<section id="infoHeader" class="ftco-intro">
	@if(Auth::user())
	<!-- updateStory -->
	<div id="updateInfoHeader" class="modal fade pt-5">
		<div class="modal-dialog">
			<div class="modal-content bg-dark">
				<form method="post" enctype='multipart/form-data'>
					@csrf
					<div class="modal-header">
						<h4 class="modal-title">Update Story</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div>
							<div class="form-group">
								<label for="Menu">Phone</label>
								<input v-model="info.phone" type="tel" name="Phone" class="form-control" placeholder="Phone...">
							</div>
						</div>
						<div>
							<div class="form-group">
								<label for="Menu">Under Phone Text</label>
								<input v-model="info.phoneText" type="text" name="text" class="form-control" placeholder="Write Phone Text...">
							</div>
						</div>
						<div>
							<div class="form-group">
								<label for="Menu">Adress</label>
								<input v-model="info.adress" name="text" type="text" class="form-control" placeholder="Write Adress...">
							</div>
						</div>
						<div>
							<div class="form-group">
								<label for="Menu">Open Days</label>
								<input v-model="info.openDays" type="text" name="text" class="form-control" placeholder="Write Open Days...">
							</div>
						</div>
						<div>
							<div class="form-group">
								<label for="Menu">Time</label>
								<input v-model="info.time" name="text" type="text" class="form-control" placeholder="Write Time...">
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
	<!-- End updateStory -->
	@endif
	<div class="container-wrap">
		<div class="wrap d-md-flex align-items-xl-end">
			<div class="info">
				<div class="row no-gutters">
					<div class="col-md-4 d-flex ftco-animate">
						<div class="icon"><span class="icon-phone"></span></div>
						<div class="text">
							<h3>@{{info.phone}}</h3>
							<p>@{{info.phoneText}}</p>
						</div>
					</div>
					<div class="col-md-4 d-flex ftco-animate">
						<div class="icon"><span class="icon-my_location"></span></div>
						<div class="text">
							<h3>Adress</h3>
							<p>@{{info.adress}}</p>
						</div>
					</div>
					<div class="col-md-4 d-flex ftco-animate">
						<div class="icon"><span class="icon-clock-o"></span></div>
						<div class="text">
							<h3>@{{info.openDays}}</h3>
							<p>@{{info.time}}</p>
						</div>
					</div>
					<div class="col-md-4 d-flex ftco-animate pl-5">
						<div class="text">
							@if(Auth::user())
							<p><a href="#updateInfoHeader" class="btn btn-info  p-3 px-xl-4 py-xl-3" data-toggle='modal'>Update Infos</a></p>
							@endif
						</div>
					</div>
				</div>
			</div>
			<div id="table1" class="book p-4">
				<h3>Book a Table</h3>
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

<div id="story">
	<section class="ftco-about d-md-flex">
		<div class="one-half img" style="background-image: url({{asset('storage/images/about.jpg')}});"></div>
		<div class="one-half ftco-animate">
			<div class="overlap">
				<div class="heading-section ftco-animate ">
					<span class="subheading">Discover</span>
					<h2 class="mb-4">Our Story</h2>
				</div>
				<div>
					<p>@{{info.story}}</p>
				</div>
				@if(Auth::user())
				<p><a href="#updateStory" class="btn btn-info  p-3 px-xl-4 py-xl-3" data-toggle='modal'>Update Story</a></p>
				@endif
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
	@if(Auth::user())
	<!-- updateMenu -->
	<div id="updateMenu" class="modal fade pt-5">
		<div class="modal-dialog">
			<div class="modal-content bg-dark">
				<form method="post" enctype='multipart/form-data'>
					@csrf
					<div class="modal-header">
						<h4 class="modal-title">Update Menu Text</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div>
							<div class="form-group">
								<label for="Menu">Menu Text</label>
								<textarea v-model="info.menu" name="Menu" class="form-control" placeholder="Write Menu Text..." cols="30" rows="20"></textarea>
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
	<!-- End updateMenu -->
	@endif

	@if(Auth::user())
	<!-- updateStory -->
	<div id="updateStory" class="modal fade pt-5">
		<div class="modal-dialog">
			<div class="modal-content bg-dark">
				<form method="post" enctype='multipart/form-data'>
					@csrf
					<div class="modal-header">
						<h4 class="modal-title">Update Story</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div>
							<div class="form-group">
								<label for="Menu">Story</label>
								<textarea v-model="info.story" name="Story" class="form-control" placeholder="Write Story..." cols="30" rows="10"></textarea>
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
	<!-- End updateStory -->
	@endif
	<section class="ftco-section">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 pr-md-5">
					<div class="heading-section text-md-right ftco-animate">
						<span class="subheading">Discover</span>
						<h2 class="mb-4">Our Menu</h2>
						<p class="mb-4">@{{info.menu}}</p>
						<p>
							@if(Auth::user())
							<a href="#updateMenu" class="btn btn-info  p-3 px-xl-4 py-xl-3" data-toggle='modal'>Update Menu Text</a>
							@endif
							<a href="{{route('menu')}}" class="btn btn-primary btn-outline-primary px-4 py-3">View Full Menu</a>
						</p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="row">
						<div v-for="(item, index) in ModelDataDrinks" class="col-md-6">
							<div :class='index%2==0? "menu-entry mt-lg-4":"menu-entry"' :key="index">
								<a class="img" :style="'background-image: url(storage/' + item.image + ');'"></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<section class="ftco-counter ftco-bg-dark img" id="section-counter" style="background-image: url({{asset('storage/images/bg_2.jpg')}});" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<div class="row">
					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<div class="icon"><span class="flaticon-coffee-cup"></span></div>
								<strong class="number" data-number="100">0</strong>
								<span>Coffee Branches</span>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<div class="icon"><span class="flaticon-coffee-cup"></span></div>
								<strong class="number" data-number="85">0</strong>
								<span>Number of Awards</span>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<div class="icon"><span class="flaticon-coffee-cup"></span></div>
								<strong class="number" data-number="10567">0</strong>
								<span>Happy Customer</span>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<div class="icon"><span class="flaticon-coffee-cup"></span></div>
								<strong class="number" data-number="900">0</strong>
								<span>Staff</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-3">
			<div class="col-md-7 heading-section ftco-animate text-center">
				<span class="subheading">Discover</span>
				<h2 class="mb-4">Best Coffee Sellers</h2>
				<p>Far far away, behind the word mountains, far from the countries and across mediterranean sea, there is a charming Restaurant named Tazerzit.</p>
			</div>
		</div>
		<div id="getDrink" class="row">
			<div v-for="drink in ModelDataDrinks" class="col-md-3">
				<div class="menu-entry">
					<div class="img-hover-zoom img">
						<img :src="'storage/'+drink.image">
					</div>
					<div class="text text-center pt-4">
						<h3><a>@{{drink.nom}}</a></h3>
						<p>@{{drink.description}}</p>
						<p class=" heading mt-2 price"><span>MAD@{{drink.prix}}</span></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-gallery">
	<div class="container-wrap">
		<div class="row no-gutters">
			<div class="col-md-3 ftco-animate">
				<a href="#" class="gallery img d-flex align-items-center" style="background-image: url({{asset('storage/images/gallery-1.jpg')}});">
					<div class="icon mb-4 d-flex align-items-center justify-content-center">
						<span class="icon-camera"></span>
					</div>
				</a>
			</div>
			<div class="col-md-3 ftco-animate">
				<a href="#" class="gallery img d-flex align-items-center" style="background-image: url({{asset('storage/images/gallery-2.jpg')}});">
					<div class="icon mb-4 d-flex align-items-center justify-content-center">
						<span class="icon-camera"></span>
					</div>
				</a>
			</div>
			<div class="col-md-3 ftco-animate">
				<a href="#" class="gallery img d-flex align-items-center" style="background-image: url({{asset('storage/images/gallery-3.jpg')}});">
					<div class="icon mb-4 d-flex align-items-center justify-content-center">
						<span class="icon-camera"></span>
					</div>
				</a>
			</div>
			<div class="col-md-3 ftco-animate">
				<a href="#" class="gallery img d-flex align-items-center" style="background-image: url({{asset('storage/images/gallery-4.jpg')}});">
					<div class="icon mb-4 d-flex align-items-center justify-content-center">
						<span class="icon-camera"></span>
					</div>
				</a>
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
									<div v-for="maindish in maindishs" class="col-md-4 text-center">
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
									<div v-for="drink in drinks" class="col-md-4 text-center">
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
									<div v-for="dessert in desserts" class="col-md-4 text-center">
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
									<div v-for="starter in starters" class="col-md-4 text-center">
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

<section class="ftco-section img" id="ftco-testimony" style="background-image: url({{asset('storage/images/bg_1.jpg')}});" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row justify-content-center mb-5">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<span class="subheading">Testimony</span>
				<h2 class="mb-4">Customers Says</h2>
				<p>Have been going here for five years now. Each time we visit my cousin in Taghazout, my dad and i have to stop in here for some great food and possibly the best cheesecake on the planet. Very affordable, good specials, and great service. Cheers! Look forward to many more visits! Thanks from Roanoke, Va!.</p>
			</div>
		</div>
	</div>
	<div class="container-wrap">
		<div class="row d-flex no-gutters">
			<div class="col-lg align-self-sm-end ftco-animate">
				<div class="testimony">
					<blockquote>
						<p>&ldquo;Great cheap treats! One of the best breakfast in downtown. Priced right, fresh foods, daily specials. Excellent place.&rdquo;</p>
					</blockquote>
					<div class="author d-flex mt-4">
						<div class="image mr-3 align-self-center">
							<img src="{{asset('storage/images/person_2.jpg')}}" alt="">
						</div>
						<div class="name align-self-center">Louise Kelly <span class="position">Illustrator Designer</span></div>
					</div>
				</div>
			</div>
			<div class="col-lg align-self-sm-end">
				<div class="testimony overlay">
					<blockquote>
						<p>&ldquo;Food: Very good, Decor: Good, Service: Very good.&rdquo;</p>
					</blockquote>
					<div class="author d-flex mt-4">
						<div class="image mr-3 align-self-center">
							<img src="{{asset('storage/images/person_2.jpg')}}" alt="">
						</div>
						<div class="name align-self-center">Louise Kelly <span class="position">Illustrator Designer</span></div>
					</div>
				</div>
			</div>
			<div class="col-lg align-self-sm-end ftco-animate">
				<div class="testimony">
					<blockquote>
						<p>&ldquo;This place is an Taghazout institution. It's not fancy but it's pretty tasty and a very comfortable place. Staff is very cool and they are family friendly - which is huge for us. Fair prices and good food don't hurt either. &rdquo;</p>
					</blockquote>
					<div class="author d-flex mt-4">
						<div class="image mr-3 align-self-center">
							<img src="{{asset('storage/images/person_3.jpg')}}" alt="">
						</div>
						<div class="name align-self-center">Louise Kelly <span class="position">Illustrator Designer</span></div>
					</div>
				</div>
			</div>
			<div class="col-lg align-self-sm-end">
				<div class="testimony overlay">
					<blockquote>
						<p>&ldquo;This Restaurant gives you the feeling you are in your own home and being serviced by your mom. This diner gives personal service and the food is great.&rdquo;</p>
					</blockquote>
					<div class="author d-flex mt-4">
						<div class="image mr-3 align-self-center">
							<img src="{{asset('storage/images/person_2.jpg')}}" alt="">
						</div>
						<div class="name align-self-center">Louise Kelly <span class="position">Illustrator Designer</span></div>
					</div>
				</div>
			</div>
			<div class="col-lg align-self-sm-end ftco-animate">
				<div class="testimony">
					<blockquote>
						<p>&ldquo;Excellent customer service and great food! Cozy place. &rdquo;</p>
					</blockquote>
					<div class="author d-flex mt-4">
						<div class="image mr-3 align-self-center">
							<img src="{{asset('storage/images/person_3.jpg')}}" alt="">
						</div>
						<div class="name align-self-center">Louise Kelly <span class="position">Illustrator Designer</span></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="instagram_Graph_API" class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-3">
			<div class="col-md-7 heading-section ftco-animate text-center">
				<h2 class="mb-4">Recent from Our Instagram</h2>
			</div>
		</div>
		<div class="row d-flex">
			<div v-for="instagram in instagram_collection" class="img-thumbnail col-md-4 d-flex ftco-animate">

				<div class="blog-entry align-self-stretch">
					<div style="overflow: hidden;">
						<div class="img-hover-zoom img">
							<a target="_blank" :href="'https://www.instagram.com/p/'+instagram.node.shortcode+'/'" class="block-20" :style="'background-image: url('+instagram.node.display_url+');'">
								<span class="icon icon-instagram insta fa-2x m-2" style="display:absolute;position: fixed;"></span>
							</a>
						</div>
					</div>
					<div class="text py-4 d-block">
						<div class="meta">
							<div><a target="_blank" :href="'https://www.instagram.com/p/'+instagram.node.shortcode+'/'"><span class="icon-calendar">&nbsp;</span><strong>@{{dateDecreate(instagram)}}</strong></a> </div>
							<div><a target="_blank" :href="'https://www.instagram.com/p/'+instagram.node.shortcode+'/'"><span class="icon-person"></span>Admin </a> </div>
							<div><a title="post likes" target="_blank" :href="'https://www.instagram.com/p/'+instagram.node.shortcode+'/'" class="meta-heart"><span style="color:red;" class="icon-heart"></span> @{{instagram.node.edge_liked_by.count}}</a></div>
						</div>
						<a target="_blank" class="heading mt-2" :href="'https://www.instagram.com/p/'+instagram.node.shortcode+'/'">@{{instagram.node.edge_media_to_caption.edges[0].node.text}}</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="ftco-appointment">
	<div class="overlay"></div>
	<div class="container-wrap">
		<div class="row no-gutters d-md-flex align-items-center">
			<div class="col-md-6 d-flex align-self-stretch">
				<div class="mapouter">
					<div class="gmap_canvas"><iframe width="100%" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=maroc%20%2C%20taghazout%20%2C%20Restaurant%20Tazerzit&t=&z=19&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.utilitysavingexpert.com">utilitysavingexpert.com</a></div>
					<style>
						.mapouter {
							position: relative;
							text-align: right;
							height: 100%;
							width: 100%;
						}

						.gmap_canvas {
							overflow: hidden;
							background: none !important;
							height: 100%;
							width: 100%;
						}
					</style>
				</div>
			</div>
			<div id="table2" class="col-md-6 appointment ftco-animate">
				<h3 class="mb-3">Book a Table</h3>
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
							<input v-model="table.phone" name="phone" type="text" class="form-control" placeholder="Phone">
						</div>
					</div>
					<div class="d-md-flex">
						<div class="form-group">
							<textarea v-model="table.message" name="message" cols="30" rows="2" class="form-control" placeholder="Example : I would like to reserve a table for two persons.."></textarea>
						</div>
						<div class="form-group ml-md-4">
							<input @click="addTable" type="button" value="Appointment" class="btn btn-primary py-3 px-4">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>


<script>
	new Vue({
		el: "#appHeader",
		data: {
			fd: new FormData(),
			headOf: '',
			edit: false,
			add: false,
			headers: [],
			header: {
				id: 0,
				image: '',
				subheading: '',
				body: '',
				footer: '',
			}
		},
		methods: {
			change: function(event) {},
			getHeaders: function() {
				axios.get('{{route("getHeadears")}}').then((response) => {
					this.headers = response.data;
					console.log(response.data);
				});
			},
			addHeader: function() {
				this.edit = false;
				this.add = true;
				this.headOf = "Add Header"
				this.header = {
					id: 0,
					image: '',
					subheading: '',
					body: '',
					footer: ''
				};

			},
			removeHeader: function() {

			},
			updateHeader: function(header) {
				this.edit = true;
				this.add = false;
				this.headOf = "Update Header"
				this.header = header;
			},
			deleteHeader: function(header) {
				this.header = header;
				console.log(header);
				swal({
					title: 'Are you sure?',
					text: "You won't be able to revert this!",
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Yes, delete it!'
				}).then(() => {
					this.delete();
					swal(
						'Deleted!',
						'Your Header has been deleted.',
						'success'
					)

				});

			},
			update: function() {
				this.fd = new FormData();
				if (document.forms[1].image.files[0]) {
					this.fd.append('image', document.forms[1].image.files[0], document.forms[1].image.files[0].name);
				}
				this.fd.append('subheading', this.header.subheading);
				this.fd.append('id', this.header.id);
				this.fd.append('body', this.header.body);
				this.fd.append('footer', this.header.footer);

				axios.post('{{route("updateHeader")}}', this.fd).then((response) => {
					var position = this.headers.indexOf(this.header);
					this.headers[position] = response.data;
					document.getElementsByName('image')[0].value = null;
					this.header = {
						id: 0,
						image: '',
						subheading: '',
						body: '',
						footer: ''
					};
					swal({
						position: 'top-end',
						type: 'success',
						title: 'Updated with success',
						showConfirmButton: false,
						timer: 1500
					});
				}).catch((errors) => {
					console.log(errors);
				});
			},
			addH: function() {
				this.fd = new FormData();
				if (document.forms[1].image.files[0]) {
					this.fd.append('image', document.forms[1].image.files[0], document.forms[1].image.files[0].name);
				}
				this.fd.append('subheading', this.header.subheading);
				this.fd.append('body', this.header.body);
				this.fd.append('footer', this.header.footer);

				axios({
					method: 'post',
					url: '{{route("addHeader")}}',
					data: this.fd,
					config: {
						headers: {
							'Content-Type': 'multipart/form-data'
						}
					}

				}).then((response) => {

					document.getElementsByName('image')[0].value = null;
					this.headers.push(response.data);
					var id = this.headers[this.headers.length - 1].id + this.headers[this.headers.length - 1].updated_at;
					(setTimeout(() => {
						var div = document.createElement('div');
						var base = document.getElementsByClassName('owl-stage-outer')[0].firstChild;
						div.classList.add('owl-item');
						div.classList.add('cloned');
						var d = document.getElementById(id);
						div.append(d);

						base.append(div);
						swal({
							position: 'top-end',
							type: 'success',
							title: 'Added with success',
							showConfirmButton: false,
							timer: 1500
						});

						this.header = {
							id: 0,
							image: '',
							subheading: '',
							body: '',
							footer: ''
						};
					}, 4000))()
				}).catch((errors) => {
					console.log(errors);
				});
			},
			delete: function() {
				axios.post('{{route("deleteHeader")}}', this.header.id).then((response) => {
					var position = this.headers.indexOf(this.header);
					this.headers.splice(position, 1);
					this.header = {
						id: 0,
						image: '',
						subheading: '',
						body: '',
						footer: ''
					};
				}).catch((errors) => {
					console.log(errors);
				});

			}
		},
		mounted: function() {
			this.getHeaders();
		}
	})
</script>

<script>
	new Vue({
		el: "#table2",
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
				this.table.date = document.getElementsByName('date')[0].value == '' ? document.getElementsByName('date')[1].value : document.getElementsByName('date')[0].value;
				this.table.time = document.getElementsByName('time')[0].value == '' ? document.getElementsByName('time')[1].value : document.getElementsByName('time')[0].value;
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
<script>
	new Vue({
		el: "#story",
		data: {
			ModelDataDrinks: [],

			info: {
				id: 0,
				phone: '',
				location: '',
				email: '',
				about: '',
				story: '',
				menu: '',
			},
		},
		methods: {
			getDrink: function() {
				axios.get("{{route('getMenu','DRINK')}}").then((response) => {
					this.ModelDataDrinks = response.data;
					console.log(this.ModelDataDrinks);
				}).catch((errors) => {
					console.log(errors);
				});
			},
			getInfos: function() {
				axios.get("{{route('info.index')}}").then((response) => {
					this.info = response.data;
					console.log(this.info);
				}).catch((errors) => {
					console.log(errors);
				});
			},
			setInfos: function() {
				axios({
					method: 'patch',
					url: `{{url("/info")}}/${this.info.id}`,
					data: this.info,
					config: {
						headers: {
							'Content-Type': 'multipart/form-data'
						}
					}
				}).then((response) => {
					this.info = response.data;
					swal({
						position: 'top-end',
						type: 'success',
						title: 'Update Information With Success',
						showConfirmButton: false,
						timer: 3000
					});
				}).catch((errors) => {
					console.log(errors);
				});
			},
		},
		mounted: function() {
			this.getInfos();
			this.getDrink();
		}
	});
</script>
<script>
	new Vue({
		el: "#infoHeader",
		data: {
			table: {
				id: 0,
				fname: "",
				lname: "",
				date: "",
				time: "",
				phone: "",
				message: "",
			},
			info: {
				id: 0,
				phone: '',
				location: '',
				email: '',
				about: '',
				story: '',
				menu: '',
			},
		},
		methods: {
			addTable: function() {
				console.log("enter");
				this.table.date = document.getElementsByName('date')[0].value == '' ? document.getElementsByName('date')[1].value : document.getElementsByName('date')[0].value;
				this.table.time = document.getElementsByName('time')[0].value == '' ? document.getElementsByName('time')[1].value : document.getElementsByName('time')[0].value;
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

			},
			getInfos: function() {
				axios.get("{{route('info.index')}}").then((response) => {
					this.info = response.data;
					console.log(this.info);
				}).catch((errors) => {
					console.log(errors);
				});
			},
			setInfos: function() {
				axios({
					method: 'patch',
					url: `{{url("/info")}}/${this.info.id}`,
					data: this.info,
					config: {
						headers: {
							'Content-Type': 'multipart/form-data'
						}
					}
				}).then((response) => {
					this.info = response.data;
					swal({
						position: 'top-end',
						type: 'success',
						title: 'Update Information With Success',
						showConfirmButton: false,
						timer: 3000
					});
				}).catch((errors) => {
					console.log(errors);
				});
			},
		},
		mounted: function() {
			this.getInfos();
		}
	});
</script>
<script>
	new Vue({
		el: '#getDrink',
		data: {
			ModelDataDrinks: [],
		},
		methods: {
			getDrink: function() {
				axios.get("{{route('getMenu','DRINK')}}").then((response) => {
					this.ModelDataDrinks = response.data;
				}).catch((errors) => {
					console.log(errors);
				});
			},
		},
		mounted: function() {
			this.getDrink();
		}
	});
</script>

<script>
	new Vue({
		el: '#OurMenu',
		data: {
			starters: [],
			maindishs: [],
			desserts: [],
			drinks: [],
		},
		methods: {
			getData: function() {
				axios.get("{{route('getAllMenu',3)}}").then((response) => {
					this.desserts = response.data.Desserts;
					this.starters = response.data.Starters;
					this.maindishs = response.data.Maindishs;
					this.drinks = response.data.Drinks;
				}).catch((errors) => {
					console.log(errors);
				});
			},
		},
		mounted: function() {
			this.getData();
		}
	});
</script>
<script>
	new Vue({
		el: "#instagram_Graph_API",
		data: {
			url_instagram: '',
			instagram_collection: [],
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
						this.instagram_collection = response.data.graphql.user.edge_owner_to_timeline_media.edges.slice(0, 3);
						console.log(this.instagram_collection);
					}).catch((errors) => {
						console.log(errors);
					});
				}).catch((errors) => {
					console.log(errors);
				});
			},
			dateDecreate: function(insta) {
				return new Date(insta.node.taken_at_timestamp * 1000).toString().split('GMT', 1)[0];
			}
		},
		mounted: function() {
			this.getInstagram_Collection();
		},
	});
</script>
@endsection