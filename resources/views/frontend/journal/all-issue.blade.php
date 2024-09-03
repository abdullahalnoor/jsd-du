@extends('frontend.master')

@section("title")
All Issues
@endsection

@push('styles')

@endpush

@section('content')
 <!-- ======= Breadcrumbs ======= -->
 <div class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>All Issues</h2>
          <ol>
            <li><a href="{{route('frontend.index')}}">Home</a></li>
            <!-- <li><a href="blog.html">Blog</a></li> -->
            <li>All Issues</li>
          </ol>
        </div>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row g-5">

          <div class="col-lg-8 ">
            @foreach($journalIssues as $journalIssueItem)

          <div class="card  p-3 mb-5" >
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="{{asset($journalIssueItem->cover_image)}}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h4 class="card-title">{{$journalIssueItem->title}}</h4>
                    <p>
                            <i class="bi bi-calendar"></i> <b>DOI : </b> {{$journalIssueItem->created_at}}
                            </p>
                            <p>
                            <i class="bi bi-book"></i> <b>Pages : </b> {{$journalIssueItem->page_no}}
                            </p>
                    <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
                    <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                    <a href="{{route('frontend.journal.issues',$journalIssueItem->id)}}" class="btn btn-outline-primary">Read</a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach


          

          </div>

          <div class="col-lg-4">

            <div class="sidebar">

            @include('frontend.includes.sidebar')
              </div><!-- End sidebar tags-->

            </div><!-- End Blog Sidebar -->

          </div>
        </div>

      </div>
    </section><!-- End Blog Details Section -->
@endsection