<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title') - TeachersDesk</title>
    <meta name="description" content="A Educational Website and related information .  ">
    <meta name="keywords" content="School, Teacher, Parent App">
    <meta name="author" content="Hareesh">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('backend/images/favicon.png') }}">


    <!-- css -->
    <!-- <link rel="stylesheet" href="{{ asset('backend/css/vendors.css') }}"> -->
    <!-- <link rel="stylesheet" href="backend/css/plugins.css"> -->
    @yield('css')
    <link rel="stylesheet" rel="preload" href="{{ asset('backend/css/app.min.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('backend/css/color.min.css') }}"> -->
</head>

<body>

    <!-- Loader -->
    <!-- <div id="page-loader" class="show bg-gd-emerald"></div> -->
    <!-- End loader -->



    <!-- Begin page -->
    <div id="page-container" class="sidebar-o side-scroll main-content-narrow">

        <!-- ========== Left Sidebar Start ========== -->

        <nav id="sidebar">
            <!-- Sidebar Content -->
            <div class="sidebar-content">
                <!-- Side Header -->
                <div class="content-header justify-content-lg-center">
                    <!-- Logo -->
                    <div>
                        <span class="smini-visible fw-bold tracking-wide fs-lg">
                            c<span class="text-primary">b</span>
                        </span>
                        <a class="link-fx fw-bold tracking-wide mx-auto" href="">
                            <span class="smini-hidden">

                            </span>
                            <div>
                                <img src="{{ asset('backend/images/td-logo.png') }}" width="45px" alt=""> TeachersDesk
                            </div>
                        </a>
                    </div>
                    <!-- END Logo -->

                    <!-- Options -->

                    <!-- END Options -->
                </div>
                <!-- END Side Header -->

                <!-- Sidebar Scrolling -->
                <div class="js-sidebar-scroll">
                    <!-- Side User -->

                    <!-- END Side User -->

                    <!-- Side Navigation -->
                    <div class="content-side content-side-full">
                        <ul class="nav-main">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{route('admin.home')}}">
                                    <i class="nav-main-link-icon fa fa-house-user"></i>
                                    <span class="nav-main-link-name">Dashboard</span>
                                </a>
                            </li>

                            <li class="nav-main-item {{ str_contains(url()->current(), '/courses') ? 'open' : ''}}">
                                <a class="nav-main-link nav-main-link-submenu {{ str_contains(url()->current(), '/courses') ? 'active' : ''}}"
                                    data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                                    <i class="nav-main-link-icon fa-solid fa-chalkboard-teacher"></i>
                                    <span class="nav-main-link-name">Classes</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('admin.courses') }}">
                                            <span class="nav-main-link-name">View Classes</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('admin.courses.add') }}">
                                            <span class="nav-main-link-name">Add Class</span>
                                        </a>
                                    </li>


                                </ul>
                            </li>

                            <li class="nav-main-item {{ str_contains(url()->current(), '/subjects') ? 'open' : ''}}">
                                <a class="nav-main-link nav-main-link-submenu {{ str_contains(url()->current(), '/subjects') ? 'active' : ''}}"
                                    data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                                    <i class="nav-main-link-icon fa-solid fa-book"></i>
                                    <span class="nav-main-link-name">Subjects</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('admin.subjects') }}">
                                            <span class="nav-main-link-name">View Subjects</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('admin.subjects.add') }}">
                                            <span class="nav-main-link-name">Add Subject</span>
                                        </a>
                                    </li>


                                </ul>
                            </li>
                            <li class="nav-main-item {{ str_contains(url()->current(), '/lessons') ? 'open' : ''}}">
                                <a class="nav-main-link nav-main-link-submenu {{ str_contains(url()->current(), '/lessons') ? 'active' : ''}}"
                                    data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                                    <i class="nav-main-link-icon fa fa-file-text"></i>
                                    <span class="nav-main-link-name">Lessons</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('admin.lessons.add') }}">
                                            <span class="nav-main-link-name">Add Lesson</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('admin.lessons') }}">
                                            <span class="nav-main-link-name">View Lessons</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>


                            <li class="nav-main-item {{ str_contains(url()->current(), '/topics') ? 'open' : ''}}">
                                <a class="nav-main-link nav-main-link-submenu {{ str_contains(url()->current(), '/topics') ? 'active' : ''}}"
                                    data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                                    <i class="nav-main-link-icon fa fa-book-open"></i>
                                    <span class="nav-main-link-name">Topics</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('admin.topics.add') }}">
                                            <span class="nav-main-link-name">Add Topic</span>
                                        </a>
                                    </li>
                                      <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('admin.topics.addsub') }}">
                                            <span class="nav-main-link-name">Add SubTopic</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('admin.topics') }}">
                                            <span class="nav-main-link-name">View Topics</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-main-item {{ str_contains(url()->current(), '/materials') ? 'open' : ''}}">
                                <a class="nav-main-link nav-main-link-submenu  {{ str_contains(url()->current(), '/problems') ? 'active' : ''}}"
                                    data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                    <i class="nav-main-link-icon fa-regular fa-file-alt"></i>
                                    <span class="nav-main-link-name">Materials</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('admin.materials') }}">
                                            <span class="nav-main-link-name">View Materials</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('admin.materials.add') }}">
                                            <span class="nav-main-link-name">Add Material</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            <li class="nav-main-item {{ str_contains(url()->current(), '/example') ? 'open' : ''}}">
                                <a class="nav-main-link nav-main-link-submenu {{ str_contains(url()->current(), '/posts') ? 'active' : ''}}"
                                    data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                                    <i class="nav-main-link-icon fa fa-clipboard-list"></i>
                                    <span class="nav-main-link-name">Examples</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('admin.examples') }}">
                                            <span class="nav-main-link-name">View Examples</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('admin.examples.add') }}">
                                            <span class="nav-main-link-name">Add Example</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            <li class="nav-main-item {{ str_contains(url()->current(), '/videos') ? 'open' : ''}}">
                                <a class="nav-main-link nav-main-link-submenu {{ str_contains(url()->current(), '/videos') ? 'active' : ''}}"
                                    data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                                    <i class="nav-main-link-icon fa-solid fa-video"></i>
                                    <span class="nav-main-link-name">Videos</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('admin.videos') }}">
                                            <span class="nav-main-link-name">View Vidoes</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('admin.videos.add') }}">
                                            <span class="nav-main-link-name">Add Video</span>
                                        </a>
                                    </li>


                                </ul>
                            </li>

                            <li class="nav-main-item {{ str_contains(url()->current(), '/notes') ? 'open' : ''}}">
                                <a class="nav-main-link nav-main-link-submenu  {{ str_contains(url()->current(), '/notes') ? 'active' : ''}}"
                                    data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                    <i class="nav-main-link-icon fa-regular fa-note-sticky"></i>
                                    <span class="nav-main-link-name">Notes</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('admin.notes') }}">
                                            <span class="nav-main-link-name">View Notes</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('admin.notes.add') }}">
                                            <span class="nav-main-link-name">Add Note</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            {{--<li class="nav-main-item {{ str_contains(url()->current(), '/images') ? 'open' : ''}}">
                                <a class="nav-main-link nav-main-link-submenu {{ str_contains(url()->current(), '/images') ? 'active' : ''}}"
                                    data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                                    <i class="nav-main-link-icon fa fa-image"></i>
                                    <span class="nav-main-link-name">Images</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('admin.images') }}">
                                            <span class="nav-main-link-name">View Images</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('admin.images.add') }}">
                                            <span class="nav-main-link-name">Add Image</span>
                                        </a>
                                    </li>

                                </ul>
                            </li> --}}

                            <li class="nav-main-item {{ str_contains(url()->current(), '/pages') ? 'open' : ''}}">
                                <a class="nav-main-link nav-main-link-submenu {{ str_contains(url()->current(), '/pages') ? 'active' : ''}}"
                                    data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                                    <i class="nav-main-link-icon fa-regular fa-file-lines"></i>
                                    <span class="nav-main-link-name">Pages</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('admin.pages') }}">
                                            <span class="nav-main-link-name">View Pages</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{ route('admin.pages.add') }}">
                                            <span class="nav-main-link-name">Add Page</span>
                                        </a>
                                    </li>


                                </ul>
                            </li>









                        </ul>
                    </div>
                    <!-- END Side Navigation -->
                </div>
                <!-- END Sidebar Scrolling -->
            </div>
            <!-- Sidebar Content -->
        </nav>
        <!-- Left Sidebar End -->

        <!-- Header -->
        <header id="page-header">
            <!-- Header Content -->
            <div class="content-header">
                <!-- Left Section -->
                <div class="space-x-1">
                    <!-- Toggle Sidebar -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="layout"
                        data-action="sidebar_toggle">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                    <!-- END Toggle Sidebar -->


                </div>
                <!-- END Left Section -->

                <!-- Right Section -->
                <div class="space-x-1">
                    <!-- User Dropdown -->
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn btn-sm btn-alt-secondary" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user d-sm-none"></i>
                            <span class="d-none d-sm-inline-block fw-semibold">{{ Auth::user()->name }}</span>
                            <i class="fa fa-angle-down opacity-50 ms-1"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0"
                            aria-labelledby="page-header-user-dropdown">
                            <div class="px-2 py-3 bg-body-light rounded-top">
                                <h5 class="h6 text-center mb-0">
                                    {{ Auth::user()->name }}
                                </h5>
                            </div>
                            <div class="p-2">
                                <a class="dropdown-item d-flex align-items-center justify-content-between space-x-1"
                                    href="#">
                                    <span>Profile</span>
                                    <i class="fa fa-fw fa-user opacity-25"></i>
                                </a>


                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item d-flex align-items-center justify-content-between space-x-1"
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                                         document.getElementById('logout-form').submit();">
                                    <span>Sign Out</span>
                                    <i class="fa fa-fw fa-sign-out-alt opacity-25"></i>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- END User Dropdown -->


                </div>
                <!-- END Right Section -->
            </div>
            <!-- END Header Content -->



            <!-- Header Loader -->
            <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
            <div id="page-header-loader" class="overlay-header bg-primary">
                <div class="content-header">
                    <div class="w-100 text-center">
                        <i class="far fa-sun fa-spin text-white"></i>
                    </div>
                </div>
            </div>
            <!-- END Header Loader -->
        </header>
        <!-- END Header -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->



        <main id="main-container">

            <!-- Page Content -->
            <div class="content">

                @yield('content')
            </div>
            <!-- End Page-content -->


        </main>

        <!-- end main content-->


        <!-- Footer -->
        <footer id="page-footer">
            <div class="content py-3">
                <div class="row fs-sm">
                    <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end">
                        Crafted with <i class="fa fa-heart text-danger"></i> by <a class="fw-semibold"
                            href="https://infovict.com" target="_blank">Infovict</a>
                    </div>
                    <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> © TeachersDesk
                    </div>
                </div>
            </div>
        </footer>

        <!-- END Footer -->

    </div>
    <!-- END layout-wrapper -->



    <!-- JavaScript -->
    <script src="{{ asset('backend/js/vendors.js') }}"></script>
    <!-- <script src="{{ asset('backend/js/plugins.js') }}"></script>-->
    @yield('scripts')

    <script src="{{ asset('backend/js/app.js') }}"></script>

</body>

</html>