@extends('layouts.app')

@section('content')
<!-- Header Start -->
<div class="container-fluid bg-primary mb-5">
      <div
        class="d-flex flex-column align-items-center justify-content-center"
        style="min-height: 400px"
      >
        <h3 class="display-3 font-weight-bold text-white">About Us</h3>
        <div class="d-inline-flex text-white">
          <p class="m-0"><a class="text-white" href="">Home</a></p>
          <p class="m-0 px-2">/</p>
          <p class="m-0">About Us</p>
        </div>
      </div>
    </div>
    <!-- Header End -->

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
    
@endsection