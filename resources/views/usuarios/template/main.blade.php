<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Default') | Usuarios</title>
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
    <style>
        body{
            background-color:#F8F9FA;
            width:100%;
        }

        thead th {
            background-color: #006DCC;
            color: white;
        }

        header{
            background-color:#006DCC;
            border-bottom:#ccc;
            box-shadow: 0px 2px 20px 0px rgba(0,0,0,0.5);
            color:#fff;
            padding:20px;
            margin-bottom:35px;
            width:100%;
        }

        .header{
            margin:0 auto;
            max-width:1284px;
            width:100%;
        }

        .container{
            max-width:1280px;
            height:70vh;
            width:100%;
        }

        footer{
            background-color:#006DCC;
            box-shadow:0 -2px 5px 0px #333;
            color:#fff;
            padding:10px;
            margin-top:35px;
            width:100%;
        }


    </style>
</head>
<body>
    <header>
        <div class="header">
            @yield('header')
        </div>
    </header>
    <section>
        <div class="container">
            @yield('content', 'Default')
        </div>
    </section>

</body>
</html>