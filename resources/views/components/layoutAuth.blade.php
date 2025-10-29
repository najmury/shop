<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SHOP</title>
    <link href="{{ asset('tem/css/styles.css') }}" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="{{ asset('landing/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/responsive.css') }}"> --}}
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    {{ $slot }}
                </div>
            </main>
        </div>
        {{-- <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; ECOMMERCE</div>
                        </div>
                    </div>
                </footer>
            </div> --}}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('tem/js/scripts.js') }}"></script>
</body>

</html>
