<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <title>cafeposts</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- 各ページごとにtitleタグを入れるために@yieldで空けておきます。 --}}
        <title>@yield('title')</title>

        <!-- Scripts -->
         {{-- Laravel標準で用意されているJavascriptを読み込みます --}}
         
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <link href="{{ secure_asset('css/topreverse.css') }}" rel="stylesheet">
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="{{ secure_asset('js/topreverse.js') }}" defer></script>
        
        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        {{-- Laravel標準で用意されているCSSを読み込みます --}}
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        {{-- この章の後半で作成するCSSを読み込みます --}}
        <link href="{{ secure_asset('css/front.css') }}" rel="stylesheet">
        <script src="https://kit.fontawesome.com/88bda95f47.js" crossorigin="anonymous"></script>

    </head>
    <body>
        <div id="app">
            {{-- 画面上部に表示するナビゲーションバーです。 --}}
            <nav class="cafeposts navbar-expand-lg navbar-light " style="background-color: hsla(50, 33%, 25%, .75);">
              <!--<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">-->
              <!--  <span class="navbar-toggler-icon"></span>-->
              <!--</button>-->
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              
              <a class="cafeposts navbar-expand-lg navbar-light" href="#">
                <img width="100" height="100" src="/images/test.jpeg">
              </a>
              
              <a class="navbar-brand" href="#">Navbar</a>
              <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                  <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">TOP</a>
                    </li>
                            
                    <li class="nav-item">
                       {{-- <a class="nav-link" href="#"></a>　--}}
                        <!--<div class="col-md-4">-->
                             <a href="{{ action('PostingController@add') }}" role="button" class="nav-link active">新規作成/new posting!</a>
                        <!--</div>-->
                    </li>
                    <li class="nav-item">
                        {{-- <a class="nav-link" href="#"></a>. --}}
                        
                        <!--<div class="col-md-4">-->
                          <a  href="/logout2" role="button" class="nav-link active" >
                           logout/ログアウト                  
                          </a>   
                          <!--</div>-->
                    </li>
                    </ul>
                    
                
                        {{--    
                          <a  href="{{ route('logout') }} " role="button" class="btn btn-primary" 
                             onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                           logout/ログアウト                  
                          </a>    
                                                                                                                                 
                          <from id="logout-form" action="{{ route('logout') }}" method="POST" > 
                            @csrf
                          </from>
                          --}}
            </div>
            </nav>
            <!--<li class="nav-item dropdown">-->
            <a id ="navbarDropdown" class="" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                
            </a>  

            <main class="py-4">
             <div class="container">
                <a class="navbar-brand title" href="{{ url('/') }}">
                    <h1 class="logo">☕️cafeposts☕ </h1>
                    <p class="text-sub">~share cafe and coffee with everyone!~</p>
                </a>
                
                <div class="row">
                    <div class="col-md-12 front-images">
                        <p>
                           <span><img src="/images/coffee-geeccc6cc2_640.jpg"></span>
                           <span><img width="610" height="440" src="/images/149074D2-459A-4920-AE2B-E432E3A5E94A.png"></span>
                        </p>           
                    </div>
                 </div>

                {{-- コンテンツをここに入れるため、@yieldで空けておきます。 --}}
                @yield('content')
            </main>
            
             <footer class="py-4" style="background-color: hsla(50, 33%, 25%, .75);">
            <!--<div class="container-footer">-->
            <!--    <p class="float-end mb-1"><a href="#">ページ上部へ<br>Back to top</a>-->
            <!--</div>-->
                <div class="container">
                    <p>&copy;cafeposts  Developed 2021.</p>
                </div>
            </footer>
        </div>
       
       
    </body>
</html>