@extends('backend.layouts.app') 

@section('content')

<section class="section">
      <div class="row">
        <div class="col-lg-12">
            @include('layouts._message')

          <div class="card">
            <div class="card-body" style="background-color:#fbfada;">
              <h5 class="card-title" style="color:#12372a;">Change Password</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3" action="" method="post">
                {{csrf_field()}}
                <div class="col-md-12">
                  <label for="inputName5" class="form-label"  style="color:#436850;">Old Password</label>
                  <input type="password" class="form-control"  name="old_password" required id="inputName5">
                  <div style="color:red;">{{ $errors->first('name') }}</div>
                </div>
                <div class="col-md-12">
                  <label for="inputEmail5" class="form-label"  style="color:#436850;">New Password</label>
                  <input type="password" class="form-control" name="new_password"  required id="inputEmail5">
                  <div style="color:red;">{{ $errors->first('email') }}</div>
                </div>
                <div class="col-md-12">
                  <label for="inputPassword5" class="form-label"  style="color:#436850;">Confirm Password</label>
                  <input type="password" required name="confirm_password"class="form-control" id="inputPassword5">
                  <div style="color:red;">{{ $errors->first('password') }}</div>
                </div>

                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" style="background-color: #436850">Update Password</button>
                </div>
              </form><!-- End Multi Columns Form -->

            </div>
          </div>

        </div>

      </div>
    </section>
    
@endsection
