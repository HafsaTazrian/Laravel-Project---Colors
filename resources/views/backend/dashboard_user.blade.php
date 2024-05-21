@extends('backend.layouts.app') 

@section('content')

<div class="pagetitle">
      <h1>Dashboard</h1>
      
    </div>
<!-- End Page Title     -->


  <section class="section dashboard">
      <div class="row">
      @include('layouts._message')

    <!-- Blog Count Card -->
<div class="col-xxl-6 col-md-6">
    <div class="card info-card sales-card" style="background-color: #fbfada;">
        <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                </li>
                <li><a class="dropdown-item" href="#">Today: <strong>{{ $userTodayBlogs }}</strong></a></li>
                <li><a class="dropdown-item" href="#">This Month: <strong>{{ $userThisMonthBlogs }}</strong></a></li>
                <li><a class="dropdown-item" href="#">This Year: <strong>{{ $userThisYearBlogs }}</strong></a></li>
            </ul>
        </div>
        <div class="card-body">
            <h5 class="card-title">Blog Posts <span id="timePeriod">| Total</span></h5>
            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-journals"></i>
                </div>
                <div class="ps-3">
                    <h6 id="blogCount">{{ $userTotalBlogs }}</h6>
                    <span class="text-muted small pt-2">posts added</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Blog Count Card -->

<!-- Blog Comment Count Card -->
<div class="col-xxl-6 col-md-6" >
    <div class="card info-card sales-card" style="background-color: #fbfada;">
        <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                </li>
                <li><a class="dropdown-item" href="#">Today: <strong>{{ $userTodayComments }}</strong></a></li>
                <li><a class="dropdown-item" href="#">This Month: <strong>{{ $userThisMonthComments }}</strong></a></li>
                <li><a class="dropdown-item" href="#">This Year: <strong>{{ $userThisYearComments }}</strong></a></li>
            </ul>
        </div>
        <div class="card-body">
            <h5 class="card-title">Comments <span id="timePeriod">| Total</span></h5>
            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class='bx bx-chat'></i>
                </div>
                <div class="ps-3">
                    <h6 id="commentCount">{{ $userTotalComments }}</h6>
                    <span class="text-muted small pt-2">comments received</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Blog Comment Count Card -->

<!--Reports-->
<div class="col-12">
  <div class="card">
    <div class="card-body" style="background-color: #fbfada;">
      <h5 class="card-title">Reports <span>All Time</span></h5>

      <!--Line Chart-->
      <div id="reportsChart"></div>

      <script>
        document.addEventListener("DOMContentLoaded", () => {
          var options = {
            series: [{
              name: 'User Blogs',
              data: [{{ $userTodayBlogs }}, {{ $userThisMonthBlogs }}, {{ $userThisYearBlogs }}, {{ $userTotalBlogs }}]
            }, {
              name: 'User Comments',
              data: [{{ $userTodayComments }}, {{ $userThisMonthComments }}, {{ $userThisYearComments }}, {{ $userTotalComments }}]
            }],
            chart: {
              type: 'area',
              height: 350,
              toolbar: {
                show: false
              },
              zoom: {
                enabled: false
              }
            },
            dataLabels: {
              enabled: false
            },
            stroke: {
              curve: 'smooth'
            },
            fill: {
              type: 'gradient',
              gradient: {
                shadeIntensity: 1,
                type: 'vertical',
                opacityFrom: 0.7,
                opacityTo: 0,
                stops: [0, 100]
              }
            },
            xaxis: {
              categories: ['Today', 'This Month', 'This Year', 'Total']
            },
            tooltip: {
              x: {
                formatter: function(val) {
                  return val;
                }
              },
              y: {
                formatter: function (val) {
                  return val;
                }   
              },
              marker: {
                show: false
              } 
            },
            legend: {
              position: 'top',
              horizontalAlign: 'right',
              floating: true,
              offsetY: -25,
              offsetX: -5
            }
          };

          var chart = new ApexCharts(document.querySelector("#reportsChart"), options);
          chart.render();
        });
      </script>
      <!--End Line Chart-->

    </div>
  </div>
</div>
<!--End Reports-->




    </div>
              
  </section> 


@endsection