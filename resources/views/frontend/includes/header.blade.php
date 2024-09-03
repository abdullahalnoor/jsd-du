<div class="container">
    <a href="{{url('/')}}" class="my-3 logo d-flex align-items-center scrollto me-auto me-lg-0">
      <!-- Uncomment the line below if you also wish to use an image logo -->
      <img src="{{asset('uploads/logo.png')}}" alt="">
      <!-- <h1>JSD-ISWR<span>.</span></h1> -->
    </a>
  </div>
  <!-- ======= Header ======= -->
  <header id="header" class="header sticky-top bg-primary" data-scrollto-offset="0">
   
    
    <div class="container-fluid d-flex align-items-center justify-content-center ">

      <!-- <a href="index.html" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
        <h1>HeroBiz<span>.</span></h1>
      </a> -->

      <nav id="navbar" class="navbar">
        <ul>

          <li class="dropdown"><a href="{{route('frontend.index')}}"><span>Home</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
            <li><a href="{{route('frontend.page',['slug'=>'overall'])}}">Overall</a></li>
            <li><a href="{{route('frontend.page',['slug'=>'aim-and-scope'])}}">Aim and Scope</a></li>
            </ul>
          </li>

          <li class="dropdown"><a href="#"><span>Issues</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="{{route('frontend.journal.current-issues')}}" >	Current issues</a></li>
              <li><a href="{{route('frontend.journal.all-issues')}}">All issues</a></li>
          
            </ul>
          </li>

          <li><a class="nav-link " href="{{route('frontend.journal.editorial-team')}}">	Editorial Team</a></li>
         
          

          <li class="dropdown"><a href="#"><span>Submission Guidelines</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="{{route('frontend.page',['slug'=>'author-guidelines'])}}" >Author Guidelines</a></li>
              <li><a href="{{route('frontend.page',['slug'=>'guidelines-for-reviewers'])}}">Guidelines for Reviewers</a></li>
              @if(!auth()->check())
                  <li><a href="{{route('member.login.form')}}">Submit a Manuscript </a></li>
                 @elseif(auth()->check() && auth()->user()->role_id == 2)
                 <li><a href="{{route('member.submit.manuscript')}}">Submit a Manuscript </a></li>

                  @endif
       
          
            </ul>
          </li>

          <li><a class="nav-link  " href="{{route('frontend.page',['slug'=>'contact-us'])}}">Contact Us</a></li>
         
         
          

               @if(auth()->check() && auth()->user()->role_id == 2)


               <form method="POST" action="{{ route('logout') }}">
                  @csrf
                 <li>
                 <a class="nav-link" href="route('logout')"
                    onclick="event.preventDefault();
                    this.closest('form').submit();">
                    <i class="bi bi-box-arrow-right me-2 fs-5"></i> 
                    {{ __('Log Out') }}
                  </a>
                 </li>
               </form> 
         

           @else

           
           <li class="dropdown"><a href="#"><span>Account</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
              <ul>
                <li><a href="{{route('member.login.form')}}" >	Login</a></li>
                <li><a href="{{route('member.register.form')}}">	Register</a></li>
            
              </ul>
            </li>
          
          @endif
         



        </ul>
        <i class="bi bi-list mobile-nav-toggle d-none"></i>
      </nav><!-- .navbar -->

      <!-- <a class="btn-getstarted scrollto" href="index.html#about">Get Started</a> -->

    </div>
  </header><!-- End Header -->