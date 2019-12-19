<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="/css/app.css">
          <link rel="stylesheet" href="/css/bulma.min.css">
        <title>ITP405 - Laravel</title>
    </head>
    <body>

        <div class="container">
          <section class="hero is-fullheight">
            <div class="hero-head header-nav">
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
            <div class="hero-body">
              <div class="container has-text-centered">
                <h1 class="title">
                  ITP405 - Laravel
                </h1>
                <h2 class="subtitle">
                  Aidan Harris-Tyrrell
                </h2>
              </div>
            </div>
          </section>
        </div>
    </body>
</html>
