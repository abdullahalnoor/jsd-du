@extends('frontend.master')

@section("title")
{{$journalArticle->title}}
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
          <h2>Article</h2>
          <ol>
            <li><a href="{{route('frontend.index')}}">Home</a></li>
            <!-- <li><a href="blog.html">Blog</a></li> -->
            <li>Article</li>
          </ol>
        </div>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row g-5">

          <div class="col-lg-8 ">

        



          
          
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
           

       
            <!-- </article> -->

       


           <article class="blog-details">

              

              <div class="content">
               
                <a href="javascript:void(0)"><h3>{{$journalArticle->title}}</h3></a>
                <p>{{$journalArticle->abstract}}</p>
              
                <p>
                <i class="bi bi-bookmark-check"></i> <b>DOI : </b> {{$journalArticle->doi_url}}
                </p>
                <p>
                <i class="bi bi-person"></i> <b>Authors : </b> {{$journalArticle->authors}}
                </p>
                <p>
                <i class="bi bi-tag"></i> <b>Keywords : </b> {{$journalArticle->keywords}}
                </p>
              </div>

              <div class="meta-top">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-book"></i> <a href="javascript:void(0)"> {{$journalArticle->page_no}} Pages </a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-download"></i> <a href="javascript:void(0)">{{$journalArticle->download_count}} Downloaded </a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-eye"></i> <a href="javascript:void(0)">{{$journalArticle->view_count}}  Viewed </a></li>
                 </ul>
              </div>
              
<hr>
              <a class="btn btn-sm btn-outline-primary" href="{{route('frontend.journal.download-file',$journalArticle->id)}}">  <i class="bi bi-download"></i> Download</a>
              <a class="btn btn-sm btn-outline-primary" target="_blank" href="{{route('frontend.journal.view-file',$journalArticle->id)}}"> <i class="bi bi-filetype-pdf"></i> PDF</a>

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
        
        
            
            
            
            
            <!-- End post author -->

          

          </div>

          <div class="col-lg-4">

            <div class="sidebar">

              @include('frontend.includes.sidebar')

              <div class=" ">
              <p class="cross-line-right">
          <span>Keywords </span>
        </p>
                <svg id="wordcloud" ></svg>
              </div>

            </div><!-- End Blog Sidebar -->

          </div>
        </div>

      </div>
    </section><!-- End Blog Details Section -->
    <div id="route" data-route="{{route('frontend.journal.keyword',$journalArticle->id)}}"></div>
@endsection

@push('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$(document).ready(function(){

    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var route = $("#route").data("route")
    // console.log(route);
    var keywords = null;
    // (function (){
      $.get(route, function(data){
        // console.log(data);
        // keywords = data
        var keywords = []
        data.forEach((item,index) => {
          // console.log(item,index);
          keywords[index] = {"text":item,"size":1}
      })

        // var keywords = keywords;
                var totalWeight = 0;
                var blockWidth = 300;
                var blockHeight = 200;
                var transitionDuration = 200;
                var length_keywords = keywords.length;
                var layout = d3.layout.cloud();

                layout.size([blockWidth, blockHeight])
                    .words(keywords)
                    .fontSize(function(d)
                    {
                        return fontSize(+d.size);
                    })
                    .on('end', draw);

                var svg = d3.select("#wordcloud").append("svg")
                    .attr("viewBox", "0 0 " + blockWidth + " " + blockHeight)
                    .attr("width", '100%');

                function update() {
                    var words = layout.words();
                    fontSize = d3.scaleLinear().range([16, 34]);
                    if (words.length) {
                        fontSize.domain([+words[words.length - 1].size || 1, +words[0].size]);
                    }
                }

                keywords.forEach(function(item,index){totalWeight += item.size;});

                update();

                function draw(words, bounds) {
                    var width = layout.size()[0],
                        height = layout.size()[1];

                    scaling = bounds
                        ? Math.min(
                            width / Math.abs(bounds[1].x - width / 2),
                            width / Math.abs(bounds[0].x - width / 2),
                            height / Math.abs(bounds[1].y - height / 2),
                            height / Math.abs(bounds[0].y - height / 2),
                        ) / 2
                        : 1;

                    svg
                    .append("g")
                    .attr(
                        "transform",
                        "translate(" + [width >> 1, height >> 1] + ")scale(" + scaling + ")",
                    )
                    .selectAll("text")
                        .data(words)
                    .enter().append("text")
                        // .style("font-size", function(d) { return 35 + "px"; })
                        .style("font-size", function(d) { return d.size + "px"; })
                        .style("font-family", 'serif')
                        .style("fill", randomColor)
                        .style('cursor', 'pointer')
                        .style('opacity', 0.9)
                        .attr('class', 'keyword')
                        .attr("text-anchor", "middle")
                        .attr("transform", function(d) {
                            return "translate(" + [d.x, d.y] + ")rotate(" + d.rotate + ")";
                        })
                        .text(function(d) { return d.text; })
                        .on("click", function(d, i){
                            // window.location = "https://journal.bangla.du.ac.bd/search?query=QUERY_SLUG".replace(/QUERY_SLUG/, encodeURIComponent(''+d.text+''));
                        })
                        .on("mouseover", function(d, i) {
                            d3.select(this).transition()
                                .duration(transitionDuration)
                                .style('font-size',function(d) { return (d.size + 3) + "px"; })
                                .style('opacity', 1);
                        })
                        .on("mouseout", function(d, i) {
                            d3.select(this).transition()
                                .duration(transitionDuration)
                                .style('font-size',function(d) { return d.size + "px"; })
                                .style('opacity', 0.7);
                        })
                        .on('resize', function() { update() });
                }

                layout.start();


      });
    // })()
     
  


});

    function randomColor() {
            var cores = ['#1f77b4', '#ff7f0e', '#2ca02c', '#d62728', '#9467bd', '#8c564b', '#e377c2', '#7f7f7f', '#bcbd22', '#17becf'];
            return cores[Math.floor(Math.random()*cores.length)];
        }

                    document.addEventListener("DOMContentLoaded", function() {
                // var keywords = [{"text":"\u09b8\u09c8\u09af\u09bc\u09a6 \u09b6\u09be\u09ae\u09b8\u09c1\u09b2 \u09b9\u0995","size":1},
                // {"text":"\u09ac\u09c8\u09b6\u09be\u0996\u09c7 \u09b0\u099a\u09bf\u09a4 \u09aa\u0999\u09cd\u200c\u0995\u09cd\u09a4\u09bf\u09ae\u09be\u09b2\u09be","size":1},{"text":"\u0986\u0996\u09a4\u09be\u09b0\u09c1\u099c\u09cd\u099c\u09be\u09ae\u09be\u09a8 \u0987\u09b2\u09bf\u09af\u09bc\u09be\u09b8","size":1},{"text":"\u099b\u09cb\u099f\u0997\u09b2\u09cd\u09aa","size":1},{"text":"\u09b6\u09cd\u09b0\u09c7\u09a3\u09bf\u09a6\u09cd\u09ac\u09a8\u09cd\u09a6\u09cd\u09ac ","size":1},{"text":"\u09ac\u09be\u0982\u09b2\u09be\u09a6\u09c7\u09b6\u09c7\u09b0 \u09b8\u09be\u09b9\u09bf\u09a4\u09cd\u09af","size":1},{"text":"\u09ac\u09be\u0982\u09b2\u09be\u09a6\u09c7\u09b6\u09c7\u09b0 \u099b\u09cb\u099f\u0997\u09b2\u09cd\u09aa","size":1},{"text":"\u09b6\u09cd\u09b0\u09c7\u09a3\u09bf\u099a\u09c7\u09a4\u09a8\u09be","size":1},{"text":"\u09b6\u09cd\u09b0\u09c7\u09a3\u09bf\u09b8\u0982\u0997\u09cd\u09b0\u09be\u09ae","size":1},{"text":"\u09b0\u09be\u09ab\u09be\u09a4 \u0986\u09b2\u09ae \u09ae\u09bf\u09b6\u09c1 ","size":1},{"text":"\u09b6\u09b9\u09c0\u09a6\u09c1\u09b2 \u099c\u09b9\u09bf\u09b0 ","size":1},{"text":"\u099b\u09cb\u099f\u0997\u09b2\u09cd\u09aa ","size":1},{"text":"\u09a8\u09bf\u09ae\u09cd\u09a8\u09ac\u09b0\u09cd\u0997 ","size":1},{"text":"\u0995\u09be\u09a8\u09bf\u099c \u09ab\u09be\u09a4\u09c7\u09ae\u09be \u09ac\u09b0\u09cd\u09a3\u09be","size":1},{"text":"\u099c\u09be\u09a8\u09cd\u09a8\u09be\u09a4 \u0986\u09b0\u09be \u09b8\u09cb\u09b9\u09c7\u09b2\u09c0","size":1},{"text":"\u09ae\u09be\u09b8\u09c1\u09a6\u09be \u0996\u09be\u09a4\u09c1\u09a8 \u099c\u09c1\u0981\u0987","size":1},{"text":"\u09ae\u09c1\u09a8\u09bf\u09b0\u09be \u09b8\u09c1\u09b2\u09a4\u09be\u09a8\u09be","size":1},{"text":"\u09b0\u09ac\u09c0\u09a8\u09cd\u09a6\u09cd\u09b0\u09a8\u09be\u09a5 ","size":1},{"text":"\u09b6\u0999\u09cd\u0996 \u0998\u09cb\u09b7","size":1},{"text":"\u09b8\u09be\u0987\u09ae \u09b0\u09be\u09a8\u09be","size":1},{"text":"\u0985\u0997\u09cd\u09a8\u09bf-\u09ac\u09c0\u09a3\u09be ","size":1},{"text":"\u0995\u09be\u099c\u09c0 \u09a8\u099c\u09b0\u09c1\u09b2 \u0987\u09b8\u09b2\u09be\u09ae ","size":1},{"text":"\u09b9\u09cb\u09b8\u09a8\u09c7 \u0986\u09b0\u09be","size":1},{"text":"\u09b8\u09c8\u09af\u09bc\u09a6 \u09b6\u09be\u09b9\u09b0\u09bf\u09af\u09bc\u09be\u09b0 \u09b0\u09b9\u09ae\u09be\u09a8","size":1},{"text":"\u09b8\u09c8\u09af\u09bc\u09a6 \u0993\u09af\u09bc\u09be\u09b2\u09c0\u0989\u09b2\u09cd\u09b2\u09be\u09b9\u09cd\u200c\u09b0 \u099b\u09cb\u099f\u0997\u09b2\u09cd\u09aa","size":1},{"text":"\u09a6\u09c3\u09b7\u09cd\u099f\u09bf\u09aa\u09be\u09a4\u09c7\u09b0 \u09ad\u09be\u09b7\u09be ","size":1},{"text":"\u09ae\u09cb\u09b9\u09be\u09ae\u09cd\u09ae\u09a6 \u0986\u099c\u09ae","size":1},{"text":"\u09a6\u09cb\u09ad\u09be\u09b7\u09c0 \u09aa\u09c1\u09a5\u09bf","size":1},{"text":"\u0986\u09ac\u09a6\u09c1\u09b2 \u0995\u09b0\u09bf\u09ae \u09b8\u09be\u09b9\u09bf\u09a4\u09cd\u09af\u09ac\u09bf\u09b6\u09be\u09b0\u09a6","size":1},{"text":"\u09b6\u09b9\u09c0\u09a6 \u0987\u0995\u09ac\u09be\u09b2","size":1},{"text":"\u09aa\u09c2\u09b0\u09cd\u09ac\u09be\u09b6\u09be","size":1},{"text":"\u09b8\u099e\u09cd\u099c\u09df \u09ad\u099f\u09cd\u099f\u09be\u099a\u09be\u09b0\u09cd\u09af\u09c7\u09b0 \u0995\u09ac\u09bf\u09a4\u09be ","size":1},{"text":"\u09ae\u09c1\u09b9\u09ae\u09cd\u09ae\u09a6 \u09b6\u09b9\u09c0\u09a6\u09c1\u09b2\u09cd\u09b2\u09be\u09b9","size":1},{"text":"\u09a1\u0995\u09cd\u099f\u09b0 \u09ae\u09c1\u09b9\u09ae\u09cd\u09ae\u09a6 \u09b6\u09b9\u09c0\u09a6\u09c1\u09b2\u09cd\u09b2\u09be\u09b9","size":1},{"text":"\u099a\u09b0\u09cd\u09af\u09be\u09aa\u09a6 ","size":1},{"text":"\u09ac\u09cc\u09a6\u09cd\u09a7 \u0997\u09be\u09a8\u09c7\u09b0 \u09ad\u09be\u09b7\u09be ","size":1},{"text":"\u09ac\u09be\u0982\u09b2\u09be \u09ad\u09be\u09b7\u09be ","size":1}];
                // var keywords = keywords;
                // var totalWeight = 0;
                // var blockWidth = 300;
                // var blockHeight = 200;
                // var transitionDuration = 200;
                // var length_keywords = keywords.length;
                // var layout = d3.layout.cloud();

                // layout.size([blockWidth, blockHeight])
                //     .words(keywords)
                //     .fontSize(function(d)
                //     {
                //         return fontSize(+d.size);
                //     })
                //     .on('end', draw);

                // var svg = d3.select("#wordcloud").append("svg")
                //     .attr("viewBox", "0 0 " + blockWidth + " " + blockHeight)
                //     .attr("width", '100%');

                // function update() {
                //     var words = layout.words();
                //     fontSize = d3.scaleLinear().range([16, 34]);
                //     if (words.length) {
                //         fontSize.domain([+words[words.length - 1].size || 1, +words[0].size]);
                //     }
                // }

                // keywords.forEach(function(item,index){totalWeight += item.size;});

                // update();

                // function draw(words, bounds) {
                //     var width = layout.size()[0],
                //         height = layout.size()[1];

                //     scaling = bounds
                //         ? Math.min(
                //             width / Math.abs(bounds[1].x - width / 2),
                //             width / Math.abs(bounds[0].x - width / 2),
                //             height / Math.abs(bounds[1].y - height / 2),
                //             height / Math.abs(bounds[0].y - height / 2),
                //         ) / 2
                //         : 1;

                //     svg
                //     .append("g")
                //     .attr(
                //         "transform",
                //         "translate(" + [width >> 1, height >> 1] + ")scale(" + scaling + ")",
                //     )
                //     .selectAll("text")
                //         .data(words)
                //     .enter().append("text")
                //         .style("font-size", function(d) { return d.size + "px"; })
                //         .style("font-family", 'serif')
                //         .style("fill", randomColor)
                //         .style('cursor', 'pointer')
                //         .style('opacity', 0.7)
                //         .attr('class', 'keyword')
                //         .attr("text-anchor", "middle")
                //         .attr("transform", function(d) {
                //             return "translate(" + [d.x, d.y] + ")rotate(" + d.rotate + ")";
                //         })
                //         .text(function(d) { return d.text; })
                //         .on("click", function(d, i){
                //             // window.location = "https://journal.bangla.du.ac.bd/search?query=QUERY_SLUG".replace(/QUERY_SLUG/, encodeURIComponent(''+d.text+''));
                //         })
                //         .on("mouseover", function(d, i) {
                //             d3.select(this).transition()
                //                 .duration(transitionDuration)
                //                 .style('font-size',function(d) { return (d.size + 3) + "px"; })
                //                 .style('opacity', 1);
                //         })
                //         .on("mouseout", function(d, i) {
                //             d3.select(this).transition()
                //                 .duration(transitionDuration)
                //                 .style('font-size',function(d) { return d.size + "px"; })
                //                 .style('opacity', 0.7);
                //         })
                //         .on('resize', function() { update() });
                // }

                // layout.start();
            });
</script>
   
@endpush