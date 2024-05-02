@extends('layouts.app')

@section('content')

<!-- Header Start -->
<div class="container-fluid bg-primary mb-5">
      <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
        <h3 class="display-3 font-weight-bold text-white">
        @if(!empty($header_title))  
          {{ $header_title }}
        @else
          Our Blogs!!!
        @endif
       </h3>
      </div>
    </div>
    <!-- Header End -->

    <!-- Blog Start -->
    <div class="container-fluid pt-5">
      <div class="container">

        <div class="row pb-3">

        @foreach($getRecord as $value)
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


           {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!} 
          </div>
        </div>
      </div>
    </div>
    <!-- Blog End -->



@endsection