<!-- <html>
    <head>
        <title>App Name - @yield('title')</title>
    </head>
    <body>
        @section('sidebar')
            This is the master sidebar.
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html> -->
<!DOCTYPE html>
<html ng-app="isbnSearcher">
<head>
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <link rel="stylesheet" type="text/css" href="{{asset('res/bootstrap/css/bootstrap-theme.min.css')}}"> -->
    <link rel="stylesheet" type="text/css" href="{{asset('res/bootstrap/css/bootstrap.superhero.css')}}">

    <script type="text/javascript" src="{{asset('res/bootstrap/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('res/bootstrap/js/bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('res/angular.js')}}"></script>
    <script type="text/javascript" src="{{asset('res/angular-ui-router.js')}}"></script>
    <script type="text/javascript" src="{{asset('res/app.js')}}"></script>
    <script type="text/javascript" src="{{asset('res/controllers.js')}}"></script>

    <style type="text/css">
    body{
        background-image: url('{{asset("res/images/bg2.jpg")}}');
        background-repeat: no-repeat;
        background-size: cover;
    }
    </style>
</head>
<body>

    <div class="navbar navbar-default">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">ISBN-SEARCHER</a>
      </div>
      <div class="navbar-collapse collapse navbar-responsive-collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">HOME</a></li>
          <li><a href="#">SEARCH</a></li>
          <li><a href="">STATS</a></li>
        </ul>
       
        <p class="navbar-text navbar-right">Made by Ernest </p>
      </div>
    </div>

    <div class="container">
            @yield('content')
        </div>

</body>
</html>

<script type="text/javascript">
    $(function(){
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
    });
</script>