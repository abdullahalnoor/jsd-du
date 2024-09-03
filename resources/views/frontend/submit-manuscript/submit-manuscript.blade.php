@extends('frontend.master')

@section("title")
Submit a Manuscript
@endsection

@push('styles')


   
@endpush

@section('content')
 <!-- ======= Breadcrumbs ======= -->
 <div class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Submit a Manuscript</h2>
          <ol>
            <li><a href="{{route('frontend.index')}}">Home</a></li>
            <!-- <li><a href="blog.html">Blog</a></li> -->
            <li>Submit a Manuscript</li>
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
    <!-- <h5 class="card-title">Submit a Manuscript</h5> -->
    <form action="{{route('member.submit.manuscript')}}" method="post"  enctype='multipart/form-data' role="form" class="contact-form " >
        @csrf
            
          <div class="form-group mt-3">
          <label for="subject" class="form-label">
          Subject<b><i class="text-danger">*</i></b>
          </label>
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Enter Subject.." value="{{old('subject')}}" >
            @error('subject')
                <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                </span>
             @enderror
        </div>

        <div class="form-group mt-3">
          <label for="abstract" class="form-label">
          Abstract <b><i class="text-danger">*</i></b>
          </label>
            <textarea  rows="10" class="form-control" name="abstract" id="abstract" placeholder="Enter  Abstract.." >{{old('abstract')}}</textarea>
            @error('abstract')
                <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                </span>
             @enderror
        </div>

        <div class="form-group mt-3">
          <label for="main_file" class="form-label">
          Main File <b><i class="text-danger">*</i></b>
          </label>
            <input type="file" class="form-control" name="main_file" id="main_file" placeholder="Enter  Main File.."  >
            @error('main_file')
                <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                </span>
             @enderror
        </div>
       


          <div class="">
            <button class="btn btn-primary mt-2" type="submit">Submit Manuscript</button>
         
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