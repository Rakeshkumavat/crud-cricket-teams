@extends('frontend.layout.main')




@section('main-container')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Events</h2>
          <ol>
            <li><a href="{{('/')}}">Home</a></li>
            <li>Events</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Event List Section ======= -->
    <section id="event-list" class="event-list">
      <div class="container">

        <div class="row">
          <div class="col-md-6 d-flex align-items-stretch">
            <div class="card">
              <div class="card-img">
                <img src="{{url('frontend/assets/img/IMG_3217.jpg')}}" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title">Hiyan 3th Birthday</h5>
                <p class="fst-italic text-center">Sunday, November 24th at 7:00 pm</p>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch">
            <div class="card">
              <div class="card-img">
                <img src="{{url('frontend/assets/img/IMG_3194.jpg')}}" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title">Mannat 2th Birthday</h5>
                <p class="fst-italic text-center">Sunday, November 17th at 7:00 pm</p>
                <p class="card-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo</p>
              </div>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End Event List Section -->

  </main><!-- End #main -->

  @endsection
