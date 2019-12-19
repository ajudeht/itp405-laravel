<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="/css/app.css">
          <link rel="stylesheet" href="/css/bulma.min.css">
          <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
              rel="stylesheet">
              
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
       </div>

      </nav>
    </div>
        <div class="container">
          <section class="section">
            <div class="container">
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

                          @yield('content')
            </div>
          </section>

        </div>
    </body>
</html>
