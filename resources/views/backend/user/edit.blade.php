@extends('backend.layouts.app') 

@section('content')

<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body" style="background-color:#fbfada;">
              <h5 class="card-title" style="color:#12372a;">Edit User</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3" action="" method="post">
                {{csrf_field()}}
                <div class="col-md-12">
                  <label for="inputName5" class="form-label" style="color:#436850;">Name</label>
                  <input type="text" value="{{ $getRecord->name }}" class="form-control" name="name" required id="inputName5">
                  <div style="color:red;">{{ $errors->first('name') }}</div>
                </div>
                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label" style="color:#436850;">Email</label>
                  <input type="email" value="{{ $getRecord->email }}" class="form-control" name="email" required id="inputEmail5">
                  <div style="color:red;">{{ $errors->first('email') }}</div>
                </div>
                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label" style="color:#436850;">Password</label>
                  <input type="text" name="password"class="form-control" id="inputPassword5">
                </div>

                <div class="col-md-12">
                  <label for="inputName5" class="form-label" style="color:#436850;">Status</label>
                  <select class="form-control" name="status">
                    <option {{ ($getRecord->status == 1) ? 'selected': '' }} value="1">Active</option>
                    <option {{ ($getRecord->status == 0) ? 'selected': ''}} value="0">Inactive</option>
                  </select>
                </div>
                
                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" style="background-color: #436850">Update</button>
                </div>
              </form><!-- End Multi Columns Form -->

            </div>
          </div>

        </div>

      </div>
    </section>
    
@endsection
