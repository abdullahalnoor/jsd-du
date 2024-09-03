@extends('frontend.master')

@section("title")
Home
@endsection

@push('styles')

   
@endpush

@section('content')
 <!-- ======= Breadcrumbs ======= -->
 <!-- <div class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Home</h2>
          <ol>
            <li><a href="{{route('frontend.index')}}">Home</a></li>
          
          </ol>
        </div>

      </div>
    </div> -->
    <!-- End Breadcrumbs -->

    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row g-5">

          <div class="col-lg-8 ">

          <div class="card  p-3 mb-5" >
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{asset($journalIssue->cover_image)}}" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h4 class="card-title">About the Journal</h4>
        <p></i> <b>Chief Editor : </b> {{$journalIssue->chief_editor}}  <br>
      </i> <b>ISSN : </b> 15248380      <br>
                </i> <b>eISSN : </b> 15528324  <br>
                </i> <b>Latest Volume  : </b> {{ $journalIssue->journalVolume->volume_no  }}  <br>
                </i> <b>Issue : </b> {{$journalIssue->issue_no}}  <br>
                </i> <b>Frequency : </b> Yearly  <br>
               <!-- <p></i> <b>Chief Editor : </b> {{$journalIssue->chief_editor}} </p>
               <p></i> <b>ISSN : </b> 15248380 </p>
                <p></i> <b>eISSN : </b> 15528324 </p>
                <p></i> <b>Latest volume  : </b> {{ $journalIssue->journalVolume->volume_no  }} </p>
                <p></i> <b>Issue : </b> {{$journalIssue->issue_no}} </p>
                <p></i> <b>Frequency : </b> Yearly </p> -->
                <!-- <p>
                <i class="bi bi-calendar"></i> <b>DOI : </b> {{$journalIssue->created_at}}
                </p>
                <p>
                <i class="bi bi-book"></i> <b>Pages : </b> {{$journalIssue->page_no}}
                </p> -->
        <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
        <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
      </div>
    </div>
  </div>
</div>



          
          
            <!-- <article class="blog-details">

              <div class="post-img">
                <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
              </div>

              <h2 class="title">Dolorum optio tempore voluptas dignissimos cumque fuga qui quibusdam quia</h2>

              <div class="meta-top">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-details.html">John Doe</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="2020-01-01">Jan 1, 2022</time></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-details.html">12 Comments</a></li>
                </ul>
              </div>

              <div class="content">
                <p>
                  Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid dicta.
                  Et eveniet enim. Qui velit est ea dolorem doloremque deleniti aperiam unde soluta. Est cum et quod quos aut ut et sit sunt. Voluptate porro consequatur assumenda perferendis dolore.
                </p>

                <p>
                  Sit repellat hic cupiditate hic ut nemo. Quis nihil sunt non reiciendis. Sequi in accusamus harum vel aspernatur. Excepturi numquam nihil cumque odio. Et voluptate cupiditate.
                </p>

                <blockquote>
                  <p>
                    Et vero doloremque tempore voluptatem ratione vel aut. Deleniti sunt animi aut. Aut eos aliquam doloribus minus autem quos.
                  </p>
                </blockquote>

                <p>
                  Sed quo laboriosam qui architecto. Occaecati repellendus omnis dicta inventore tempore provident voluptas mollitia aliquid. Id repellendus quia. Asperiores nihil magni dicta est suscipit perspiciatis. Voluptate ex rerum assumenda dolores nihil quaerat.
                  Dolor porro tempora et quibusdam voluptas. Beatae aut at ad qui tempore corrupti velit quisquam rerum. Omnis dolorum exercitationem harum qui qui blanditiis neque.
                  Iusto autem itaque. Repudiandae hic quae aspernatur ea neque qui. Architecto voluptatem magni. Vel magnam quod et tempora deleniti error rerum nihil tempora.
                </p>

                <h3>Et quae iure vel ut odit alias.</h3>
                <p>
                  Officiis animi maxime nulla quo et harum eum quis a. Sit hic in qui quos fugit ut rerum atque. Optio provident dolores atque voluptatem rem excepturi molestiae qui. Voluptatem laborum omnis ullam quibusdam perspiciatis nulla nostrum. Voluptatum est libero eum nesciunt aliquid qui.
                  Quia et suscipit non sequi. Maxime sed odit. Beatae nesciunt nesciunt accusamus quia aut ratione aspernatur dolor. Sint harum eveniet dicta exercitationem minima. Exercitationem omnis asperiores natus aperiam dolor consequatur id ex sed. Quibusdam rerum dolores sint consequatur quidem ea.
                  Beatae minima sunt libero soluta sapiente in rem assumenda. Et qui odit voluptatem. Cum quibusdam voluptatem voluptatem accusamus mollitia aut atque aut.
                </p>
                <img src="assets/img/blog/blog-inside-post.jpg" class="img-fluid" alt="">

                <h3>Ut repellat blanditiis est dolore sunt dolorum quae.</h3>
                <p>
                  Rerum ea est assumenda pariatur quasi et quam. Facilis nam porro amet nostrum. In assumenda quia quae a id praesentium. Quos deleniti libero sed occaecati aut porro autem. Consectetur sed excepturi sint non placeat quia repellat incidunt labore. Autem facilis hic dolorum dolores vel.
                  Consectetur quasi id et optio praesentium aut asperiores eaque aut. Explicabo omnis quibusdam esse. Ex libero illum iusto totam et ut aut blanditiis. Veritatis numquam ut illum ut a quam vitae.
                </p>
                <p>
                  Alias quia non aliquid. Eos et ea velit. Voluptatem maxime enim omnis ipsa voluptas incidunt. Nulla sit eaque mollitia nisi asperiores est veniam.
                </p>

              </div>

              <div class="meta-bottom">
                <i class="bi bi-folder"></i>
                <ul class="cats">
                  <li><a href="#">Business</a></li>
                </ul>

                <i class="bi bi-tags"></i>
                <ul class="tags">
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">Tips</a></li>
                  <li><a href="#">Marketing</a></li>
                </ul>
              </div>

            </article> -->
            <!-- <article class="blog-details"> -->
            <p class="cross-line-right">
          <span>Research Papers  </span>
        </p>

        <!-- <div class="top">    
     <p class="cross-line">
       <span>Articles</span>
     </p>
  </div> -->
            <!-- </article> -->

       

           @foreach($journalIssue->journalArticles as $journalArticleItem)
           <article class="blog-details">

              

              <div class="content">
               
                <a href="{{route('frontend.journal.article',$journalArticleItem->id)}}"><h3>{{$journalArticleItem->title}}</h3></a>
              
                <p>
                <i class="bi bi-bookmark-check"></i> <b>DOI : </b> {{$journalArticleItem->doi_url}}
                </p>
                <p>
                <i class="bi bi-person"></i> <b>Authors : </b> {{$journalArticleItem->authors}}
                </p>
              </div>

              <div class="meta-top">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-book"></i> <a href="blog-details.html"> {{$journalArticleItem->page_no}} Pages </a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-download"></i> <a href="blog-details.html">{{$journalArticleItem->download_count}} Downloaded </a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-eye"></i> <a href="blog-details.html">{{$journalArticleItem->view_count}}  Viewed </a></li>
                 </ul>
              </div>
              
<hr>
              <a class="btn btn-sm btn-outline-primary" href="#">  <i class="bi bi-download"></i> Download</a>
              <a class="btn btn-sm btn-outline-primary" href="#"> <i class="bi bi-filetype-pdf"></i> PDF</a>
              <a class="btn btn-sm btn-outline-primary" href="{{route('frontend.journal.article',$journalArticleItem->id)}}">  <i class="bi bi-eye"></i> Read</a>

              <!-- <div class="meta-bottom">
              
                <i class="bi bi-download"></i>
                <ul class="cats">
                  <li><a href="#">Business</a></li>
                </ul>

                <i class="bi bi-eye"></i>
                <ul class="cats">
                  <li><a class="btn btn-outline-primary" href="#">Business</a></li>
                </ul>

                <i class="bi bi-tags"></i>
                <ul class="tags">
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">Tips</a></li>
                  <li><a href="#">Marketing</a></li>
                </ul>
              </div> -->

            </article>
           @endforeach
        
            
            
            
            
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