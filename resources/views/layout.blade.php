@vite(['resources/sass/app.scss','resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset("/img/favicon-16x16.png") }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>VitalCore Physio</title>
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container-fluid d-flex flex-column" id="NavsDiv">
      <img class="_bg-img" src="{{ asset("img/imagebgmenu.jpg") }}" alt="Background Image">
        <nav class="navbar navbar-expand-lg p-0" id="NavTop">
            <div class="container-fluid d-flex justify-content-end">
              <div class="d-flex align-self-center w-75 mt-1 _nav-contacto">
                <ul class="navbar-nav me-auto h-75 _contact-top">
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
                <form class="d-flex h-75" id="search">
                  <input class="form-control w-75 me-1 py-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-sm btn-outline-success w-25 me-1 py-2" type="submit">Search</button>
                </form>
                <div class="d-flex h-75 _divLogin">
                  @if (Route::has('login'))
                    @if (session('id_user') != null && session('id_user') != "")
                    <a href="{{ route('logout') }}" class="w-75 h-100 text-center text-nowrap mx-1"><button class="btn btn-outline-primary h-100 _button">Sign out</button></a>
                    @else
                    <a href="{{ route('login') }}" class="w-75 h-100 text-center text-nowrap mx-1"><button class="btn btn-outline-primary h-100 _button">Sign in</button></a>
                    @endif                    
                  @endif
                  @if (Route::has('register'))
                  <a href="{{ route('register') }}" class="w-75 h-100 text-center text-nowrap mx-1"><button class="btn btn-outline-primary h-100 _button">Sign up</button></a>
                  @endif
                </div>
              </div>
            </div>
          </nav>
          <div class="align-self-center w-75 m-1 _menu">      
            <div id="logo" class="d-flex"><img src="{{ asset('img/logo.png') }}" alt="Logo img" height="50vh"><h1>VitalCore</h1></div>
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
                @if (session('id_user') != null && session('id_user') != "")
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('request') }}">Request an appoitment</a>
                  </li>
                @else
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Request an appoitment</a>
                  </li>
                @endif

                <li class="nav-item">
                  <a class="nav-link" href="{{ route('about') }}">About us</a>
                </li>
                @if (session('role') == 4 || session('role') == 5)
                <li class="nav-item">
                  <a class="nav-link" href="{{  route('admin')  }}">Admin</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{  route('dashboard')  }}">Profile</a>
                </li>
                @elseif (session('role') == 6)
                <li class="nav-item">
                  <a class="nav-link" href="{{  route('dashboard')  }}">Profile</a>
                </li>
                @endif
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('contact') }}">Contact us</a>
                </li>                
              </ul>
          </div>
    </div>
    <section class="_section">
      @if(session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
        @php
          session()->forget('status');
        @endphp
      @endif
      @yield('content')
      <div class="col-12">
        <div class="d-flex flex-column justify-content-center _content">
          <div class="d-flex align-self-center justify-content-evenly _appoint-banner">
            <p class="_appoint-p">We ensure out patients receive the best treatments.</p>
            @if (session('id_user') != null && session('id_user') != "")
            <button class="btn btn-light _appoint-button"><a class="_link" href="{{ route('request') }}">REQUEST AN APPOINTMENT</a><img class="_appoint-img" src="{{ asset("img/appointment.png") }}" alt="Appointment Request Image"></button>
            @else
            <button class="btn btn-light _appoint-button"><a class="_link" href="{{ route('login') }}">REQUEST AN APPOINTMENT</a><img class="_appoint-img" src="{{ asset("img/appointment.png") }}" alt="Appointment Request Image"></button>
            @endif            
          </div>
          <div class="d-flex justify-content-evenly">
            <div class="_img-bottom-div"><img class="_img-bottom" src="{{ asset("img/kinesio.jpg") }}" alt="Kinesiotherapy image"></div>
            <div class="_img-bottom-div"><img class="_img-bottom" src="{{ asset("img/maso.jpg") }}" alt="Masotherapy image"></div>
          </div>
        </div>
      </div>
    </section>
    <footer class="mt-auto">
        <div class="d-flex justify-content-evenly _footer">
          <div class="d-flex flex-nowrap justify-content-center w-25">
            <a href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }}" alt="VitalCore" width="20rem"></a>
            <span>&copy;&nbsp;VitalCore</span>
          </div>
            <div class="d-flex flex-nowrap w-50">
                <ul class="nav justify-content-center flex-nowrap">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Contact</a>
                  </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Terms of Service</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Privacy Policy</a>
                    </li>
                  </ul>
            </div>
            <div class="d-flex flex-nowrap w-25">
                <ul class="nav justify-content-evenly flex-nowrap">                
                    <li class="nav-item">
                      <a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook"></i></a>
                    </li>
                    <li class="nav-item">
                      <a href="https://www.twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li class="nav-item">
                      <a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
                    </li>
                  </ul>
            </div>
        </div>
    </footer>
    <script src="https://kit.fontawesome.com/6e079c207d.js" crossorigin="anonymous"></script>
</body>
</html>
