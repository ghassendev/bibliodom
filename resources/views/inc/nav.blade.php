<!doctype html>
<html lang="en">
  <head>
    <title>BiblioDOM</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class='bg-light'>
      
    <nav class="nav bg-dark justify-content-end">
        
         <div class="nav-item">
          <a class="nav-link text-light" href="#">Login</a>
         </div>
        <div class="nav-item">
          <a class="nav-link text-light" href="#">Register</a>
        </div>
    </nav>
    <div class="container">
  @yield('contents')
    </div>
  </body>
</html>

