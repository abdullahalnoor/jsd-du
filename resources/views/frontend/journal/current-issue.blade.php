@extends('frontend.master')

@section("title")
Current Issue
@endsection

@push('styles')

   
@endpush

@section('content')
 <!-- ======= Breadcrumbs ======= -->
 <div class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Current Issues</h2>
          <ol>
            <li><a href="{{route('frontend.index')}}">Home</a></li>
            <!-- <li><a href="blog.html">Blog</a></li> -->
            <li>Current Issues</li>
          </ol>
        </div>

      </div>
    </div><!-- End Breadcrumbs -->

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
        <!-- <h4 class="card-title">{{$journalIssue->title}}</h4> -->
         
        
        </i> <b> Volume  : </b> {{ $journalIssue->journalVolume->volume_no  }}, {{ date('F Y',strtotime($journalIssue->publish_date  ))}}  <br>
        </i> <b>Issue : </b> {{$journalIssue->issue_no}}  <br>
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
          <span>Volume {{ $journalIssue->journalVolume->volume_no  }}, {{ date('F Y',strtotime($journalIssue->publish_date  ))}}   </span>
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
                  <li class="d-flex align-items-center"><i class="bi bi-book"></i> <a href="javascript:void(0)"> {{$journalArticleItem->page_no}} Pages </a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-download"></i> <a href="javascript:void(0)">{{$journalArticleItem->download_count}} Downloaded </a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-eye"></i> <a href="javascript:void(0)">{{$journalArticleItem->view_count}}  Viewed </a></li>
                 </ul>
              </div>
              
<hr>
<a class="btn btn-sm btn-outline-primary" href="{{route('frontend.journal.download-file',$journalArticleItem->id)}}">  <i class="bi bi-download"></i> Download</a>
<a class="btn btn-sm btn-outline-primary" target="_blank" href="{{route('frontend.journal.view-file',$journalArticleItem->id)}}"> <i class="bi bi-filetype-pdf"></i> PDF</a>
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