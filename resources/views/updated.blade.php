
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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

    <body >     

       <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
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
        <br>
        <form action="/update" method='POST' style="margin: 0 auto; width:250px;>
            <input type="hidden" name="id" value="{{$movies->id}}">
            
            <div class="form-group">
                <label>Title</label>
                <input style="margin:26px;" type="text" name="title" value="{{$movies->title}}">
            </div>
            
            <div class="form-group">
                <label>Year</label>
                <input style="margin:26px;" type="number" name="year" value="{{$movies->year}}">
            </div>

            <div class="form-group">
                <label>Length</label>
                <input style="margin:10px;" type="text" name="length" value="{{$movies->length}}">
            </div>

            <div class="form-group">
                    <label>Genre:</label>                    
                    <select style="margin:15px;" type="number" name="genre_id"  value="{{$movies->genre_id}}">
                        <option value="1">Drama</option>
                        <option value="2">Action</option>
                        <option value="3">Triller</option>
                        <option value="4">Horror</option>
                        <option value="5">Comedy</option>
                        <option value="6">Animation</option>
                        <option value="7">Vestern</option>
                    </select>
            </div>

            <div class="form-group">
                <label>Picture</label>
                <input style="margin:15px;" type="file" name="picture" value="{{$movies->picture}}">
            </div>

            
            <button style="margin: 20px;" type="submit" value="SaveEdit" class="btn btn-primary" >SaveEdit</button>
        </form>
    </body>
</html>


