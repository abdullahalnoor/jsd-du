@extends('frontend.master')

@section("title")
My Manuscript
@endsection

@push('styles')


   
@endpush

@section('content')
 <!-- ======= Breadcrumbs ======= -->
 <div class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>My Manuscript</h2>
          <ol>
            <li><a href="{{route('frontend.index')}}">Home</a></li>
            <!-- <li><a href="blog.html">Blog</a></li> -->
            <li>My Manuscript</li>
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
          
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Sl</th>
      <th scope="col">Subject</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($manuscripts as $key => $manuscriptItem)
    <tr>
      <td>{{$key +1 }}</td>
      <td>
        <p>{{$manuscriptItem->subject}}</p>
      </td>
      <td><a class="btn btn-sm  btn-outline-info" href="{{route('member.view.manuscript',$manuscriptItem->id)}}"> 
       View</a>
    </td>
    </tr>
    @endforeach
   
    
  </tbody>
</table>


          

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