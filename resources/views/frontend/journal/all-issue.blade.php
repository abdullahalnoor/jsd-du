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
            <article class="">

              

<div class="content">
 
  <a href="{{route('frontend.journal.issues',$journalIssueItem->id)}}">
    <p>Volume  {{ $journalIssueItem->journalVolume->volume_no  }},  {{ date('F Y',strtotime($journalIssueItem->publish_date  ))}},  Issue  {{ $journalIssueItem->issue_no  }} </p>
  </a>

 
</div>




</article>
         
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