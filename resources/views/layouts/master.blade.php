<!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/nusa-removebg-preview.png') }}">
    <link rel="icon" type="image/png')}}" href="{{ asset('assets/img/nusa-removebg-preview.png') }}">
    <title>
        Nusa Inventory
    </title>
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/sweetalert2-11.14.4/package/dist/sweetalert2.min.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="{{ asset('assets/js/font-awesome.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/DataTables/datatables.min.css') }}" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link id="pagestyle" href="{{ asset('assets/css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <nav class="navbar navbar-main navbar-expand-lg bg-transparent position-absolute top-0 start-0 end-0 px-4 z-index-3 shadow-none border-radius-xl"
    id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3 d-flex justify-content-between align-items-center">

            {{-- Title halaman atau bisa kosong --}}
            <h6 class="text-white mb-0"> </h6>

            {{-- Toggle Sidebar (dipindah ke kanan) --}}
            <a href="javascript:;" class="nav-link text-white p-0 d-xl-none" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                </div>
            </a>

        </div>
    </nav>

    {{-- Background header --}}

    {{-- Sidebar dan Content --}}
    @include('layouts.sidebar')

    <main class="main-content position-relative border-radius-lg pt-2">
        @yield('content')
    </main>


    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
    <script src="{{ asset('assets/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/sweetalert2-11.14.4/package/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/DataTables/datatables.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        new DataTable('#data-table', {
            responsive: true,
            rowReorder: {
                selector: 'td:nth-child(2)'
            }
        });
    </script>
    <script>
        new DataTable('#data-table-dashboard', {
            responsive: true,
            rowReorder: {
                selector: 'td:nth-child(2)'
            }
        });
    </script>
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
        var ctx1 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#5e72e4",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
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
    <script async defer src="{{ asset('assets/js/buttons.js') }}"></script>
    <script src="{{ asset('assets/js/argon-dashboard.js') }}"></script>
    <style>
        body.modal-open #sidenav-main,
        body.swal2-shown #sidenav-main {
            filter: blur(3px);
            opacity: 0.4;
            pointer-events: none;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if ($errors->any())
                // Jika ada error, buka modal
                var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
                myModal.show();
            @endif
        });
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
  <script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "-- Select Supplier --",
            allowClear: true
        });
    });
</script>
<script>
    $('#exampleModal').on('shown.bs.modal', function () {
        $('.select2').select2({
            dropdownParent: $('#exampleModal'),
            placeholder: "-- Select Supplier --",
            allowClear: true
        });
    });
</script>
</body>

</html>
