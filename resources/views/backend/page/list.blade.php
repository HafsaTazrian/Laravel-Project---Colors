@extends('backend.layouts.app') 

@section('content')

   <section class="section">
      <div class="row" >

        <div class="col-lg-12">
        @include('layouts._message')
          <div class="card" style="background-color:#fbfada;">
         
            <div class="card-body" >
              <h5 class="card-title" style="color: #12372a;">Pages
                <a href="{{url('panel/page/add')}}" class="btn btn-primary" style="float: right; margin-top: -12px;background-color: #436850">Add Blog</a>
              </h5>

              

              <!-- Table with stripped rows -->
              <table class="table table-striped" >
                <thead >
                  <tr >
                    <th scope="col" style="background-color: #fbfada;">#</th>
                    <th scope="col" style="background-color: #fbfada;">Slug</th>
                    <th scope="col" style="background-color: #fbfada;">Title</th>
                    <th scope="col" style="background-color: #fbfada;">Meta Title</th>
                     <th scope="col" style="background-color: #fbfada;">Created Date</th>
                    <th scope="col" style="background-color: #fbfada;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($getRecord as $value)
                  <tr>
                    <th scope="row" style="background-color: #fbfada;">{{$value->id}}</th>
                
                    <td style="background-color: #fbfada;">{{$value->slug}}</td>
                    <td style="background-color: #fbfada;">{{$value->title}}</td>
                    <td style="background-color: #fbfada;">{{$value->meta_title}}</td>
                    <td style="background-color: #fbfada;">{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                    <td style="background-color: #fbfada;">
                      <a href="{{url('panel/page/edit/'.$value->id)}}" class="btn btn-primary btn-sm" style="background-color: #436850;">Edit</a>
                    </td>
                  </tr>
                  @empty
                    <tr>
                      <td colspan="100%" style="background-color: #fbfada;">Record Not Found.</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

             
            </div>
          </div>

        </div>
      </div>
    </section>
    
@endsection
