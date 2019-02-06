<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'moviesDB') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>  

    <script>
    var btns = "";
    var letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    var letterArray = letters.split("");
    for(var i = 0; i < 26; i++){
        var letter = letterArray.shift();
        btns += '<button class="mybtns" onclick="alphabetSearch(\''+letter+'\');">'+letter+'</button>';
    }
    function alphabetSearch(let){
        window.location = "search_results.php?letter="+let;
    }
    </script>


    <?php
$results = "";
$letter = "";
if(isset($_GET['letter']) && strlen($_GET['letter']) == 1){
    $letter = preg_replace('#[^a-z]#i', '', $_GET['letter']);
    if(strlen($letter) != 1){
        echo "ERROR: Hack Attempt, after filtration the variable is empty.";
        exit();
    }
    // Connect to database here now
    // SELECT * FROM movies WHERE title LIKE '%$letter'
    // Use a while loop to append database results into the $results variable ($results .=)
    // Close your database connection here after your while loop closes
    
    // The line below is only to use for testing purposes before you
    // attempt to connect to your database and query it, remove this line after initial test
    $results = "PHP recognizes the dynamic ".$letter." and can search MySQL using it";
}
?>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

    <body >     

       <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'moviesDB') }}
                </a>              
              
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                      <a class="navbar-brand" href="{{ url('/show') }}">
                        ShowAll
                      </a>
                      <a class="navbar-brand" href="{{ url('/insert') }}">
                        upload
                      </a>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">               
                      
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>                       
                    </ul>
                </div>
            </div>
        </nav>
        <div style="margin: 0 auto; width:750px;">
        <script> document.write(btns);</script>
        </div>

        <?php echo $results; ?>
    </body>
</html>