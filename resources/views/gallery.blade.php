@extends('layouts.app')
@section('style')
<style>
.portfolio-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 2.5rem;
}

.portfolio-item .position-relative {
    position: relative;
    border-radius: 2rem;
    box-shadow: 0 0 1rem var(--second-bg-color);
    overflow: hidden;
}

.portfolio-item img {
    width: 100%;
    transition: 0.5s ease;
}

.portfolio-item:hover img {
    transform: scale(1.1);
}

.portfolio-item .portfolio-layer {
    position: absolute;
    top: 0;       /* Align top to the container's top */
    bottom: 0;    /* Align bottom to the container's bottom */
    left: 0;      /* Align left to the container's left */
    right: 0;     /* Align right to the container's right */
    background: linear-gradient(rgba(0,0,0,0.1), #436850);
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    text-align: center;
    padding: 10px;  /* Adjust padding as necessary */
    opacity: 0;
    transition: opacity 0.5s ease, transform 0.5s ease;
}


.portfolio-item:hover .portfolio-layer {
    transform: translateY(0);
    opacity: 1;
}

.portfolio-layer h4 {
    font-size: 1.8rem;
    color:#fff ;
    margin: 5px 0;
}

.portfolio-layer p {
    font-size: 1.2rem;
    margin: 5px 0;      /* Reduced margin for compact fitting */
    color: #fbfada;
    padding: 0 10px;    /* Padding for text wrapping */
}

.portfolio-layer a {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    width: 4rem;
    height: 4rem;
    background: var(--text-color);
    border-radius: 50%;
    color: var(--second-bg-color);
}

.portfolio-layer a i {
    font-size: 1.8rem;
}

</style>
@endsection

@section('content')

<!-- Header Start -->
<div class="container-fluid bg-primary mb-5">
      <div
        class="d-flex flex-column align-items-center justify-content-center"
        style="min-height: 400px"
      >
        <h3 class="display-3 font-weight-bold text-white">Gallery</h3>
        <div class="d-inline-flex text-white">
          <p class="m-0"><a class="text-white" href="">Home</a></p>
          <p class="m-0 px-2">/</p>
          <p class="m-0">Gallery</p>
        </div>
      </div>
    </div>
    <!-- Header End -->

    <!-- Gallery Start -->
    <div class="container-fluid pt-5 pb-3">
      <div class="container">
        <div class="text-center pb-2">
          <p class="section-title px-5">
            <span class="px-2">Our Gallery</span>
          </p>
          <h1 class="mb-4">Our Gallery</h1>
        </div>
        <div class="row">
          <div class="col-12 text-center mb-2">
            <ul class="list-inline mb-4" id="portfolio-flters">
              <li class="btn btn-light m-1 " data-filter="*">
                All
              </li>
              <li class="btn btn-light m-1" data-filter=".first">
                Painting Workshops
              </li>
              <li class="btn btn-light m-1" data-filter=".second">
                Photography Workshops
              </li>
              <li class="btn btn-light m-1" data-filter=".third">
                Sculpting Workshop
              </li>
            </ul>
          </div>
        </div>
        <div class="row portfolio-container">
          <div class="col-lg-4 col-md-6 mb-4 portfolio-item first">
            <div class="position-relative overflow-hidden mb-2">
              <img class="img-fluid w-100" src="{{ url('/colorsImages/workshop1.jpeg') }}" alt="" />
              <div class="portfolio-layer">
              <h4>Painting Workshop I </h4>
                    <p>One of the memeorable moments from our first Painting Workshop! Join us in our next workshops to learn and gather fond memories!!</p>
                </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4 portfolio-item third">
            <div class="position-relative overflow-hidden mb-2">
              <img class="img-fluid w-100" src="{{ url('colorsImages/sculpting2.jpeg') }}" alt="" />
              <div class="portfolio-layer">
              <h4>Sculpting Workshop I </h4>
                    <p>One of the memeorable moments from our first Sculpting Workshop! Join us in our next workshops to learn and gather fond memories!!</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4 portfolio-item second">
            <div class="position-relative overflow-hidden mb-2">
              <img class="img-fluid w-100" src="{{ url('colorsImages/photography.jpeg') }}" alt="" />
              <div class="portfolio-layer">
              <h4>Photography Workshop I</h4>
                    <p>One of the memeorable moments from our first Photography Workshop! Join us in our next workshops to learn and gather fond memories!!</p>
                  </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4 portfolio-item third">
            <div class="position-relative overflow-hidden mb-2">
              <img class="img-fluid w-100" src="{{ url('colorsImages/sculpting.jpeg') }}" alt="" />
              <div class="portfolio-layer">
              <h4>Sculpting Workshop I </h4>
                    <p>One of the memeorable moments from our first Sculpting Workshop! Join us in our next workshops to learn and gather fond memories!!</p>
                </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4 portfolio-item first">
            <div class="position-relative overflow-hidden mb-2">
              <img class="img-fluid w-100" src="{{ url('/colorsImages/workshop4.jpeg') }}" alt="" />
              <div class="portfolio-layer">
              <h4>Painting Workshop II</h4>
                    <p>One of the memeorable moments from our second Painting Workshop! Join us in our next workshops to learn and gather fond memories!!</p>
                </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4 portfolio-item first">
            <div class="position-relative overflow-hidden mb-2">
              <img class="img-fluid w-100" src="{{ url('/colorsImages/workshop2.jpeg') }}" alt="" />
              <div class="portfolio-layer">
              <h4>Painting Workshop II</h4>
                    <p>One of the memeorable moments from our second Painting Workshop! Join us in our next workshops to learn and gather fond memories!!</p>
                </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4 portfolio-item second">
            <div class="position-relative overflow-hidden mb-2">
              <img class="img-fluid w-100" src="{{ url('colorsImages/photography3.jpeg') }}" alt="" />
              <div class="portfolio-layer">
              <h4>Photography Workshop II </h4>
                    <p>One of the memeorable moments from our second Photography Workshop! Join us in our next workshops to learn and gather fond memories!!</p>
                </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4 portfolio-item second">
            <div class="position-relative overflow-hidden mb-2">
              <img class="img-fluid w-100" src="{{ url('colorsImages/photography2.jpeg') }}" alt="" />
              <div class="portfolio-layer">
              <h4>Photography Workshop II </h4>
                    <p>One of the memeorable moments from our second Photography Workshop! Join us in our next workshops to learn and gather fond memories!!</p>
                </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4 portfolio-item first">
            <div class="position-relative overflow-hidden mb-2">
              <img class="img-fluid w-100" src="{{ url('/colorsImages/workshop3.jpeg') }}" alt="" />
              <div class="portfolio-layer">
              <h4>Painting Workshop III</h4>
                    <p>One of the memeorable moments from our third Painting Workshop! Join us in our next workshops to learn and gather fond memories!!</p>
                </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Gallery End -->


@endsection