@extends('backend.layouts.master-layout')

@section('body')

  <!-- body content-wrapper start -->
  <div class="row">
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Welcome Admin</h3>
                <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
            </div>
            <div class="col-12 col-xl-4">
                <div class="justify-content-end d-flex">
                    <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                        <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                            <a class="dropdown-item" href="#">January - March</a>
                            <a class="dropdown-item" href="#">March - June</a>
                            <a class="dropdown-item" href="#">June - August</a>
                            <a class="dropdown-item" href="#">August - November</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card tale-bg">
            <div class="card-people mt-auto">
                <img src="{{asset('assets/images/dashboard/people.svg')}}" alt="people" />
                <div class="weather-info">
                    <div class="d-flex">
                        <div>
                            <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2>
                        </div>
                        <div class="ml-2">
                            <h4 class="location font-weight-normal">New York</h4>
                            <h6 class="font-weight-normal">US</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin transparent">
        <div class="row">
            <div class="col-md-6 mb-4 stretch-card transparent">
                <div class="card card-tale">
                    <div class="card-body">
                        <p class="mb-4">Today’s Order</p>
                        <p class="fs-30 mb-2">4006</p>
                        {{-- <p>10.00% (30 days)</p> --}}
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4 stretch-card transparent">
                <div class="card card-dark-blue">
                    <div class="card-body">
                        <p class="mb-4">Total Revenue</p>
                        <p class="fs-30 mb-2">64</p>
                        {{-- <p>22.00% (30 days)</p> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                <div class="card card-light-blue">
                    <div class="card-body">
                        <p class="mb-4">Trending Products</p>
                        <p class="fs-30 mb-2">34040</p>
                        {{-- <p>2.00% (30 days)</p> --}}
                    </div>
                </div>
            </div>
            <div class="col-md-6 stretch-card transparent">
                <div class="card card-light-danger">
                    <div class="card-body">
                        <p class="mb-4">Most Selling Products</p>
                        <p class="fs-30 mb-2">47033</p>
                        {{-- <p>0.22% (30 days)</p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card position-relative">
            <div class="card-body">
                <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                                    <div class="ml-xl-4 mt-3">
                                        <p class="card-title">Detailed Reports</p>
                                        <h1 class="text-primary">$34040</h1>
                                        <h3 class="font-weight-500 mb-xl-4 text-primary">North America</h3>
                                        <p class="mb-2 mb-xl-0">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
                                    </div>
                                </div>
                                <div class="col-md-12 col-xl-9">
                                    <div class="row">
                                        <div class="col-md-6 border-right">
                                            <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                <table class="table table-borderless report-table">
                                                    <tr>
                                                        <td class="text-muted">Illinois</td>
                                                        <td class="w-100 px-0">
                                                            <div class="progress progress-md mx-4">
                                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </td>
                                                        <td><h5 class="font-weight-bold mb-0">713</h5></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">Washington</td>
                                                        <td class="w-100 px-0">
                                                            <div class="progress progress-md mx-4">
                                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </td>
                                                        <td><h5 class="font-weight-bold mb-0">583</h5></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">Mississippi</td>
                                                        <td class="w-100 px-0">
                                                            <div class="progress progress-md mx-4">
                                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 95%;" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </td>
                                                        <td><h5 class="font-weight-bold mb-0">924</h5></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">California</td>
                                                        <td class="w-100 px-0">
                                                            <div class="progress progress-md mx-4">
                                                                <div class="progress-bar bg-info" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </td>
                                                        <td><h5 class="font-weight-bold mb-0">664</h5></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">Maryland</td>
                                                        <td class="w-100 px-0">
                                                            <div class="progress progress-md mx-4">
                                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </td>
                                                        <td><h5 class="font-weight-bold mb-0">560</h5></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">Alaska</td>
                                                        <td class="w-100 px-0">
                                                            <div class="progress progress-md mx-4">
                                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </td>
                                                        <td><h5 class="font-weight-bold mb-0">793</h5></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <canvas id="north-america-chart"></canvas>
                                            <div id="north-america-legend"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                                    <div class="ml-xl-4 mt-3">
                                        <p class="card-title">Detailed Reports</p>
                                        <h1 class="text-primary">$34040</h1>
                                        <h3 class="font-weight-500 mb-xl-4 text-primary">North America</h3>
                                        <p class="mb-2 mb-xl-0">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
                                    </div>
                                </div>
                                <div class="col-md-12 col-xl-9">
                                    <div class="row">
                                        <div class="col-md-6 border-right">
                                            <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                <table class="table table-borderless report-table">
                                                    <tr>
                                                        <td class="text-muted">Illinois</td>
                                                        <td class="w-100 px-0">
                                                            <div class="progress progress-md mx-4">
                                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </td>
                                                        <td><h5 class="font-weight-bold mb-0">713</h5></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">Washington</td>
                                                        <td class="w-100 px-0">
                                                            <div class="progress progress-md mx-4">
                                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </td>
                                                        <td><h5 class="font-weight-bold mb-0">583</h5></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">Mississippi</td>
                                                        <td class="w-100 px-0">
                                                            <div class="progress progress-md mx-4">
                                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 95%;" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </td>
                                                        <td><h5 class="font-weight-bold mb-0">924</h5></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">California</td>
                                                        <td class="w-100 px-0">
                                                            <div class="progress progress-md mx-4">
                                                                <div class="progress-bar bg-info" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </td>
                                                        <td><h5 class="font-weight-bold mb-0">664</h5></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">Maryland</td>
                                                        <td class="w-100 px-0">
                                                            <div class="progress progress-md mx-4">
                                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </td>
                                                        <td><h5 class="font-weight-bold mb-0">560</h5></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">Alaska</td>
                                                        <td class="w-100 px-0">
                                                            <div class="progress progress-md mx-4">
                                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </td>
                                                        <td><h5 class="font-weight-bold mb-0">793</h5></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <canvas id="south-america-chart"></canvas>
                                            <div id="south-america-legend"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#detailedReports" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#detailedReports" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

  <!-- body content-wrapper ends -->
 @endsection