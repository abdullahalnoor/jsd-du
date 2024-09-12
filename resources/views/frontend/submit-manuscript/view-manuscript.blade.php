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
          


    <article class="blog-details">

              

<div class="content">
 
  <a href="#"><h3>{{$manuscript->subject}}</h3></a>
  <p>{{$manuscript->manuscriptVersion->abstract}}</p>

  <a class="btn btn-sm btn-outline-primary" download href="{{asset($manuscript->manuscriptVersion->main_file)}}">  <i class="bi bi-download"></i> Download</a>
</div>

</article>


<div class="comments">

              <!-- <h4 class="comments-count">8 Comments</h4> -->

              <div id="comment-1" class="comment">
                <!-- <div class="d-flex">
                  <div class="comment-img"><img src="assets/img/blog/comments-1.jpg" alt=""></div>
                  <div>
                    <h5><a href="">Georgia Reader</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                    <time datetime="2020-01-01">01 Jan,2022</time>
                    <p>
                      Et rerum totam nisi. Molestiae vel quam dolorum vel voluptatem et et. Est ad aut sapiente quis molestiae est qui cum soluta.
                      Vero aut rerum vel. Rerum quos laboriosam placeat ex qui. Sint qui facilis et.
                    </p>
                  </div>
                </div> -->


                <div class="accordion accordion-flush " id="faqlist">
            @foreach($manuscriptMails as $key => $manuscriptMailItem)
        <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
          <h3 class="accordion-header">
          <!-- <span class='d-inline btn btn-sm btn-outline-primary mx-1 '>{{$manuscriptMailItem->user->name}}</span>
                    <span  class="d-inline  btn btn-sm btn-outline-primary mx-1">
                    {{ \Carbon\Carbon::parse($manuscriptMailItem->sent_time)->diffForHumans() }}
                    </span> -->
            <button class="accordion-button  collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content_{{$key}}">
              <i class="bi bi-question-circle question-icon ml-3"></i>
                  
             @if($manuscriptMailItem->user_id == auth()->user()->id)
             Me
             @else
              {{$manuscriptMailItem->user->name }} 
              @endif -   {{$manuscriptMailItem->subject}}
            </button>
          </h3>
          <div id="faq-content_{{$key}}" class="accordion-collapse collapse" data-bs-parent="#faqlist">
            <div class="accordion-body">
            {!! $manuscriptMailItem->message !!}
            </div>
          </div>
        </div>
        @endforeach
        <!-- # Faq item-->

<!-- <div class="accordion-item" data-aos="fade-up" data-aos-delay="300">
  <h3 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
      <i class="bi bi-question-circle question-icon"></i>
      Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?
    </button>
  </h3>
  <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
    <div class="accordion-body">
      Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
    </div>
  </div>
</div> -->
<!-- # Faq item-->


</div>





              </div><!-- End comment #1 -->



              
              <div class="reply-form">

                <h4>Leave a Mail</h4>
                <!-- <p>Your email address will not be published. Required fields are marked * </p> -->
                <form action="{{route('member.send.mail')}}" method="post">
                  @csrf
                  <input type="hidden" name="manuscript_id" value="{{$manuscript->id}}">
                  <!-- <div class="row">
                    <div class="col-md-6 form-group">
                      <input name="name" type="text" class="form-control" placeholder="Your Name*">
                    </div>
                    <div class="col-md-6 form-group">
                      <input name="email" type="text" class="form-control" placeholder="Your Email*">
                    </div>
                  </div> -->
                  <div class="row">
                    <div class="col form-group">
                      <input name="subject" type="text" class="form-control" placeholder="Subject...">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <textarea name="message" rows='7' class="form-control" placeholder="Message..."></textarea>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Send Mail </button>

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