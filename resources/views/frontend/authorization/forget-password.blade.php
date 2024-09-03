@extends('frontend.master')

@section("title")
Forgot Password
@endsection

@push('styles')

   
@endpush

@section('content')
 <!-- ======= Breadcrumbs ======= -->
 <div class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Forgot Password</h2>
          <ol>
            <li><a href="{{route('frontend.index')}}">Home</a></li>
            <!-- <li><a href="blog.html">Blog</a></li> -->
            <li>Forgot Password</li>
          </ol>
        </div>

      </div>
    </div><!-- End Breadcrumbs -->

    <section id="blog" class="blog">
  <!-- <div class="container">

    <div class="section-header">
      <h2>Forgot Password Form </h2>
      <p>Ea vitae aspernatur deserunt voluptatem impedit deserunt magnam occaecati dssumenda quas ut ad dolores adipisci aliquam.</p>
    </div>

  </div> -->

 

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
        <form action="{{route('member.forget.password')}}" method="post" role="form" class="contact-form " >
           @csrf
        <div class="form-group mt-3">
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Emial.." required>
          </div>
         
          
          
          <div class="">
            <button class="btn btn-primary mt-2" type="submit">Forgot Password</button>
            
        </div>
        </form>
      </div><!-- End Contact Form -->

      <div class="col-lg-4">

<div class="sidebar">

  @include('frontend.includes.sidebar')

</div><!-- End Blog Sidebar -->

    </div>

  </div>
</section>
@endsection