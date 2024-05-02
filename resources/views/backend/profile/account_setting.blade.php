@extends('backend.layouts.app') 

@section('content')

<section class="section">
      <div class="row">
        <div class="col-lg-12">
            @include('layouts._message')

          <div class="card">
            <div class="card-body" style="background-color:#fbfada;">
              <h5 class="card-title" style="color:#12372a;">Account Settings</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3" action="" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="col-md-12">
                  <label class="form-label"  style="color:#436850;">Name</label>
                  <input type="text" class="form-control" value="{{ $getUser->name }}" name="name" required >
                </div>

                <div class="col-md-12">
                  <label class="form-label"  style="color:#436850;">Email</label>
                  <input type="email" readonly class="form-control" value="{{ $getUser->email }}">
                </div>


                <div class="col-md-6">
                  <label class="form-label"  style="color:#436850;">Profile</label>
                  <input type="file" class="form-control" name="profile_pic" >
                  <img src="{{ $getUser->getProfile() }}" alt="" style="height: 100px; width: 100px; margin-top: 10px;">
                </div>

                <!-- Extra part -->
                <div class="col-md-6">
                  <label class="form-label"  style="color:#436850;">Identity</label>
                  <input type="text" class="form-control" name="profile_identity" value="{{ $getUser->profile_identity }}" >
                </div>

                <div class="col-md-12">
                  <label class="form-label"  style="color:#436850;">Profile Description</label>
                  <textarea class="form-control" name="profile_description" rows="5" >{{ $getUser->profile_description }}</textarea>
                </div>
                

                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" style="background-color: #436850">Update Setting</button>
                </div>
              </form><!-- End Multi Columns Form -->

            </div>
          </div>

        </div>

      </div>
    </section>
    
@endsection
