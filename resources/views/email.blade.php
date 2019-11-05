@component('mail::message')
# Contact Information

<section class="ftco-section contact-section">
    <div class="container mt-5">
        <div class="row block-9">
            <div class="col-md-4 contact-info ftco-animate">
                <div class="row">
                    
                    <div class="col-md-12 mb-3">
                        <p><span>Address:</span> Restaurant Tazerzit , Taghazout, Morocco</p>
                    </div>
                    <div class="col-md-12 mb-3">
                        <p><span>Phone:</span> <a href="tel://+212 649-8479968">+212 649-8479968</a></p>
                    </div>
                    <div class="col-md-12 mb-3">
                        <p><span>Email:</span> <a href="mailto:RestaurantTazerzit@gmail.com">RestaurantTazerzit@gmail.com</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-6 ftco-animate">
                <form action="#" class="contact-form">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="color:black;"for="nom">Nom</label><br>
                                <div>
                                   @component('mail::panel')
{{$data['nom']}}
@endcomponent
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="color:black;"for="Email">Email</label><br>
                                <div>
                                @component('mail::panel')
{{$data['email']}}
@endcomponent
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="color:black;"for="subject">Subject</label><br>
                        <div>
                        @component('mail::panel')
{{$data['subject']}}
@endcomponent
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="color:black;" for="message">Message</label><br>
                        <div>
                        @component('mail::panel')
{{$data['message']}}
@endcomponent
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


@component('mail::button', ['url' => route('home')])
Go To Restaurant Tazerzit
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent