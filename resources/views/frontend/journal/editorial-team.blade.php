@extends('frontend.master')

@section("title")
Editorial Team
@endsection

@push('styles')
<style>
  

.cross-line-right {
  display: table;
  white-space: nowrap;
}
.cross-line-right::after {
  border-top: 2px solid #0d47a1;
  content: "";
  display: table-cell;
  position: relative;
  top: 1em;
  width: 80%;
}
.cross-line-right > span {
  padding: 0 15px 0 0;
  font-size: 22px;
  font-family: "Roboto Slab", sans-serif;
  line-height: 30px;
  color: #0d47a1;
}
</style>
   
@endpush

@section('content')
 <!-- ======= Breadcrumbs ======= -->
 <div class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Editorial Team</h2>
          <ol>
            <li><a href="{{route('frontend.index')}}">Home</a></li>
            <!-- <li><a href="blog.html">Blog</a></li> -->
            <li>Editorial Team</li>
          </ol>
        </div>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row g-5">

          <div class="col-lg-8 ">

          @foreach($boardMembers as $boardMember)
          <div class="card shadow-sm p-3  bg-body rounded mb-2" >
  <div class="row g-0">
    <div class="col-md-3">
      <img src="{{asset($boardMember->image)}}" class="img-fluid p-1 rounded-start" alt="...">
    </div>
    <div class="col-md-9">
      <div class="card-body">
      <!-- <h5 class="card-title">{{$boardMember->name}}</h5> -->
      <ul class="list-group list-group-flush">
    <li class="list-group-item ">{{$boardMember->name}}</li>
    <li class="list-group-item">{{$boardMember->designation}}</li>
    <li class="list-group-item">{{$boardMember->affiliation}}</li>
  </ul>
        <!-- <h5 class="card-title">{{$boardMember->name}}</h5>
        <p class="card-text">{{$boardMember->designation}} </p>
        <p class="card-text">{{$boardMember->affiliation}} </p> -->
        <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
      </div>
    </div>
  </div>
</div>
@endforeach

          

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