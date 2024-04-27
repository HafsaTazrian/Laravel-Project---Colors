@extends('backend.layouts.app') 

@section('content')

   <section class="section">
      <div class="row" >

        <div class="col-lg-12">

          <div class="card" style="background-color:#fbfada;">
            <div class="card-body" >
              <h5 class="card-title">Users:
                <a href="" class="btn btn-primary" style="float: right; margin-top: -12px;background-color: #436850">Add User</a>
              </h5>

              <!-- Table with stripped rows -->
              <table class="table table-striped" >
                <thead >
                  <tr >
                    <th scope="col" style="background-color: #adbc95;">#</th>
                    <th scope="col" style="background-color: #adbc95;">Name</th>
                    <th scope="col" style="background-color: #adbc95;">Email</th>
                    <th scope="col" style="background-color: #adbc95;">Email Verified</th>
                    <th scope="col" style="background-color: #adbc95;">Status</th>
                    <th scope="col" style="background-color: #adbc95;">Created Date</th>
                    <th scope="col" style="background-color: #adbc95;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($getRecord as $value)
                  <tr>
                    <th scope="row" style="background-color: #c1e1c1;">{{$value->id}}</th>
                    <td style="background-color: #c1e1c1;">{{$value->name}}</td>
                    <td style="background-color: #c1e1c1;">{{$value->email}}</td>
                    <td style="background-color: #c1e1c1;">{{!empty($value->email_verified_at) ? 'Yes': 'No'}}</td>
                    <td style="background-color: #c1e1c1;">{{!empty($value->status) ? 'Verified': 'Not Verified'}}</td>
                    <td style="background-color: #c1e1c1;">{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                    <td style="background-color: #c1e1c1;">
                      <a href="" class="btn btn-primary btn-sm" style="background-color: #436850">Edit</a>
                      <a href="" class="btn btn-danger btn-sm"style="background-color: ##993e3c">Delete</a>
                    </td>
                  </tr>
                  @empty
                    <tr>
                      <td colspan="100%" style="background-color: #c1e1c1;">Record Not Found.</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

              {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}

            </div>
          </div>

        </div>
      </div>
    </section>
    
@endsection
