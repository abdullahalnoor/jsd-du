<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="{{asset('assets/frontend/img/favicon.svg')}}" rel="icon">

    
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Login - JSD-ISWR</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>JSD-ISWR</h1>
      </div>
      <div class="login-box">
     
        <form class="login-form" action="{{route('login')}}" method="POST">
            @csrf
          <h3 class="login-head"><i class="bi bi-person me-2"></i>SIGN IN</h3>
          @error('email')
          <p><b class="form-text text-danger">These credentials do not match our records </b></p>
           @enderror
           @error('password')
          <p><b class="form-text text-danger">These credentials do not match our records </b></p>
           @enderror
          <div class="mb-3">
            <label class="form-label">USERNAME</label>
            <input class="form-control" name="email" type="text" placeholder="Email" autofocus>
          </div>
          <div class="mb-3">
            <label class="form-label">PASSWORD</label>
            <input class="form-control" name="password" type="password" placeholder="Password">
          </div>

         
         
          <div class="mb-3">
            <div class="utility">
              <div class="form-check">
                <label for="remember_me" class="form-check-label">
                  <input class="form-check-input" id="remember_me" type="checkbox"><span class="label-text">{{ __('Remember me') }}</span>
                </label>
              </div>
              <!-- <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p> -->
            </div>
          </div>

         

          <div class="mb-3 btn-container d-grid">
            <button class="btn btn-primary btn-block" type="submit"><i class="bi bi-box-arrow-in-right me-2 fs-5"></i>SIGN IN</button>
          </div>
        </form>
        <!-- <form class="forget-form" action="index.html">
          <h3 class="login-head"><i class="bi bi-person-lock me-2"></i>Forgot Password ?</h3>
          <div class="mb-3">
            <label class="form-label">EMAIL</label>
            <input class="form-control" type="text" placeholder="Email">
          </div>
          <div class="mb-3 btn-container d-grid">
            <button class="btn btn-primary btn-block"><i class="bi bi-unlock me-2 fs-5"></i>RESET</button>
          </div>
          <div class="mb-3 mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="bi bi-chevron-left me-1"></i> Back to Login</a></p>
          </div>
        </form> -->
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <!-- <script src="js/jquery-3.7.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script> -->
    <!-- <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script> -->
  </body>
</html>