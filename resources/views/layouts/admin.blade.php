<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <link rel="stylesheet" href="app.css">
    @yield('css')

    <link rel="stylesheet" href="{{ asset('css/admin.css')}}">

    <style>
        .text-primary:hover {
            text-decoration: underline;
        }

        .text-grey {
            color: grey;
        }

        .text-grey:hover{
            color: grey;
        }

        .btn-purple {
            background-color: grey;
            border: 1px solid grey;
            color: white;
            width: 100%;
        }
    </style>
</head>

<body>

    <div class="wrapper">


        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-dark bg-transparent shadow-none">
                <div class="r">
                    <h3 class="mb-0 text-white">LAPORIN</h3>
                    <p class="text-white mb-0">Laporan Indonesia</p>
                </div>

                <ul class="list-unstyled components ml-auto">
                    <ul class="navbar-nav text-center ml-auto">
                        @if (Auth::guard('admin')->user()->level == 'admin')
                        <li class="{{ Request::is('admin/pengaduan') ? 'active' : '' }}">
                            <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                                <a class="bg-transparent font-weight-bold" href="{{ route('dashboard.index') }}">DASHBOARD</a>
                            <a class="bg-transparent font-weight-bold" href="{{ route('pengaduan.index') }}">PENGADUAN</a>
                        </li>
                        <li class="{{ Request::is('admin/petugas') ? 'active' : '' }}">
                            <a class="bg-transparent font-weight-bold" href="{{ route('petugas.index') }}">PETUGAS</a>
                        </li>
                        </li>
                        <li class="{{ Request::is('admin/masyarakat') ? 'active' : '' }}">
                            <a class="bg-transparent font-weight-bold" href="{{ route('masyarakat.index') }}">MASYARAKAT</a>
                            <li class="{{ Request::is('admin/laporan') ? 'active' : '' }}">
                                <a class="bg-transparent font-weight-bold" href="{{ route('laporan.index') }}">LAPORAN</a>
                            </li>
                        </li>
                        {{-- //Batas --}}
                        <li>
                            <a href="{{ route('admin.logout') }}" class="bg-transparent font-weight-bold" style="text-decoration: underline">{{ Auth::guard('admin')->user()->nama_petugas}}</a>
                        </li>
                        @elseif (Auth::guard('admin')->user()->level == 'petugas')
                        <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                            <a class="bg-transparent font-weight-bold" href="{{ route('dashboard.index') }}">DASHBOARD</a>
                        </li>
                        <li class="{{ Request::is('admin/petugas') ? 'active' : '' }}">
                            <a class="bg-transparent font-weight-bold" href="{{ route('pengaduan.index') }}">PENGADUAN</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.logout') }}" class="bg-transparent font-weight-bold" style="text-decoration: underline">{{ Auth::guard('admin')->user()->nama_petugas}}</a>
                        </li>
                        @endif
                    </ul>
                </ul>
            </nav>

            {{-- Content --}}
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">

                    {{-- <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button> --}}
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                    <div class="ml-2">@yield('header')</div>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">

                        </ul>
                    </div>
                </div>
            </nav>
            @yield('content')
        </div>
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });

    </script>

    @yield('js')
    </body>

</html>
