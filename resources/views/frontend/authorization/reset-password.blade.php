@extends('frontend.master')

@section("title")
Reset Password
@endsection

@push('styles')

   
@endpush

@section('content')
 <!-- ======= Breadcrumbs ======= -->
 <div class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Reset Password</h2>
          <ol>
            <li><a href="{{route('frontend.index')}}">Home</a></li>
            <!-- <li><a href="blog.html">Blog</a></li> -->
            <li>Reset Password</li>
          </ol>
        </div>

      </div>
    </div><!-- End Breadcrumbs -->

    <section id="blog" class="blog">
  

 

  <div class="container">

    <div class="row justify-content-center gy-5 gx-lg-5">

      <!-- <div class="col-lg-4">

        <div class="info">
          <h3>Get in touch</h3>
          <p>Et id eius voluptates atque nihil voluptatem enim in tempore minima sit ad mollitia commodi minus.</p>

          <div class="info-item d-flex">
            <i class="bi bi-geo-alt flex-shrink-0"></i>
            <div>
              <h4>Location:</h4>
              <p>A108 Adam Street, New York, NY 535022</p>
            </div>
          </div>

          <div class="info-item d-flex">
            <i class="bi bi-envelope flex-shrink-0"></i>
            <div>
              <h4>Email:</h4>
              <p>info@example.com</p>
            </div>
          </div>

          <div class="info-item d-flex">
            <i class="bi bi-phone flex-shrink-0"></i>
            <div>
              <h4>Call:</h4>
              <p>+1 5589 55488 55</p>
            </div>
          </div>

        </div>

      </div> -->

      <div class="col-lg-6">

      @include('frontend.includes.alert')

      <form action="{{route('member.update.reset.password')}}" method="post" role="form" class="contact-form " >
        @csrf
        <input type="hidden" value="{{$reset_key}}" name="reset_key">
            
        <div class="form-group mt-3">
          <label for="password" class="form-label">
          Password<b><i class="text-danger">*</i></b>
          </label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password.." required>
            @error('password')
                <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                </span>
             @enderror
          </div>

          <div class="form-group mt-3">
          <label for="password_confirmation" class="form-label">
          Confirm Password<b><i class="text-danger">*</i></b>
          </label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Enter Confirm Password.." required>
            @error('password_confirmation')
                <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                </span>
             @enderror
          </div>
          
          
          
          <div class="">
            <button class="btn btn-primary mt-2" type="submit">Reset Password</button>
         
</div>
        </form>
      </div><!-- End Contact Form -->
      <div class="col-lg-4">

<div class="sidebar">

  @include('frontend.includes.sidebar')

</div><!-- End Blog Sidebar -->

</div>
    </div>

  </div>
</section>
@endsection