@extends('backend.layouts.app') 

@section('content')

<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body" style="background-color:#fbfada;">
              <h5 class="card-title" style="color:#12372a;">Edit Category</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3" action="" method="post">
                {{csrf_field()}}
                <div class="col-md-6">
                  <label for="inputName5" class="form-label"  style="color:#436850;">Name *</label>
                  <input type="text" class="form-control" value="{{ $getRecord->name }}" name="name" required id="inputName5">
                  <div style="color:red;">{{ $errors->first('name') }}</div>
                </div>

                <div class="col-md-6">
                  <label class="form-label"  style="color:#436850;">Title *</label>
                  <input type="text" class="form-control" value="{{ $getRecord->title }}" name="title" required>
                  <div style="color:red;">{{ $errors->first('title') }}</div>
                </div>

                

                <div class="col-md-12">
                  <label class="form-label"  style="color:#436850;">Meta Title *</label>
                  <input type="text" class="form-control" value="{{ $getRecord->meta_title }}" name="meta_title" required>
                  <div style="color:red;">{{ $errors->first('meta_title') }}</div>
                </div>

                <div class="col-md-12">
                  <label class="form-label"  style="color:#436850;">Meta Description</label>
                  <textarea class="form-control" name="meta_description"  rows="5" >{{ $getRecord->meta_description}}</textarea>
                  <div style="color:red;">{{ $errors->first('meta_description') }}</div>
                </div>

                <div class="col-md-6">
                  <label class="form-label"  style="color:#436850;">Meta Keywords</label>
                  <input type="text" class="form-control" value="{{ $getRecord->meta_keywords }}" name="meta_keywords">
                  <div style="color:red;">{{ $errors->first('meta_keywords') }}</div>
                </div>


              

                <div class="col-md-6">
                  <label for="inputName5" class="form-label"  style="color:#436850;">Status *</label>
                  <select class="form-control" name="status">
                    <option {{ ($getRecord->status == 0) ? 'selected' : '' }} value="0">Active</option>
                    <option  {{ ($getRecord->status == 1) ? 'selected' : '' }} value="1">Inactive</option>
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
