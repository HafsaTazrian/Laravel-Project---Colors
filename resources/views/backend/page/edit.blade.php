@extends('backend.layouts.app') 
@section('style')
<link rel="stylesheet" type="text/css" href="{{ url('assets/tagsinput/bootstrap-tagsinput.css') }}">
@endsection

@section('content')

<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body" style="background-color:#fbfada;">
              <h5 class="card-title" style="color:#12372a;">Edit Page</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3" action="" method="post" enctype="multipart/form-data"> <!--this enctype is for uploading image -->
                {{csrf_field()}}

                <div class="col-md-6">
                  <label class="form-label"  style="color:#436850;">Slug *</label>
                  <input type="text" class="form-control" value="{{ $getRecord->slug }}" name="slug" required>
                </div>

                <div class="col-md-6">
                  <label class="form-label"  style="color:#436850;">Title *</label>
                  <input type="text" class="form-control" value="{{ $getRecord->title }}" name="title" required>
                  <div style="color:red;">{{ $errors->first('title') }}</div>
                </div>

                <div class="col-md-12">
                  <label class="form-label" style="color:#436850;">Description</label>
                  <textarea class="form-control tinymce-editor" name="description">{{ $getRecord->description }}</textarea>
                </div>

                <div class="col-md-12">
                  <label class="form-label"  style="color:#436850;">Meta Title</label>
                  <input type="text" class="form-control" value="{{ $getRecord->meta_title }}" name="meta_title">
                  <div style="color:red;">{{ $errors->first('meta_title') }}</div>
                </div>
       
                <div class="col-md-12">
                  <label class="form-label"  style="color:#436850;">Meta Description</label>
                  <textarea class="form-control" name="meta_description" rows="5" >{{ $getRecord->meta_description }}</textarea>
                  <div style="color:red;">{{ $errors->first('meta_description') }}</div>
                </div>

                <div class="col-md-12">
                  <label class="form-label"  style="color:#436850;">Meta Keywords</label>
                  <input type="text" class="form-control" value="{{ $getRecord->meta_keywords }}" name="meta_keywords">
                  <div style="color:red;">{{ $errors->first('meta_keywords') }}</div>
                </div>

                
                <div class="text-center" style="margin-top: 30px;">
                  <button type="submit" class="btn btn-primary" style="background-color: #436850">Submit</button>
                </div>
              </form><!-- End Multi Columns Form -->

            </div>
          </div>

        </div>

      </div>
    </section>
    
@endsection

@section('script')
  <script src="{{ url('assets/tagsinput/bootstrap-tagsinput.js') }}"></script>
  
  <script type="text/javascript">
    $("#tags").tagsinput();
  </script>
@endsection
