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

    <!-- Sidebar -->
    <!--    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">-->

    <!--        &lt;!&ndash; Sidebar - Brand &ndash;&gt;-->
    <!--        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">-->
    <!--            <div class="sidebar-brand-icon rotate-n-15">-->
    <!--                <i class="fas fa-laugh-wink"></i>-->
    <!--            </div>-->
    <!--            <div class="sidebar-brand-text mx-3">Menu</div>-->
    <!--        </a>-->

    <!--        &lt;!&ndash; Divider &ndash;&gt;-->
    <!--        <hr class="sidebar-divider my-0">-->

    <!--        &lt;!&ndash; Nav Item - Dashboard &ndash;&gt;-->
    <!--        <li class="nav-item active">-->
    <!--            <a class="nav-link" href="index.html">-->
    <!--                <i class="fas fa-fw fa-tachometer-alt"></i>-->
    <!--                <span>Dashboard</span></a>-->
    <!--        </li>-->

    <!--        &lt;!&ndash; Divider &ndash;&gt;-->
    <!--        <hr class="sidebar-divider">-->

    <!--        &lt;!&ndash; Heading &ndash;&gt;-->
    <!--        <div class="sidebar-heading">-->
    <!--            Interface-->
    <!--        </div>-->

    <!--        &lt;!&ndash; Nav Item - Pages Collapse Menu &ndash;&gt;-->
    <!--        <li class="nav-item">-->
    <!--            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"-->
    <!--               aria-expanded="true" aria-controls="collapseTwo">-->
    <!--                <i class="fas fa-fw fa-cog"></i>-->
    <!--                <span>Components</span>-->
    <!--            </a>-->
    <!--            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">-->
    <!--                <div class="bg-white py-2 collapse-inner rounded">-->
    <!--                    <h6 class="collapse-header">Custom Components:</h6>-->
    <!--                    <a class="collapse-item" href="buttons.html">Buttons</a>-->
    <!--                    <a class="collapse-item" href="cards.html">Cards</a>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </li>-->

    <!--        &lt;!&ndash; Nav Item - Utilities Collapse Menu &ndash;&gt;-->
    <!--        <li class="nav-item">-->
    <!--            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"-->
    <!--               aria-expanded="true" aria-controls="collapseUtilities">-->
    <!--                <i class="fas fa-fw fa-wrench"></i>-->
    <!--                <span>Utilities</span>-->
    <!--            </a>-->
    <!--            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"-->
    <!--                 data-parent="#accordionSidebar">-->
    <!--                <div class="bg-white py-2 collapse-inner rounded">-->
    <!--                    <h6 class="collapse-header">Custom Utilities:</h6>-->
    <!--                    <a class="collapse-item" href="utilities-color.html">Colors</a>-->
    <!--                    <a class="collapse-item" href="utilities-border.html">Borders</a>-->
    <!--                    <a class="collapse-item" href="utilities-animation.html">Animations</a>-->
    <!--                    <a class="collapse-item" href="utilities-other.html">Other</a>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </li>-->

    <!--        &lt;!&ndash; Divider &ndash;&gt;-->
    <!--        <hr class="sidebar-divider">-->

    <!--        &lt;!&ndash; Heading &ndash;&gt;-->
    <!--        <div class="sidebar-heading">-->
    <!--            Addons-->
    <!--        </div>-->

    <!--        &lt;!&ndash; Nav Item - Pages Collapse Menu &ndash;&gt;-->
    <!--        <li class="nav-item">-->
    <!--            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"-->
    <!--               aria-expanded="true" aria-controls="collapsePages">-->
    <!--                <i class="fas fa-fw fa-folder"></i>-->
    <!--                <span>Pages</span>-->
    <!--            </a>-->
    <!--            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">-->
    <!--                <div class="bg-white py-2 collapse-inner rounded">-->
    <!--                    <h6 class="collapse-header">Login Screens:</h6>-->
    <!--                    <a class="collapse-item" href="login.html">Login</a>-->
    <!--                    <a class="collapse-item" href="register.html">Register</a>-->
    <!--                    <a class="collapse-item" href="forgot-password.html">Forgot Password</a>-->
    <!--                    <div class="collapse-divider"></div>-->
    <!--                    <h6 class="collapse-header">Other Pages:</h6>-->
    <!--                    <a class="collapse-item" href="404.html">404 Page</a>-->
    <!--                    <a class="collapse-item" href="blank.html">Blank Page</a>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </li>-->

    <!--        &lt;!&ndash; Nav Item - Charts &ndash;&gt;-->
    <!--        <li class="nav-item">-->
    <!--            <a class="nav-link" href="charts.html">-->
    <!--                <i class="fas fa-fw fa-chart-area"></i>-->
    <!--                <span>Charts</span></a>-->
    <!--        </li>-->

    <!--        &lt;!&ndash; Nav Item - Tables &ndash;&gt;-->
    <!--        <li class="nav-item">-->
    <!--            <a class="nav-link" href="tables.html">-->
    <!--                <i class="fas fa-fw fa-table"></i>-->
    <!--                <span>Tables</span></a>-->
    <!--        </li>-->

    <!--        &lt;!&ndash; Divider &ndash;&gt;-->
    <!--        <hr class="sidebar-divider d-none d-md-block">-->

    <!--        &lt;!&ndash; Sidebar Toggler (Sidebar) &ndash;&gt;-->
    <!--        <div class="text-center d-none d-md-inline">-->
    <!--            <button class="rounded-circle border-0" id="sidebarToggle"></button>-->
    <!--        </div>-->

    <!--        &lt;!&ndash; Sidebar Message &ndash;&gt;-->
    <!--        <div class="sidebar-card">-->
    <!--            <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="">-->
    <!--            <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>-->
    <!--            <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>-->
    <!--        </div>-->

    <!--    </ul>-->
    <!-- End of Sidebar -->

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
                    <div class="input-group col-4">
                        <input type="text" name="keyword" class="form-control bg-light border-0 small" placeholder="Search for..."
                               aria-label="Search" aria-describedby="basic-addon2" onchange="onSearchChange()">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" id="searchBtn" disabled>
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                    <div class="input-group col-2">
                        <select class="form-select form-control" id="category" onchange="onCategoryChange()"
                                aria-label="Ngành hàng">
                            <option selected>Ngành hàng</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-2 input-group">
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
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
{{--                    <li class="nav-item dropdown no-arrow d-sm-none">--}}
{{--                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"--}}
{{--                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                            <i class="fas fa-search fa-fw"></i>--}}
{{--                        </a>--}}
{{--                        <!-- Dropdown - Messages -->--}}
{{--                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"--}}
{{--                             aria-labelledby="searchDropdown">--}}
{{--                            <form action="{{ route('keyword.search.list') }}" id="searchForm"--}}
{{--                                  class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 w-100 navbar-search" style="display: flex !important;">--}}
{{--                                <div class="input-group col-4">--}}
{{--                                    <input type="text" name="keyword" class="form-control bg-light border-0 small" placeholder="Search for..."--}}
{{--                                           aria-label="Search" aria-describedby="basic-addon2">--}}
{{--                                    <div class="input-group-append">--}}
{{--                                        <button class="btn btn-primary" type="submit">--}}
{{--                                            <i class="fas fa-search fa-sm"></i>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="input-group col-2">--}}
{{--                                    <select class="form-select form-control" id="category" onchange="onCategoryChange()"--}}
{{--                                            aria-label="Ngành hàng">--}}
{{--                                        <option selected>Ngành hàng</option>--}}
{{--                                        @foreach($categories as $category)--}}
{{--                                            <option value="{{ $category->id }}">{{ $category->name }}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                                <div class="col-2 input-group">--}}
{{--                                    <select class="form-select form-control" id="sorting" onchange="onSortingChange()"--}}
{{--                                            aria-label="Sắp xếp">--}}
{{--                                        <option selected>Sắp xếp</option>--}}
{{--                                        <option value="priceDesc">Giá: Cao đến thấp</option>--}}
{{--                                        <option value="priceAsc">Giá: Thấp đến cao</option>--}}
{{--                                        <option value="volumeDesc">Lượng tìm kiếm: Cao đến thấp</option>--}}
{{--                                        <option value="volumeAsc">Lượng tìm kiếm: Thấp đến cao</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </li>--}}

                    <!-- Nav Item - Alerts -->
                    <!--                    <li class="nav-item dropdown no-arrow mx-1">-->
                    <!--                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"-->
                    <!--                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                    <!--                            <i class="fas fa-bell fa-fw"></i>-->
                    <!--                            &lt;!&ndash; Counter - Alerts &ndash;&gt;-->
                    <!--                            <span class="badge badge-danger badge-counter">3+</span>-->
                    <!--                        </a>-->
                    <!--                        &lt;!&ndash; Dropdown - Alerts &ndash;&gt;-->
                    <!--                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated&#45;&#45;grow-in"-->
                    <!--                             aria-labelledby="alertsDropdown">-->
                    <!--                            <h6 class="dropdown-header">-->
                    <!--                                Alerts Center-->
                    <!--                            </h6>-->
                    <!--                            <a class="dropdown-item d-flex align-items-center" href="#">-->
                    <!--                                <div class="mr-3">-->
                    <!--                                    <div class="icon-circle bg-primary">-->
                    <!--                                        <i class="fas fa-file-alt text-white"></i>-->
                    <!--                                    </div>-->
                    <!--                                </div>-->
                    <!--                                <div>-->
                    <!--                                    <div class="small text-gray-500">December 12, 2019</div>-->
                    <!--                                    <span class="font-weight-bold">A new monthly report is ready to download!</span>-->
                    <!--                                </div>-->
                    <!--                            </a>-->
                    <!--                            <a class="dropdown-item d-flex align-items-center" href="#">-->
                    <!--                                <div class="mr-3">-->
                    <!--                                    <div class="icon-circle bg-success">-->
                    <!--                                        <i class="fas fa-donate text-white"></i>-->
                    <!--                                    </div>-->
                    <!--                                </div>-->
                    <!--                                <div>-->
                    <!--                                    <div class="small text-gray-500">December 7, 2019</div>-->
                    <!--                                    $290.29 has been deposited into your account!-->
                    <!--                                </div>-->
                    <!--                            </a>-->
                    <!--                            <a class="dropdown-item d-flex align-items-center" href="#">-->
                    <!--                                <div class="mr-3">-->
                    <!--                                    <div class="icon-circle bg-warning">-->
                    <!--                                        <i class="fas fa-exclamation-triangle text-white"></i>-->
                    <!--                                    </div>-->
                    <!--                                </div>-->
                    <!--                                <div>-->
                    <!--                                    <div class="small text-gray-500">December 2, 2019</div>-->
                    <!--                                    Spending Alert: We've noticed unusually high spending for your account.-->
                    <!--                                </div>-->
                    <!--                            </a>-->
                    <!--                            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>-->
                    <!--                        </div>-->
                    <!--                    </li>-->

                    <!-- Nav Item - Messages -->
                    <!--                    <li class="nav-item dropdown no-arrow mx-1">-->
                    <!--                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"-->
                    <!--                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                    <!--                            <i class="fas fa-envelope fa-fw"></i>-->
                    <!--                            &lt;!&ndash; Counter - Messages &ndash;&gt;-->
                    <!--                            <span class="badge badge-danger badge-counter">7</span>-->
                    <!--                        </a>-->
                    <!--                        &lt;!&ndash; Dropdown - Messages &ndash;&gt;-->
                    <!--&lt;!&ndash;                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated&#45;&#45;grow-in"&ndash;&gt;-->
                    <!--&lt;!&ndash;                             aria-labelledby="messagesDropdown">&ndash;&gt;-->
                    <!--&lt;!&ndash;                            <h6 class="dropdown-header">&ndash;&gt;-->
                    <!--&lt;!&ndash;                                Message Center&ndash;&gt;-->
                    <!--&lt;!&ndash;                            </h6>&ndash;&gt;-->
                    <!--&lt;!&ndash;                            <a class="dropdown-item d-flex align-items-center" href="#">&ndash;&gt;-->
                    <!--&lt;!&ndash;                                <div class="dropdown-list-image mr-3">&ndash;&gt;-->
                    <!--&lt;!&ndash;                                    <img class="rounded-circle" src="img/undraw_profile_1.svg"&ndash;&gt;-->
                    <!--&lt;!&ndash;                                         alt="">&ndash;&gt;-->
                    <!--&lt;!&ndash;                                    <div class="status-indicator bg-success"></div>&ndash;&gt;-->
                    <!--&lt;!&ndash;                                </div>&ndash;&gt;-->
                    <!--&lt;!&ndash;                                <div class="font-weight-bold">&ndash;&gt;-->
                    <!--&lt;!&ndash;                                    <div class="text-truncate">Hi there! I am wondering if you can help me with a&ndash;&gt;-->
                    <!--&lt;!&ndash;                                        problem I've been having.</div>&ndash;&gt;-->
                    <!--&lt;!&ndash;                                    <div class="small text-gray-500">Emily Fowler · 58m</div>&ndash;&gt;-->
                    <!--&lt;!&ndash;                                </div>&ndash;&gt;-->
                    <!--&lt;!&ndash;                            </a>&ndash;&gt;-->
                    <!--&lt;!&ndash;                            <a class="dropdown-item d-flex align-items-center" href="#">&ndash;&gt;-->
                    <!--&lt;!&ndash;                                <div class="dropdown-list-image mr-3">&ndash;&gt;-->
                    <!--&lt;!&ndash;                                    <img class="rounded-circle" src="img/undraw_profile_2.svg"&ndash;&gt;-->
                    <!--&lt;!&ndash;                                         alt="">&ndash;&gt;-->
                    <!--&lt;!&ndash;                                    <div class="status-indicator"></div>&ndash;&gt;-->
                    <!--&lt;!&ndash;                                </div>&ndash;&gt;-->
                    <!--&lt;!&ndash;                                <div>&ndash;&gt;-->
                    <!--&lt;!&ndash;                                    <div class="text-truncate">I have the photos that you ordered last month, how&ndash;&gt;-->
                    <!--&lt;!&ndash;                                        would you like them sent to you?</div>&ndash;&gt;-->
                    <!--&lt;!&ndash;                                    <div class="small text-gray-500">Jae Chun · 1d</div>&ndash;&gt;-->
                    <!--&lt;!&ndash;                                </div>&ndash;&gt;-->
                    <!--&lt;!&ndash;                            </a>&ndash;&gt;-->
                    <!--&lt;!&ndash;                            <a class="dropdown-item d-flex align-items-center" href="#">&ndash;&gt;-->
                    <!--&lt;!&ndash;                                <div class="dropdown-list-image mr-3">&ndash;&gt;-->
                    <!--&lt;!&ndash;                                    <img class="rounded-circle" src="img/undraw_profile_3.svg"&ndash;&gt;-->
                    <!--&lt;!&ndash;                                         alt="">&ndash;&gt;-->
                    <!--&lt;!&ndash;                                    <div class="status-indicator bg-warning"></div>&ndash;&gt;-->
                    <!--&lt;!&ndash;                                </div>&ndash;&gt;-->
                    <!--&lt;!&ndash;                                <div>&ndash;&gt;-->
                    <!--&lt;!&ndash;                                    <div class="text-truncate">Last month's report looks great, I am very happy with&ndash;&gt;-->
                    <!--&lt;!&ndash;                                        the progress so far, keep up the good work!</div>&ndash;&gt;-->
                    <!--&lt;!&ndash;                                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>&ndash;&gt;-->
                    <!--&lt;!&ndash;                                </div>&ndash;&gt;-->
                    <!--&lt;!&ndash;                            </a>&ndash;&gt;-->
                    <!--&lt;!&ndash;                            <a class="dropdown-item d-flex align-items-center" href="#">&ndash;&gt;-->
                    <!--&lt;!&ndash;                                <div class="dropdown-list-image mr-3">&ndash;&gt;-->
                    <!--&lt;!&ndash;                                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"&ndash;&gt;-->
                    <!--&lt;!&ndash;                                         alt="">&ndash;&gt;-->
                    <!--&lt;!&ndash;                                    <div class="status-indicator bg-success"></div>&ndash;&gt;-->
                    <!--&lt;!&ndash;                                </div>&ndash;&gt;-->
                    <!--&lt;!&ndash;                                <div>&ndash;&gt;-->
                    <!--&lt;!&ndash;                                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone&ndash;&gt;-->
                    <!--&lt;!&ndash;                                        told me that people say this to all dogs, even if they aren't good...</div>&ndash;&gt;-->
                    <!--&lt;!&ndash;                                    <div class="small text-gray-500">Chicken the Dog · 2w</div>&ndash;&gt;-->
                    <!--&lt;!&ndash;                                </div>&ndash;&gt;-->
                    <!--&lt;!&ndash;                            </a>&ndash;&gt;-->
                    <!--&lt;!&ndash;                            <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>&ndash;&gt;-->
                    <!--&lt;!&ndash;                        </div>&ndash;&gt;-->
                    <!--                    </li>-->

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



                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
{{--                <div class="d-sm-flex align-items-center justify-content-between mb-4">--}}
{{--                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>--}}
{{--                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i--}}
{{--                            class="fas fa-download fa-sm text-white-50"></i> Xuất file</a>--}}
{{--                </div>--}}

                <!-- Content Row -->
                <div class="row">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Lượng tìm kiếm
                                        </div>
                                        <div
                                            class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($data->volume) }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Giá từ khóa
                                        </div>
                                        <div
                                            class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($data->price) }}
                                            đ
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Lượng kết quả tìm kiếm trên Google
                                        </div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ number_format((int)$google_volume) }}</div>
                                            </div>
                                            <div class="col">
                                                <!--                                                <div class="progress progress-sm mr-2">-->
                                                <!--                                                    <div class="progress-bar bg-info" role="progressbar"-->
                                                <!--                                                         style="width: 50%" aria-valuenow="50" aria-valuemin="0"-->
                                                <!--                                                         aria-valuemax="100"></div>-->
                                                <!--                                                </div>-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Requests Card Example -->
                </div>

                <!-- Content Row -->

                <div class="row">

                    <!-- Area Chart -->
                    <div class="col-xl-8 col-lg-7">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Lượng tìm kiếm trên google</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                         aria-labelledby="dropdownMenuLink">
                                        <div class="dropdown-header">Dropdown Header:</div>
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="myAreaChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pie Chart -->
                    <div class="col-xl-4 col-lg-5">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Sources</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                         aria-labelledby="dropdownMenuLink">
                                        <div class="dropdown-header">Dropdown Header:</div>
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-pie pt-4 pb-2">
                                    <canvas id="myPieChart"></canvas>
                                </div>
                                <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Tìm kiếm
                                        </span>
                                    <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Thương mại điện tử
                                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content Row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <div class="container-fluid">
            <div class="row ml-2 mr-2">
                <div class="col-12 card p-0">
                    <div class="table-responsive p-0">
                        <table class="col-12 table table-sm" id="dataTable">
                            <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Hình ảnh</th>
                                <th width="450px">Tên Sản phẩm</th>
                                <th>Giá</th>
                                <th>Doanh số 30 ngày qua</th>
                                <th>Tổng doanh số</th>
                                <th>Lượt xem</th>
                                <th>Lượt thích</th>
                                <th>Đánh giá</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr style="color: #24292e !important; line-height: 1.4">
                                    <td>{{ $loop->index + 1  }}</td>
                                    <td><img src="{{ asset("storage/".$product->thumbnail.".jpg") }}" style="height: 100px; width: auto" alt=""></td>
                                    <td><a href="{{ $product->slug }}">{{ $product->name }}</a></td>
                                    <td>{{ number_format($product->price_min/100000) }}đ - {{ number_format($product->price_max/100000) }}đ</td>
                                    <td>{{ $product->sold }}</td>
                                    <td>{{ $product->history_sold }}</td>
                                    <td>{{ $product->view }}</td>
                                    <td>{{ $product->liked }}</td>
                                    <td class="rating" data-rating="{{ $product->rating }}">
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
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
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.6/js/star-rating.min.js" type="text/javascript"></script>--}}

<!-- Page level custom scripts -->
<script type="text/javascript">
    $(".rating").starRating({
        totalStars: 5,
        starSize: 25,
        emptyColor: 'lightgray',
        hoverColor: 'salmon',
        activeColor: 'orange',
        useGradient: false,
        readOnly: true

    });
    chartData = [];
    volume_analytic = [];
    @if(is_array($shopee_volume))
    @foreach($shopee_volume as $volume)
        volume_analytic.push({{ $volume }})
        @endforeach
    @endif
    labels = [];
	@if(is_array($google_analytic))
        @foreach($google_analytic as $analytic)
        @if(true)
            chartData.push({{$analytic["value"][0]}});
            labels.push("{{$analytic["formattedTime"]}}")
        @endif
        @endforeach
	@endif
    var ctx = document.getElementById("myAreaChart");
    console.log(chartData)
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: "Tỉ lệ tìm kiếm",
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0.05)",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: chartData,
            },
                {
                    label: "Diễn biến trên shopee",
                    lineTension: 0.3,
                    backgroundColor: "rgba(28, 200, 138, 0.05)",
                    borderColor: "rgba(28, 200, 138, 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(28, 200, 138, 1)",
                    pointBorderColor: "rgba(28, 200, 138, 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(28, 200, 138, 1)",
                    pointHoverBorderColor: "rgba(28, 200, 138, 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: volume_analytic,
                }
            ],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function (value, index, values) {
                            return number_format(value);
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    label: function (tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                    }
                }
            }
        }
    });

</script>

<script type="text/javascript">
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Google Search", "Shopee"],
            datasets: [{
                data: [{{ (int)$google_volume }}, {{ $data->volume }}],
                backgroundColor: ['#4e73df', '#1cc88a'],
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
                display: false
            },
            cutoutPercentage: 80,
        },
    });
</script>
<script src="{{ asset('js/listing.js') }}"></script>

</body>

</html>
