<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Inventory Management</title>


    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">


    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
            color: #ffff;
        }

        .links {
            color: #ffff;
        }

        .links>a {
            color: #ffff;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .landing-background {
            background-image: url('/images/Landing.jfif');
            background-repeat: no-repeat;
            z-index: 99999;
            background-size: cover;
            background-position: center;
            width: 100%;
            height: 100%;
        }

        .landing-opacity {
            background-color: rgba(0, 0, 0, 0.678) !important;
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body>
    <div class="landing-background">
        <div class="flex-center position-ref full-height landing-opacity">
            @if (Route::has('login'))
            <div class="top-right links">
                @auth
                <a href="{{ url('/home') }}">Home</a>
                @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
                @endif
                @endauth
            </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    MANAGEMENT SYSTEM
                </div>

                @auth
                <div class="links">
                    <h3> Welcome {{ Auth::user()->name }}, click the link below to start !</h3>
                </div>
                <br>
                <div class="links">
                    <a href="{{ route('stock.view') }}">STOCK</a>
                    <a href="{{ route('service.view') }}">SERVICE</a>
                    <a href="{{ route('customer.view') }}">CUSTOMER</a>
                </div>
                @else
                <div class="links">
                    Please login to continue
                </div>

                @endauth
            </div>
        </div>
    </div>
</body>

</html>