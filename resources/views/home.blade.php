@extends('layouts.app')


   

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary px-0 px-md-5 mb-5" style="background-color: green;">
      <div class="row align-items-center px-3">
        <div class="col-lg-6 text-center text-lg-left">
          <h4 class="text-white mb-4 mt-5 mt-lg-0">Arts Information Centre</h4>
          <h1 class="display-3 font-weight-bold text-white">
            The World of Arts
          </h1>
          <p class="text-white mb-4">
          Welcome to Colors – your destination for exploring the vibrant world of art and color. Dive into inspiring stories, meet talented artists, and discover innovative color techniques that bring creativity to life.
          </p>
          <a href="{{ url('about')}}" class="btn btn-secondary mt-1 py-3 px-5">Learn More</a>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
          <img class="img-fluid mt-5" style="border-radius: 50%;"src="{{ url('colorsImages/color-splash-ai-generated-free-png.webp') }}"  alt="" />
        </div>
      </div>
    </div>
    <!-- Header End -->

    <!-- Facilities Start -->
    <div class="container-fluid pt-5">
    <div class="text-center pb-2">
      <h1 class="mb-4">What We Offer!</h1>
    </div>
      <div class="container pb-3"> 
        <div class="row">
        @foreach($data['getCategoryHome'] as $CategoryHome)
          <div class="col-lg-4 col-md-6 pb-1">
          <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px">
             <img src="{{ url('/colorsImages/idea.png') }}" width="50" height="50">
             
              <div class="pl-4">
                <h4> <a href="{{ url(''.$CategoryHome->slug) }}" class="nav-item nav-link" >{{$CategoryHome->name}}</a>
              </h4>
                <p class="m-0">
                {!! strip_tags(Str::substr($CategoryHome->meta_description,0,110)) !!} ...
                </p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <!-- Facilities End -->

    <!-- About Start -->
    <div class="container-fluid py-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-5">
            <img
              class="img-fluid rounded mb-5 mb-lg-0" style="height: 600px; width: 500px;"
              src="{{ url('colorsImages/imageWOW.jpeg') }}"
              alt=""
            />
          </div>
          <div class="col-lg-7">
            <p class="section-title pr-5">
              <span class="pr-2">Learn About Us</span>
            </p>
            <h1 class="mb-4">Dive Into the Colorful World</h1>
            <p style="color: white;">
            Welcome to Colors! 
            We're the blog that paints the town with creativity, bringing you vibrant stories from the art world.
            From up-and-coming artists to tried-and-true techniques, we dive into everything that makes art pop. 
            Follow along for color tips, and a dash of artistic flair. 
            Whether you're an art lover, a weekend dabbler, or a professional, 
            there's a splash of inspiration here for everyone!
            </p>
            <div class="row pt-2 pb-4">
              <div class="col-6 col-md-4">
                <img class="img-fluid rounded" src="{{ url('/colorsImages/images.jpeg') }}" alt="" />
              </div>
              <div class="col-6 col-md-8">
                <ul class="list-inline m-0">
                  <li class="py-2 border-top border-bottom" style="color: #5a7929; ">
                    <i class="fa fa-check  mr-3" style= "color: #436850;"></i> Introducing to the magical universe of arts
                  </li>
                  <li class="py-2 border-bottom" style="color: #5a7929; ">
                    <i class="fa fa-check  mr-3" style= "color: #436850;"></i> Providing authentic news of the art community
                  </li>
                  <li class="py-2 border-bottom" style="color: #5a7929; ">
                    <i class="fa fa-check mr-3" style= "color: #436850;"></i> Giving information about upcoming exhibitions
                  </li>
                  <li class="py-2 border-bottom" style="color: #5a7929; ">
                    <i class="fa fa-check mr-3" style= "color: #436850;"></i> An all round information hub
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- About End -->

    <!-- Class Start -->
    <div class="container-fluid pt-5" id="upcoming-exhibitions">
      <div class="container">
        <div class="text-center pb-2">
          <p class="section-title px-5">
            <span class="px-2">Upcoming Exhibitions</span>
          </p>
          <h1 class="mb-4">Exhibitions to Attend! </h1>
        </div>
        <div class="row">
          <div class="col-lg-4 mb-5">
            <div class="card border-0 bg-light shadow-sm pb-2">
              <img class="card-img-top mb-2" src="{{  url('/colorsImages/intex.jpeg') }}" alt="" />
              <div class="card-body text-center">
                <h4 class="card-title">Intex Bangladesh 2024</h4>
                <p class="card-text">
                Dive into the vibrant world of textiles at Intex Bangladesh 2024 in Dhaka—
                your ultimate playground for discovering global trends and innovations in fashion and fabric!
                </p>
              </div>
              <div class="card-footer bg-transparent py-4 px-5">
                <div class="row border-bottom">
                  <div class="col-6 py-1 text-right border-right">
                    <strong>Venue of Event</strong>
                  </div>
                  <div class="col-6 py-1">ICCB</div>
                </div>
                <div class="row border-bottom">
                  <div class="col-6 py-1 text-right border-right">
                    <strong>Date of Event</strong>
                  </div>
                  <div class="col-6 py-1">May 30, 2024</div>
                </div>
                <div class="row">
                  <div class="col-6 py-1 text-right border-right">
                    <strong>Time of Event</strong>
                  </div>
                  <div class="col-6 py-1">All day</div>
                </div>
              </div>
              <a href="{{ url('https://bd.intexsouthasia.com') }}" class="btn btn-primary px-4 mx-auto mb-4">Join Now</a>
            </div>
          </div>
          <div class="col-lg-4 mb-5">
            <div class="card border-0 bg-light shadow-sm pb-2">
              <img class="card-img-top mb-2" src="{{ url('/colorsImages/hoichoi.jpeg') }}" alt="" />
              <div class="card-body text-center">
                <h4 class="card-title">Hoichoi: Engage, Interact, Play!</h4>
                <p class="card-text">
                Take a sneak peek into Korail, and immerse yourself in the exhilarating ideas brewing for the grand festival at Korail in December 2024.
              </p>
              </div>
              <div class="card-footer bg-transparent py-4 px-5">
                <div class="row border-bottom">
                  <div class="col-6 py-1 text-right border-right">
                    <strong>Venue of Event</strong>
                  </div>
                  <div class="col-6 py-1">Aloki, Hatil, Dhaka</div>
                </div>
                <div class="row border-bottom">
                  <div class="col-6 py-1 text-right border-right">
                    <strong>Date of Event</strong>
                  </div>
                  <div class="col-6 py-1">May 24 2024</div>
                </div>
                <div class="row">
                  <div class="col-6 py-1 text-right border-right">
                    <strong>Time of Event</strong>
                  </div>
                  <div class="col-6 py-1">5.30 pm - 9 pm</div>
                </div>
              </div>
              <a href="{{ url('https://allevents.in/dhaka/hoichoi-engage-interact-play/200026469600433') }}" class="btn btn-primary px-4 mx-auto mb-4">Join Now</a>
            </div>
          </div>
          <div class="col-lg-4 mb-5">
            <div class="card border-0 bg-light shadow-sm pb-2">
              <img class="card-img-top mb-2" src="{{ url('/colorsImages/style.jpeg') }}" alt="" />
              <div class="card-body text-center">
                <h4 class="card-title"> The Style Souk - fashion & lifestyle exhibition</h4>
                <p class="card-text">
                The Style Souk - fashion & lifestyle exhibition is arriving in BARIDAHRA DOHS with meticulous coordination of fashion and lifestyle products.
                </p>
              </div>
              <div class="card-footer bg-transparent py-4 px-5">
                <div class="row border-bottom">
                  <div class="col-6 py-1 text-right border-right">
                    <strong>Venue of Event</strong>
                  </div>
                  <div class="col-6 py-1">Baridhara DOHS,Dhaka</div>
                </div>
                <div class="row border-bottom">
                  <div class="col-6 py-1 text-right border-right">
                    <strong>Date of Event</strong>
                  </div>
                  <div class="col-6 py-1">May 14 2024</div>
                </div>
                <div class="row">
                  <div class="col-6 py-1 text-right border-right">
                    <strong>Time of Event</strong>
                  </div>
                  <div class="col-6 py-1">09:00 pm</div>
                </div>
              </div>
              <a href="{{ url('https://allevents.in/dhaka/the-style-souk-fashion-and-lifestyle-exhibition/200026483258351') }}"
               class="btn btn-primary px-4 mx-auto mb-4">Join Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Class End -->

    <!-- Team Start -->
    <div class="container-fluid pt-5">
      <div class="container">
        <div class="text-center pb-2">
          <p class="section-title px-5">
            <span class="px-2">Our Team</span>
          </p>
          <h1 class="mb-4">Meet Our Admins</h1>
        </div>
        <div class="row">
        @foreach( $data['getRecordAdminHome'] as $AdminHome)
          <div class="col-md-6 col-lg-3 text-center team mb-5">
            <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%">
              <img class="img-fluid w-100" src="{{ $AdminHome->getProfile() }}" />
              <div
                class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute"
              >
                <a
                  class="btn btn-outline-light text-center mr-2 px-0"
                  style="width: 38px; height: 38px"
                  href="https://github.com/HafsaTazrian"
                  ><i class="fab fa-github"></i
                ></a>
                <a
                  class="btn btn-outline-light text-center mr-2 px-0"
                  style="width: 38px; height: 38px"
                  href="https://www.facebook.com"
                  ><i class="fab fa-facebook-f"></i
                ></a>
                <a
                  class="btn btn-outline-light text-center px-0"
                  style="width: 38px; height: 38px"
                  href="http://www.linkedin.com/in/hafsa-tazrian-8579"
                  ><i class="fab fa-linkedin-in"></i
                ></a>
              </div>
            </div>
            <h4>{{$AdminHome->name}}</h4>
            <i>{{$AdminHome->profile_identity}}</i>
          </div>
        @endforeach
        </div>
      </div>
    </div>
    <!-- Team End -->

    <!-- Testimonial Start -->
    <div class="container-fluid py-5">
      <div class="container p-0">
        <div class="text-center pb-2">
          <p class="section-title px-5">
            <span class="px-2">Testimonial</span>
          </p>
          <h1 class="mb-4">What Users Say!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel">
        @foreach( $data['getRecordUserHome'] as $UserHome)
          <div class="testimonial-item px-3">
            <div class="bg-light shadow-sm rounded mb-4 p-4">
              <h3 class="fas fa-quote-left text-primary mr-3"></h3>
              {{ $UserHome->remarks}}
            </div>
            <div class="d-flex align-items-center">
              <img
                class="rounded-circle"
                src="{{ $UserHome->getProfile() }}"
                style="width: 70px; height: 70px"
                alt="Image"
              />
              <div class="pl-3">
                <h5>{{ $UserHome->name}}</h5>
                <i>{{  $UserHome->profile_identity }}</i>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <!-- Testimonial End -->

    <!-- Blog Start -->
    <div class="container-fluid pt-5">
      <div class="container">
        <div class="text-center pb-2">
          <p class="section-title px-5">
            <span class="px-2">Latest Blog</span>
          </p>
          <h1 class="mb-4">Latest Articles From Blog</h1>
        </div>
        <div class="row pb-3">
        @foreach($data['getRecord'] as $value)
          <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm mb-2">
              <img class="card-img-top mb-2" src="{{ $value->getImage() }}" style="height: 233px; width: 100%; object-fit:
              cover; " alt="" /> <!--this styling fits the pics in the box of desired height and width --> 
              <div class="card-body bg-light text-center p-4">
               <a href="{{ url(''.$value->slug) }}">
               <h4 class="">
                    {!! strip_tags(Str::substr($value->title,0,60)) !!}
                </h4>
               </a>
                <div class="d-flex justify-content-center mb-3">
                  <small class="mr-3"><i class="fa fa-user text-primary"></i>{{ $value->user_name }}</small>
                  <small class="mr-3">
                    <a href="{{ url(''.$value-> category_slug) }}"><i class="fa fa-folder text-primary"></i> {{ $value-> category_name }}</a>
                  </small>
                  <small class="mr-3"><i class="fa fa-comments text-primary"></i>{{ $value->getCommentCount() }}</small >
                </div>
                <p>
                    {!! strip_tags(Str::substr($value->description,0,160)) !!} ... <!--fits the description upto a definite size -->
                </p>
                <a href="{{ url(''.$value->slug) }}" class="btn btn-primary px-4 mx-auto my-2"
                  >Read More</a
                >
              </div>
            </div>
          </div>

          @endforeach


          <div class="col-md-12 mb-4">
           {!! $data['getRecord']->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!} 
          </div>
        </div>
      </div>
    </div>
    <!-- Blog End -->

   
    
@endsection


   
   
