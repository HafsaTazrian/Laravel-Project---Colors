@extends('layouts.app')

@section('content')

<!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
      <div
        class="d-flex flex-column align-items-center justify-content-center"
        style="min-height: 400px"
      >
        <h3 class="display-3 font-weight-bold text-white">Our Teams</h3>
        <div class="d-inline-flex text-white">
          <p class="m-0"><a class="text-white" href="">Home</a></p>
          <p class="m-0 px-2">/</p>
          <p class="m-0">Our Teams</p>
        </div>
      </div>
    </div>
    <!-- Header End -->

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

@endsection