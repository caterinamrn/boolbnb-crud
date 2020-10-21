<header>



      <!-- inizio primo blocco -->
      <div class="first-block flex">
        <!-- airbnblogo -->
        <div class="margin25">
          <a href="{{ url('/')}}"><img id="logo" src="./img/airbnbLogo.png" alt=""></a>
        </div>

        <!-- diventa un host -->
        <div class="margin25">


          <div class="inline-block"><!-- globe + chevron down -->
          </div>
          <!-- user -->
          <div >


              <ul id="log-reg" class="navbar-nav ml-auto">
                @guest

                    <li class="nav-item inline-block margin25 white-radius">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                      <li class="nav-item inline-block margin25 white-radius">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                      </li>
                    @endif

                @else
                  {{-- @auth --}}
                    <a id="regist" href="{{route('apart.create')}}" ><span>Diventa un host</span></a>
                  {{-- @endauth --}}
                    <li id="my-profile" class="nav-item dropdown inline-block margin25 white-radius">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{-- {{ Auth::user()-> firstname }} --}}
                            <i class="fas fa-bars"></i>
                            <img id="user" src="./img/user.png" alt="">
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <a href="{{ route('user.index') }}">list</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
              </ul>

          </div>
        </div>
      </div>
      <!-- fine primo blocco -->
      <!-- destinazioni + check-in/check-out -->
      <div class="flex ">
        <div class="white-radius-center">
          <div class="">
            <a href="#">
              <span>Dove</span>
              <p>Dove vuoi andare?</p>
            </a>
          </div>
          <div class="search">
            <a href="#"><i class="fas fa-search"></i></a>
          </div>
        </div>
      </div>
    </header>
