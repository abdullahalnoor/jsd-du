@extends('frontend.master')

@section("title")
Update Profile
@endsection

@push('styles')


   
@endpush

@section('content')
 <!-- ======= Breadcrumbs ======= -->
 <div class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Update Profile</h2>
          <ol>
            <li><a href="{{route('frontend.index')}}">Home</a></li>
            <!-- <li><a href="blog.html">Blog</a></li> -->
            <li>Update Profile</li>
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
    <!-- <h5 class="card-title">Update  Profile</h5> -->
    <form action="{{route('member.update.profile')}}" method="post"  enctype='multipart/form-data' role="form" class="contact-form " >
        @csrf
            
          <div class="form-group mt-3">
          <label for="name" class="form-label">
          Name <b><i class="text-danger">*</i></b>
          </label>

            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name.." value="{{old('name',$profile->name)}}" required>
            @error('name')
                <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                </span>
             @enderror
        </div>

          <div class="form-group mt-3">
          <label for="affiliation" class="form-label">
          Affiliation <b><i class="text-danger">*</i></b>
          </label>
            <input type="text" class="form-control" name="affiliation" id="affiliation" placeholder="Enter Affiliation.." value="{{old('affiliation',$profile->affiliation)}}" required>
            @error('affiliation')
                <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                </span>
             @enderror
            </div>

          <div class="form-group mt-3">
          <label for="mobile_number" class="form-label">
          Mobile Number <b><i class="text-danger">*</i></b>
          </label>
            <input type="text" class="form-control" name="mobile_number" id="mobile_number" placeholder="Enter Mobile Number.." value="{{old('mobile_number',$profile->mobile_number)}}" required>
            @error('mobile_number')
                <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                </span>
             @enderror
        </div>

          <div class="form-group mt-3">
          <label for="address" class="form-label">
          Address <b><i class="text-danger">*</i></b>
          </label>
            <textarea  rows="3" class="form-control" name="address" id="address" placeholder="Enter  Address.." required>{{old('address',$profile->address)}}</textarea>
            @error('address')
                <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                </span>
             @enderror
        </div>

          <div class="form-group mt-3">
          <label for="contact_email" class="form-label">
          Contact Email <b><i class="text-danger">*</i></b>
          </label>
            <input type="email" class="form-control" name="contact_email" id="contact_email" placeholder="Enter Contact Email.." value="{{old('contact_email',$profile->contact_email)}}" required>
            @error('contact_email')
                <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                </span>
             @enderror
        </div>

          <div class="form-group mt-3">
          <label for="website_url" class="form-label">
          Website URL <b><i class="text-danger">*</i></b>
          </label>
            <input type="url" class="form-control" name="website_url" id="website_url" placeholder="Enter Website URL.." value="{{old('website_url',$profile->website_url)}}" required>
            @error('website_url')
                <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                </span>
             @enderror
        </div>

          <div class="form-group mt-3">
          <label for="linkedin_url" class="form-label">
          Linkedin URL <b><i class="text-danger">*</i></b>
          </label>
            <input type="url" class="form-control" name="linkedin_url" id="linkedin_url" placeholder="Enter Linkedin URL.." value="{{old('linkedin_url',$profile->linkedin_url)}}" required>
            @error('linkedin_url')
                <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                </span>
             @enderror
        </div>
         
          <div class="form-group mt-3">
          <label for="image" class="form-label">
          Image <b><i class="text-danger">*</i></b>
          </label>
            <input type="file" class="form-control" name="image" id="image" placeholder="Enter Linkedin URL.."  >
            @error('image')
                <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                </span>
             @enderror
        </div>

          <div class="">
            <button class="btn btn-primary mt-2" type="submit">Update Profile</button>
         
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