<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="/css/app.css">
          <link rel="stylesheet" href="/css/bulma.min.css">
          <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
              rel="stylesheet">
          <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>

        <title>ITP405 - @yield('title')</title>
    </head>
    <body>
      <div class="container header-nav" style="padding-left: .75em;">
      <nav class="navbar is-transparent" role="navigation">
        <div class="navbar-brand">
          <a href="/" class="navbar-item logo-main">ITP405 - Laravel</a>
        </div>
        <div class="navbar-menu">
          <div class="navbar-start">
           <a href="/genres" class="navbar-item ">Genres</a>
           <a href="/tracks" class="navbar-item ">Tracks</a>
         </div>
         <div class="navbar-end" style="padding-right: .75em;">
           <div class="buttons nav-item">
            @guest
             <a href="/register" style="font-size: .8em; font-weight: 600;" class="button">Sign Up</a>
             <a href="/login" style="font-size: .8em; font-weight: 600;" class="button is-info is-light">Log In</a>
             @endguest
             @auth
             <a href="/logout" style="font-size: .8em;" class="button is-rounded is-outlined is-danger">Log Out</a>
             <a href="/home" class="button is-rounded" style="padding: 1em;font-size: .8em;"><span class="icon"><i class="fas fa-user"></i></span></a>
             <a href="/settings" class="button is-rounded" style="padding: 1em;font-size: .8em;"><span class="icon"><i class="fas fa-cog"></i></span></a>
             @endauth
           </div>
        </div>
       </div>

      </nav>
    </div>
        <div class="container">
          <section class="section">
            <div class="container">

              @if (empty($customHeader) || $customHeader = false)
              <nav class="level">
                <div class="level-left">
                  <div class="level-item">
                    <h2 class="title">@yield('title')</h2>
                  </div>
                </div>
                <div class="level-right">
                  @section('level-right')

                  @show
                </div>
              </nav>
              <hr />
              @endif
                          @yield('content')
            </div>
          </section>

        </div>
    </body>
</html>
