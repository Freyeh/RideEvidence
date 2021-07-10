
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body style=" padding-bottom:50px;">

@include('inc.navbar')
<br>
<div class="container">
    @include('inc.messages')
    @yield('content')
</div>


<br>
</body>
<footer style="position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    height:50px;
    text-align: center;
    padding: 3px;
    background-color: #1a202c;
    color: white;">

    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        Thanks

    </div>
</footer>
</html>
