@extends('backend.layouts.app') 

@section('content')

    <div class="pagetitle">
      <h1>Dashboard</h1>
      
    </div>
    <!-- End Page Title     -->


  <section class="section dashboard">
      <div class="row">
      @include('layouts._message')

  <!--Left side columns -->

  <div class="col-lg-6">
    <div class="row">
    <p></p>
    <h2> In COLORS: </h2>
       

      <!-- Blog Count Card -->
      <div class="col-xxl-6 col-md-6">
      <div class="card info-card sales-card" style="background-color: #fbfada;">
        <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow" style ="background-color: #dbe8d7;">
                <li class="dropdown-header text-start">
                    <h6 style= "color: #435860;">Filter</h6>
                </li>
                <!-- Display static counts directly in the dropdown menu -->
                <li><a class="dropdown-item" href="#">Today: <strong>{{ $todayBlogs }}</strong></a></li>
                <li><a class="dropdown-item" href="#">This Month: <strong>{{ $thisMonthBlogs }}</strong></a></li>
                <li><a class="dropdown-item" href="#">This Year: <strong>{{ $thisYearBlogs }}</strong></a></li>
            </ul>
        </div>
        <div class="card-body">
            <h5 class="card-title">Blog Posts <span id="timePeriod">| Total</span></h5>
            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-journals"></i>
                </div>
                <div class="ps-3">
                    <h6 id="blogCount">{{ $totalBlogs }}</h6>
                    <span class="text-muted small pt-2">posts added</span>
                </div>
            </div>
        </div>
      </div>
      </div>
      <!-- End Blog Count Card -->



      <!-- Blog Comment Count Card -->
      <div class="col-xxl-6 col-md-6">
      <div class="card info-card sales-card" style="background-color: #fbfada;">
        <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow" style ="background-color: #dbe8d7;">
                <li class="dropdown-header text-start">
                    <h6 style= "color: #435860;">Filter</h6>
                </li>
                <!-- Display static counts directly in the dropdown menu -->
                <li><a class="dropdown-item" href="#">Today: <strong>{{ $todayComments }}</strong></a></li>
                <li><a class="dropdown-item" href="#">This Month: <strong>{{ $thisMonthComments }}</strong></a></li>
                <li><a class="dropdown-item" href="#">This Year: <strong>{{ $thisYearComments }}</strong></a></li>
            </ul>
        </div>
        <div class="card-body">
            <h5 class="card-title">Comments<span id="timePeriod">| Total</span></h5>
            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class='bx bx-chat'></i>
                </div>
                <div class="ps-3">
                    <h6 id="blogCount">{{ $totalComments }}</h6>
                    <span class="text-muted small pt-2">comments</span>
                </div>
            </div>
        </div>
      </div>
      </div>
      <!-- End Blog Comment count Card -->

      <!-- Blog Writer Count Card -->
      <div class="col-xxl-12 col-md-6">
      <div class="card info-card sales-card" style="background-color: #fbfada;">
        <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow" style ="background-color: #dbe8d7;">
                <li class="dropdown-header text-start">
                    <h6 style= "color: #435860;">Filter</h6>
                </li>
                <!-- Display static counts directly in the dropdown menu -->
                <li><a class="dropdown-item" href="#">Admin: <strong>{{ $totalAdminWriters }}</strong></a></li>
                <li><a class="dropdown-item" href="#">User: <strong>{{ $totalUserWriters }}</strong></a></li>
            </ul>
        </div>
        <div class="card-body">
            <h5 class="card-title">Blog Writers <span id="timePeriod">| Total</span></h5>
            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                    <h6 id="blogCount">{{ $totalWriters }}</h6>
                    <span class="text-muted small pt-2">writers</span>
                </div>
            </div>
        </div>
      </div>
      </div>
    <!-- End Blog Count Card -->

    <!--Reports-->
    <div class="col-12">
              <div class="card">
                <div class="card-body" style="background-color: #fbfada;">
                  <h5 class="card-title">Reports (COLORS) <span>All Time</span></h5>

      <!--Line Chart-->
                  <div id="reportsChart1"></div>

                  <script>
                  document.addEventListener("DOMContentLoaded", () => {
                  var options = {
                  series: [{
                    name: 'Blogs',
                    data: [{{ $todayBlogs }}, {{ $thisMonthBlogs }}, {{ $thisYearBlogs }}, {{ $totalBlogs }}]
                  }, {
                    name: 'Comments',
                    data: [{{ $todayComments }}, {{ $thisMonthComments }}, {{ $thisYearComments }}, {{ $totalComments }}]
                  }, {
                    name: 'Writers',
                    data: [{{ $totalUserWriters }}, {{ $totalAdminWriters }}, {{ $totalWriters }}]
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

              var chart = new ApexCharts(document.querySelector("#reportsChart1"), options);
              chart.render();
            });
          </script>

      <!--End Line Chart-->

                </div>

              </div>
            </div>
      <!--End Reports--> 

    <!-- End Colors part -->

    </div>
    </div><!-- End Left side columns -->

    <!-- Right side columns -->
    <div class="col-lg-6">
       <div class="row">
        <p></p>
        <h2> Your: </h2>

        <!-- Blog Count Card -->
        <div class="col-xxl-6 col-md-6">
        <div class="card info-card sales-card" style="background-color: #fbfada;">
        <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow" style ="background-color: #dbe8d7;">
                <li class="dropdown-header text-start">
                    <h6 style= "color: #435860;">Filter</h6>
                </li>
                <!-- Display static counts directly in the dropdown menu -->
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

        <!-- Comment Reply Count Card -->
        <div class="col-xxl-12 col-md-6">
        <div class="card info-card sales-card" style="background-color: #fbfada;">
        <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow" style ="background-color: #dbe8d7;">
                <li class="dropdown-header text-start">
                    <h6 style= "color: #435860;">Latest Replies: </h6>
                </li>
                <!-- Display latest replies directly in the dropdown menu -->
                @forelse ($latestReplies as $reply)
                <li><a class="dropdown-item" href="#">{{ $reply->reply_user_name }} on "<strong>{{ $reply->blog_title }}...</strong>": {{ $reply->reply_message }}</a></li>
                @empty
                <li><a class="dropdown-item" href="#">No replies found</a></li>
                @endforelse
            </ul>
        </div>
        <div class="card-body">
            <h5 class="card-title">Replies<span id="timePeriod">| To your Comments</span></h5>
            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class='bx bx-chat'></i>
                </div>
                <div class="ps-3">
                    <h6 id="blogCount">{{ $userTotalReplies }}</h6>
                    <span class="text-muted small pt-2">replies</span>
                </div>
            </div>
        </div>
        </div>
        </div>
        <!-- End Comment Reply count Card -->

        <!--Reports-->
        <div class="col-12">
          <div class="card">
            <div class="card-body" style="background-color: #fbfada;">
              <h5 class="card-title">Reports (Your) <span>All Time</span></h5>

              <!--Line Chart-->
                <div id="reportsChart2"></div>

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

                    var chart = new ApexCharts(document.querySelector("#reportsChart2"), options);
                    chart.render();
                    });
                  </script>
                  <!--End Line Chart-->

            </div>
          </div>
        </div>
        <!--End Reports-->

      </div>
    </div><!-- End Right side columns -->

      <!--Row for Budget Report and Website Traffic-->
      <div class="row">
      <!-- Blog User Report -->
        <div class="col-lg-6">
        <div class="card">
        <div class="card-body pb-0" style="background-color: #fbfada;">
            <h5 class="card-title">User Blogging Activity <span>| All time</span></h5>
            <div id="userBlogChart" style="min-height: 400px;" class="echart"></div>
            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    const chart = echarts.init(document.querySelector("#userBlogChart"));
                    chart.setOption({
                        tooltip: {
                            trigger: 'axis',
                            axisPointer: {            // Use line pointer for tooltip
                                type: 'shadow'        
                            }
                        },
                        xAxis: {
                            type: 'category',
                            data: @json($usersWithBlogCount->pluck('name'))
                        },
                        yAxis: {
                            type: 'value'
                        },
                        series: [{
                            data: @json($usersWithBlogCount->pluck('value')),
                            type: 'bar'
                        }]
                    });
                });
            </script>
        </div>
        </div>
        </div>


        <!-- Category Pie chart-->
        <div class="col-lg-6">
        <div class="card">
            
            <div class="card-body pb-0" style="background-color: #fbfada;">
                <h5 class="card-title">Categories<span>| blog wise</span></h5>
                <div id="trafficChart" style="min-height: 400px;" class="echart"></div>
                <script>
                document.addEventListener("DOMContentLoaded", () => {
                // Convert PHP array to JavaScript object safely using JSON.stringify in PHP
                const categoryData = JSON.parse('<?php echo addslashes(json_encode($categoryData)); ?>');

                const chart = echarts.init(document.querySelector("#trafficChart"));  // Ensure this selector matches your div id
                chart.setOption({
        tooltip: {
            trigger: 'item',
            formatter: '{a} <br/>{b}: {c} ({d}%)'
        },
        color: [
            '#a8d5ba',  // soft mint
            '#ffd1dc',  // pastel pink
            '#d3f3ee',  // light aqua
            '#f9d5e5',  // light rose pink
            '#7db5a3',  // muted sea green
            '#a4bdfc',  // pastel blue
            '#f7cd72',  // pastel yellow
            '#c9e4de',  // very pale (mostly white) cyan
            '#b7e2c7',  // pale robin egg blue
            '#ff9f80',  // pastel coral
            '#68b4a1',  // soft teal
            '#b79fcb',  // pastel purple
            '#30ba8f',  // turquoise green
            '#f7cabf',  // pastel peach
            '#d3a4f9',  // pastel violet
            '#78d6ac',  // pastel sea green
            '#ffccb6',  // pastel orange
            '#a3c1ad',  // pastel sage
            '#c6c1f0',  // pastel periwinkle
            '#eba3a3'   // pastel red
        ], 
        legend: {
            orient: 'horizontal',
            top: 'top',            // Position at the top
            left: 'center',  
            data: categoryData.map(item => item.name)
        },
        series: [{
            name: 'Blog Distribution',
            type: 'pie',
            radius: ['50%', '70%'],
            center: ['50%', '60%'],
            avoidLabelOverlap: false,
            label: {
                show: false,
                position: 'center'
            },
            emphasis: {
                label: {
                    show: true,
                    fontSize: '18',
                    fontWeight: 'bold'
                }
            },
            labelLine: {
                show: false
            },
            data: categoryData
        }]
        });
                });
                </script>
            </div>
        </div>

        <!-- End Category Pie Chart -->
        </div>
        </div>
        <!-- End Row -->


      </div>
              
    </section> 
    
@endsection

@section('script')

@endsection
