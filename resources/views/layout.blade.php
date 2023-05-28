@vite(['resources/sass/app.scss','resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset("/img/favicon-16x16.png") }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>ActiveLife Physio</title>
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container-fluid d-flex flex-column" id="NavsDiv">
      <img class="_bg-img" src="{{ asset("img/imagebg.jpg") }}" alt="Background Image">
        <nav class="navbar navbar-expand-lg p-0" id="NavTop">
            <div class="container-fluid d-flex justify-content-end">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#Navbarcentered" aria-controls="Navbarcentered" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="d-flex align-self-center w-75 _nav-contacto" id="NavbarCentered">
                <ul class="navbar-nav me-auto h-75">
                  <li class="nav-item d-flex align-items-center">
                    <a class="nav-link" href="#">¿Do you have any question?</a>
                  </li>
                  <li class="nav-item d-flex align-items-center">
                    <img class="_contact-img" src="{{ asset('img/atimg.png') }}" alt="Contact link img"><a class="nav-link" href="#">+44 7837262871</a>
                  </li>
                  <li class="nav-item d-flex align-items-center">
                    <img class="_contact-img" src="{{ asset('img/phone.png') }}" alt="Phone link img"><a class="nav-link" href="#">clinic@email.com</a>
                  </li>
                </ul>
                <form class="d-flex h-75">
                  <input class="form-control me-1 py-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-sm btn-outline-success me-1 py-2" type="submit">Search</button>
                </form>
                <div class="d-flex h-75">
                  @if (Route::has('login'))
                  <button class="btn btn-light mx-1"><a href="{{ route('login') }}" class="_link">Sign in</a></button>
                  @endif
                  @if (Route::has('register'))
                  <button class="btn btn-light mx-1"><a href="{{ route('register') }}" class="_link">Sign up</a></button>
                  @endif
                </div>
              </div>
            </div>
          </nav>
          <div class="align-self-center w-50 m-1 _menu">
            <div id="logo" class="d-flex"><img src="{{ asset('img/logo.png') }}" alt="Logo img" height="50vh"><h1>ActiveLife</h1></div>
            <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('team') }}">Our Team</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('treatment') }}">Treatments</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('more') }}">More Services</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('about') }}">About us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('contact') }}">Contact us</a>
                </li>
            
              </ul>
          </div>
    </div>
    <section class="_section">
      @yield('content')
      <div class="col-12">
        <div class="d-flex flex-column justify-content-center _content">
          <div class="d-flex align-self-center justify-content-evenly _appoint-banner">
            <p class="_appoint-p">We ensure out patients receive the best treatments.</p>
            <button class="btn btn-light _appoint-button"><a class="_link" href="{{ route('request') }}">REQUEST AN APPOINTMENT</a><img class="_appoint-img" src="{{ asset("img/appointment.png") }}" alt="Appointment Request Image"></button>
          </div>
          <div class="d-flex justify-content-evenly">
            <div class="_img-bottom-div"><img class="_img-bottom" src="{{ asset("img/kinesio.jpg") }}" alt="Kinesiotherapy image"></div>
            <div class="_img-bottom-div"><img class="_img-bottom" src="{{ asset("img/maso.jpg") }}" alt="Masotherapy image"></div>
          </div>
        </div>
      </div>
    </section>
    <footer class="mt-auto _footer">
        <div class="d-flex justify-content-around">
            <div class="d-flex w-25">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="#">Active</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                  </ul>
            </div>
            <div class="d-flex w-25">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="#">Active</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                  </ul>
            </div>
        </div>
    </footer>  
</body>
</html>