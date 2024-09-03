@extends('frontend.master')

@section("title")
{{$sitePage->name}}
@endsection

@push('styles')

@endpush

@section('content')
 <!-- ======= Breadcrumbs ======= -->
 <div class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>{{$sitePage->name}}</h2>
          <ol>
            <li><a href="{{route('frontend.index')}}">Home</a></li>
            <!-- <li><a href="blog.html">Blog</a></li> -->
            <li>{{$sitePage->name}}</li>
          </ol>
        </div>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row g-5">

          <div class="col-lg-8 ">

    
           <article class="blog-details">

              <div class="content">
               
                <a href="#"><h3>{{$sitePage->title}}</h3></a>
                <p>{!! $sitePage->description !!}</p>
              
              </div>

              


            </article>
        
        
            
            
            
            
            <!-- End post author -->

          

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