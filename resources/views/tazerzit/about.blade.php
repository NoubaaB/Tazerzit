@extends("layouts.main")
@section('title','About')
@section("content")
<section class="home-slider owl-carousel">

	<div class="slider-item" style="background-image: url({{asset('storage/images/bg_3.jpg')}});" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center">

				<div class="col-md-7 col-sm-12 text-center ftco-animate">
					<h1 class="mb-3 mt-5 bread">About Us</h1>
					<p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Home</a></span> | <span>About</span>
					</p>
				</div>

			</div>
		</div>
	</div>
</section>
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
				<div class="col-lg align-self-sm-end">
					<div class="testimony">
						<blockquote>
							<p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost
								unorthographic life One day however a small.&rdquo;</p>
						</blockquote>
						<div class="author d-flex mt-4">
							<div class="image mr-3 align-self-center">
								<img src="{{asset('storage/images/person_3.jpg')}}" alt="">
							</div>
							<div class="name align-self-center">Louise Kelly <span class="position">Illustrator
									Designer</span></div>
						</div>
					</div>
				</div>
				<div class="col-lg align-self-sm-end">
					<div class="testimony overlay">
						<blockquote>
							<p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost
								unorthographic life One day however a small line of blind text by the name of Lorem Ipsum
								decided to leave for the far World of Grammar.&rdquo;</p>
						</blockquote>
						<div class="author d-flex mt-4">
							<div class="image mr-3 align-self-center">
								<img src="{{asset('storage/images/person_4.jpg')}}" alt="">
							</div>
							<div class="name align-self-center">Louise Kelly <span class="position">Illustrator
									Designer</span></div>
						</div>
					</div>
				</div>
				<div class="col-lg align-self-sm-end">
					<div class="testimony">
						<blockquote>
							<p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost
								unorthographic life One day however a small line of blind text by the name. &rdquo;</p>
						</blockquote>
						<div class="author d-flex mt-4">
							<div class="image mr-3 align-self-center">
								<img src="{{asset('storage/images/person_3.jpg')}}" alt="">
							</div>
							<div class="name align-self-center">Louise Kelly <span class="position">Illustrator
									Designer</span></div>
						</div>
					</div>
				</div>
				<div class="col-lg align-self-sm-end">
					<div class="testimony overlay">
						<blockquote>
							<p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost
								unorthographic life One day however.&rdquo;</p>
						</blockquote>
						<div class="author d-flex mt-4">
							<div class="image mr-3 align-self-center">
								<img src="{{asset('storage/images/person_2.jpg')}}" alt="">
							</div>
							<div class="name align-self-center">Louise Kelly <span class="position">Illustrator
									Designer</span></div>
						</div>
					</div>
				</div>
				<div class="col-lg align-self-sm-end">
					<div class="testimony">
						<blockquote>
							<p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost
								unorthographic life One day however a small line of blind text by the name. &rdquo;</p>
						</blockquote>
						<div class="author d-flex mt-4">
							<div class="image mr-3 align-self-center">
								<img src="{{asset('storage/images/person_3.jpg')}}" alt="">
							</div>
							<div class="name align-self-center">Louise Kelly <span class="position">Illustrator
									Designer</span></div>
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
<script>
	new Vue({
		el: "#story",
		data: {
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
@endsection