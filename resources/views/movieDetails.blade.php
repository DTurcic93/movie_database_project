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
                  
        <div style="width:500px;">                
            <table id="movies" class="table" >
                <tr>
                    <th>Title</th>
                    <th>Year</th>
                    <th>Length</th> 
                    <th>Genre</th>  
                    <th>Picture</th>                    
                </tr>
                <tr>
                    <td>{{$movies->title}}</td>
                    <td>{{$movies->year}}</td>
                    <td>{{$movies->length}}</td>
                    <td>{{$movies->genre_id}}</td>
                    <td><img style="margin:20px;" src="{{ asset("/img/$movies->picture")}}"></td> 
                    <td><button class="btn btn-danger" onclick="window.location.href='/delete/{{$movies->id}}'">DELETE</button></td>  
                    <td><button class="btn btn-primary" onclick="window.location.href='/update/{{$movies->id}}'">UPDATE</button></td>                
                </tr>
            </table>             
        </div>
    </body>
</html>


