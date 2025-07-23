<html lang="en" class="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <link href="{{ asset('assets/sweetalert2-11.14.4/package/dist/sweetalert2.min.css') }}" rel="stylesheet" />
    <title>
        Nusa Inventory
    </title>
    <!-- Extra details for Live View on GitHub Pages -->
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/argon-dashboard">
    <!--  Social tags      -->
    <meta name="keywords"
        content="creative tim, html dashboard, html css dashboard, web dashboard, bootstrap 5 dashboard, bootstrap 5, css3 dashboard, bootstrap 5 admin, Argon Dashboard 2 bootstrap 5 dashboard, frontend, responsive bootstrap 5 dashboard, free dashboard, free admin dashboard, free bootstrap 5 admin dashboard">
    <meta name="description"
        content="Argon Dashboard 3 is a beautiful Bootstrap 5 admin dashboard with a large number of components, designed to look beautiful and organized. If you are looking for a tool to manage and visualize data about your business, this dashboard is the thing for you.">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Argon Dashboard 3 by Creative Tim">
    <meta name="twitter:description"
        content="Argon Dashboard 3 is a beautiful Bootstrap 5 admin dashboard with a large number of components, designed to look beautiful and organized. If you are looking for a tool to manage and visualize data about your business, this dashboard is the thing for you.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image"
        content="https://s3.amazonaws.com/creativetim_bucket/products/450/original/opt_sd_free_thumbnail.png">
    <!-- Open Graph data -->
    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Argon Dashboard 3 by Creative Tim">
    <meta property="og:type" content="article">
    <meta property="og:url" content="http://demos.creative-tim.com/argon-dashboard/examples/dashboard.html">
    <meta property="og:image"
        content="https://s3.amazonaws.com/creativetim_bucket/products/450/original/opt_sd_free_thumbnail.png">
    <meta property="og:description"
        content="Argon Dashboard 3 is a beautiful Bootstrap 5 admin dashboard with a large number of components, designed to look beautiful and organized. If you are looking for a tool to manage and visualize data about your business, this dashboard is the thing for you.">
    <meta property="og:site_name" content="Creative Tim">
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet">
    <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <script src="https://ct.pinterest.com/static/ct/token_create.js"></script>
    <script type="text/javascript" async="" src="https://analytics.tiktok.com/i18n/pixel/static/identify_7bf75739.js">
    </script>
    <script type="text/javascript" async="" src="https://analytics.tiktok.com/i18n/pixel/static/main.MTJhNGMzN2YwMw.js"
        data-id="CC6UAQBC77U7GVKHLC4G"></script>
    <script type="text/javascript" async=""
        src="https://www.googletagmanager.com/gtag/js?id=G-LMRL06STSS&amp;cx=c&amp;_slc=1"></script>
    <script type="text/javascript" async=""
        src="https://www.googletagmanager.com/gtag/js?id=G-ZF0KSVVM14&amp;cx=c&amp;_slc=1"></script>
    <script async="" src="https://s.pinimg.com/ct/lib/main.be180668.js"></script>
    <script type="text/javascript" async=""
        src="https://analytics.tiktok.com/i18n/pixel/events.js?sdkid=CC6UAQBC77U7GVKHLC4G&amp;lib=ttq"></script>
    <script type="text/javascript" async="" src="https://snap.licdn.com/li.lms-analytics/insight.min.js"></script>
    <script type="text/javascript" async="" src="https://s.pinimg.com/ct/core.js"></script>
    <script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script>
    <script type="text/javascript" async=""
        src="https://www.google-analytics.com/gtm/js?id=GTM-K9BGS8K&amp;cid=1307251882.1715412257&amp;aip=true"></script>
    <script async="" src="https://www.googletagmanager.com/gtm.js?id=GTM-NKDMSK6"></script>
    <script async="" src="https://www.google-analytics.com/analytics.js"></script>
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/argon-dashboard.min.css?v=2.1.0" rel="stylesheet">
</head>

<body class="">
    <main class="main-content mt-0">
        <section class="min-vh-100 d-flex align-items-center justify-content-center bg-light">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="card shadow border-0 rounded-4">
                            <div class="card-body p-4">
                                <div class="text-center mb-4">
                                    <h4 class="fw-bold">Sign In</h4>
                                    <p class="text-muted">Enter your email and password</p>
                                </div>

                                <form method="post" action="{{ route('actionlogin') }}" >
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control form-control-lg"
                                            placeholder="Enter your email" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control form-control-lg"
                                            placeholder="Enter your password" required>
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary btn-lg">Sign In</button>
                                    </div>

                                    {{-- <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">Remember me</label>
                                </div> --}}

                                </form>

                                {{-- <div class="text-center mt-3">
                                <p class="mb-0 text-muted">
                                    Don't have an account?
                                    <a href="#" class="text-decoration-none text-primary fw-bold">Sign up</a>
                                </p>
                            </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="{{ asset('assets/sweetalert2-11.14.4/package/dist/sweetalert2.min.js') }}"></script>
    <script>
        @if (session('success'))
            Swal.fire({
                title: "Success",
                icon: "success",
                text: "{{ session('success') }}"
            });
        @elseif (session('error'))
            Swal.fire({
                title: "Error",
                icon: "error",
                text: "{{ session('error') }}"
            });
        @endif
    </script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async="" defer="" src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/argon-dashboard.min.js?v=2.1.0"></script>
</body>

</html>
