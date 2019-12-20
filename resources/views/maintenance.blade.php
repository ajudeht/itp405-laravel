<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="/css/app.css">
          <link rel="stylesheet" href="/css/bulma.min.css">
          <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
              rel="stylesheet">
          <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>

        <title>ITP405 - Maintenance Mode</title>
    </head>
    <body>
      <section class="hero is-danger is-fullheight">
        <div class="hero-body">
          <div class="container has-text-centered">
            <h1 class="title">
              This Application is in Maintenance Mode
            </h1>
            <h2 class="subtitle">
              ITP405 - Laravel
            </h2>
            <div class="buttons is-centered">
              @guest
              <a href="/register"  class="button is-danger is-light ">Sign Up</a>
              <a href="/login" style="font-weight: 600;" class="button is-info is-light">Log In</a>
              @endguest
                @auth
                <a href="/settings" class="button is-danger is-light is-rounded" style="">Open Settings</a>
                @endauth

            </div>
          </div>
        </div>
      </section>
    </body>
</html>
