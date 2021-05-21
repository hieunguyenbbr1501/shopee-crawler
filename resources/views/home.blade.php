<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Menu</title>

    <!-- Custom fonts for this template-->
    <link href=" {{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }} " rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <link rel="stylesheet" href="{{ asset('css/star-rating.css') }}">
    {{--    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.6/css/star-rating.min.css" media="all" rel="stylesheet" type="text/css" />--}}
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                <form action="{{ route('keyword.search.list') }}" id="searchForm"
                      class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 w-100 navbar-search" style="display: flex !important;">
                    <div class="input-group col-lg-4 col-md-12">
                        <input type="text" name="keyword" class="form-control bg-light border-0 small" placeholder="Search for..."
                               aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                    <div class="input-group col-lg-2 col-md-6">
                        <select class="form-select form-control" id="category" onchange="onCategoryChange()"
                                aria-label="Ngành hàng">
                            <option selected>Ngành hàng</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-2 input-group col-md-6">
                        <select class="form-select form-control" id="sorting" onchange="onSortingChange()"
                                aria-label="Sắp xếp">
                            <option selected>Sắp xếp</option>
                            <option value="priceDesc">Giá: Cao đến thấp</option>
                            <option value="priceAsc">Giá: Thấp đến cao</option>
                            <option value="volumeDesc">Lượng tìm kiếm: Cao đến thấp</option>
                            <option value="volumeAsc">Lượng tìm kiếm: Thấp đến cao</option>
                        </select>
                    </div>
                </form>

                <!-- Topbar Navbar -->
                <div class="topbar-divider d-none d-sm-block"></div>

                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->name }}</span>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                         aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Thông tin các ngành hàng</h1>

                <!-- Content Row -->
                <div class="row">

                    <div class="col-xl-8 col-lg-7">

                        <!-- Area Chart -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Đồ thị phân bổ các danh mục</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="myScatterChart"></canvas>
                                </div>
                                <hr>
                            </div>
                        </div>

                        <!-- Bar Chart -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Các từ khóa hot</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-bar">
                                    <canvas id="myBarChart"></canvas>
                                </div>
                                <hr>
                            </div>
                        </div>

                    </div>

                    <!-- Donut Chart -->
                    <div class="col-xl-4 col-lg-5">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Top 5 danh mục theo lượng tìm kiếm</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-pie pt-4">
                                    <canvas id="myPieChart"></canvas>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Shopee Assistant</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Đăng xuất</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Chọn "Đăng xuất" để thực hiện đăng xuất</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                <a class="btn btn-primary" href="{{ route('logout') }}">Đăng xuất</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src=" {{  asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin-2.js') }}"></script>

<!-- Page level custom scripts -->

<!-- Page level plugins -->
<script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('js/demo/chart-area-demo.js') }} "></script>
<script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
<script src="{{ asset('js/star-rating.js') }}"></script>
<script type="text/javascript">
    top_names = [];
    top_volumes = [];
    @foreach($top_categories as $top_category)
        top_names.push("{{ $top_category->name }}");
        top_volumes.push({{ $top_category->total_volume}});
        @endforeach
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: top_names,
            datasets: [{
                data: top_volumes,
                backgroundColor: ['#4e73df', '#1cc88a','#ffc107', '#dc3545', '#343a40'],
                hoverBackgroundColor: ['#2e59d9', '#17a673'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: true,
                position: 'bottom',
                align: 'start'
            },
            cutoutPercentage: 80,
        },
    });
</script>

<script type="text/javascript">
    top_names = [];
    analytic_data = [];
    @foreach($categories_analytic as $category)
    top_names.push("{{ $category->name }}");
    x = "{{ $category->total_volume }}";
    y = "{{ $category->total_keywords }}";
    analytic = {
        x: parseInt(x),
        y: parseInt(y),
        name: "{{ $category->name }}"
    }
    analytic_data.push(analytic);
        @endforeach
        chart_data = [{
            label: top_names,
            data: analytic_data,
            backgroundColor: 'rgb(255, 99, 132)'
        }];
        console.log(chart_data);
    var ctx = document.getElementById("myScatterChart");
    var myScatterChart = new Chart(ctx, {
        type: 'scatter',
        data: {
            labels: top_names,
            datasets: [{
                data: analytic_data,
                backgroundColor: 'rgb(255, 99, 132)',
            }],
        },
        options: {
            legend: {
                display: false,
            },
            maintainAspectRatio: false,
            scales: {
                x: {
                    title: {
                        color: 'red',
                        display: true,
                        text: 'Month'
                    }
                },
                y: {
                    type: 'linear',
                    title: {
                        display: true,
                        text: 'Tổng lượng tìm kiếm',
                    }
                }
            },
            tooltips: {
                callbacks: {
                    label: function(tooltipItem, data) {
                        var label = data.labels[tooltipItem.index];
                        return label + ': (Tổng lượng từ khóa: ' + tooltipItem.yLabel + ', Tổng lượng tìm kiếm: ' + tooltipItem.xLabel + ')';
                    }
                }
            }
        },

    });
</script>

<script type="text/javascript">
    top_names = [];
    analytic_data = [];
    @foreach($top_keywords as $keyword)
    top_names.push("{{ $keyword->name }}");
    analytic_data.push(parseInt("{{ $keyword->volume }}"));
    console.log(analytic_data)
    @endforeach
    var ctx = document.getElementById("myBarChart");
    var myScatterChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: top_names,
            datasets: [{
                data: analytic_data,
                backgroundColor: 'rgb(255, 99, 132)',
            }],
        },
        options: {
            legend: {
                display: false,
            },
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                }
            },
            tooltips: {
                callbacks: {
                    label: function(tooltipItem, data) {
                        var label = data.labels[tooltipItem.index];
                        return label + ': (Tổng lượng từ khóa: ' + tooltipItem.yLabel + ', Tổng lượng tìm kiếm: ' + tooltipItem.xLabel + ')';
                    }
                }
            }
        },

    });
</script>

</body>

</html>
