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
                <div>
                  @component('mail::panel',['color' => 'success'])
                  Hello Mr : {{$data['nom']}} ☺ 🥰<br>
                  Thank You for Your Visit, Make It Again soon and visit us We will be ☺ Happy ☺ To Serve You Again<br>
                  We Wish You a Good Day With Good Thought 💙💜❤
                  @endcomponent
                </div>
              </div>
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