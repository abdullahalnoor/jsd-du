@extends('frontend.master')

@section("title")
Change Password
@endsection

@push('styles')


   
@endpush

@section('content')
 <!-- ======= Breadcrumbs ======= -->
 <div class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Change Password</h2>
          <ol>
            <li><a href="{{route('frontend.index')}}">Home</a></li>
            <!-- <li><a href="blog.html">Blog</a></li> -->
            <li>Change Password</li>
          </ol>
        </div>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row g-5">

          <div class="col-lg-8 ">
    @include('frontend.includes.alert')
          
          <div class="card" >
  
  <div class="card-body">
    <!-- <h5 class="card-title">Change Password</h5> -->
    <form action="{{route('member.update.password')}}" method="post"  enctype='multipart/form-data' role="form" class="contact-form " >
        @csrf
            
          <div class="form-group mt-3">
          <label for="name" class="form-label">
          Current Password <b><i class="text-danger">*</i></b>
          </label>
            <input type="password" class="form-control" name="current_password" id="current_password" placeholder="Enter Current Password.." value="" required>
            @error('current_password')
                <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                </span>
             @enderror
        </div>

         
        <div class="form-group mt-3">
          <label for="name" class="form-label">
          New Password <b><i class="text-danger">*</i></b>
          </label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Enter New Password.." value="" required>
            @error('password')
                <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                </span>
             @enderror
        </div>


        <div class="form-group mt-3">
          <label for="name" class="form-label">
          Confirm Password <b><i class="text-danger">*</i></b>
          </label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Enter Confirm Password.." value="" required>
            @error('password_confirmation')
                <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                </span>
             @enderror
        </div>


          <div class="">
            <button class="btn btn-primary mt-2" type="submit">Change Password</button>
         
            </div>
        </form>
</div>


</div>


          

          </div>

          <div class="col-lg-4">

            <div class="sidebar">

              @include('frontend.includes.sidebar')

            </div><!-- End Blog Sidebar -->

          </div>
        </div>

      </div>
    </section><!-- End Blog Details Section -->
@endsection