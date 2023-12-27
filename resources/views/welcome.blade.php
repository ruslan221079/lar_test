<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Laravel</title>

    <style>
        .antialiased h1 {
            font-size: 1.7rem;
            text-align: center;
            padding: 50px 5px 0;
        }

        .antialiased .btn-primary,
        .antialiased .btn-danger {
            border-radius: 0
        }

        .antialiased h1+p {
            text-align: center
        }

        .cleaning {
            padding: 5px 10px;
            background: red;
            margin: 10px 0;
            display: table;
            text-decoration: none;
            color: white;
        }

        .cleaning:hover {
            color: white
        }

        .table {
            width: 100%;
            margin-bottom: 20px;
            border: 1px solid #dddddd;
            border-collapse: collapse;
        }

        .table th {
            font-weight: bold;
            padding: 5px;
            background: #efefef;
            border: 1px solid #dddddd;
        }

        .table td {
            border: 1px solid #dddddd;
            padding: 5px;
        }
    </style>


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Styles -->


</head>

<body class="antialiased">


    @yield('content')


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="{{ asset('js/my_js.js') }}"></script>

</body>


</html>
