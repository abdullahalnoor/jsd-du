<!-- <div class="sidebar-item search-form">
                <h3 class="sidebar-title">Search</h3>
                <form action="" class="mt-3">
                  <input type="text">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div> -->
              <!-- End sidebar search formn-->
              @if(auth()->check() && auth()->user()->role_id == 2)
              <div class="sidebar-item categories">
                <!-- <h3 class="sidebar-title">Quick Links</h3> -->
                <p class="cross-line-right">
          <span>Author Links </span>
        </p>
              
                <ul class="mt-3">
               
                  <li><i class="bi bi-person "></i><a class="mr-2" href="{{route('member.index')}}"> My Profile  </a></li>
                  <li><i class="bi bi-pencil"></i><a href="{{route('member.update.profile')}}"> Update Profile </a></li>
                  <li><i class="bi bi-key"></i><a href="{{route('member.update.password')}}"> Change Password  </a></li>
                  <li><i class="bi bi-arrow-right-square"></i><a href="{{route('member.submit.manuscript')}}"> Submit a Manuscript  </a></li>
                  <li><i class="bi bi-book"></i><a href="{{route('member.my.manuscript')}}"> My Manuscript  </a></li>
               
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <li>
                    <a class="nav-link" href="route('logout')"
                      onclick="event.preventDefault();
                      this.closest('form').submit();">
                      <i class="bi bi-box-arrow-right me-2 fs-5"></i> 
                      {{ __('Log Out') }}
                    </a>
                    </li>
                  </form> 


                 
                </ul>
              </div>
              <hr>
              @endif

              <div class="sidebar-item categories">
                <!-- <h3 class="sidebar-title">Quick Links</h3> -->
                <p class="cross-line-right">
          <span>Quick Links </span>
        </p>
              
                <ul class="mt-3">
                <li><i class="bi bi-person-bounding-box"></i> <a href="{{route('frontend.page',['slug'=>'author-guidelines'])}}" > Author Guidelines</a></li>
              <li><i class="bi bi-person-check"></i> <a href="{{route('frontend.page',['slug'=>'guidelines-for-reviewers'])}}"> Guidelines for Reviewers</a></li>
          <li><i class="bi bi-person"></i> <a  href="{{route('frontend.journal.editorial-team')}}">	Editorial Team</a></li>
          <li><i class="bi bi-envelope"></i> <a  href="{{route('frontend.page',['slug'=>'contact-us'])}}">Contact Us</a></li>
            
              @if(!auth()->check())
                  <li><i class="bi bi-arrow-right-square"></i> <a href="{{route('member.login.form')}}"> Submit a Manuscript </a></li>
                 @endif
                </ul>
              </div>

             
              <!-- End sidebar categories-->

              <!-- <div class="sidebar-item recent-posts">
                <h3 class="sidebar-title">Recent Posts</h3>

                <div class="mt-3">

                  <div class="post-item mt-3">
                    <img src="assets/img/blog/blog-recent-1.jpg" alt="" class="flex-shrink-0">
                    <div>
                      <h4><a href="blog-post.html">Nihil blanditiis at in nihil autem</a></h4>
                      <time datetime="2020-01-01">Jan 1, 2020</time>
                    </div>
                  </div>

                  <div class="post-item">
                    <img src="assets/img/blog/blog-recent-2.jpg" alt="" class="flex-shrink-0">
                    <div>
                      <h4><a href="blog-post.html">Quidem autem et impedit</a></h4>
                      <time datetime="2020-01-01">Jan 1, 2020</time>
                    </div>
                  </div>
                  

                  <div class="post-item">
                    <img src="assets/img/blog/blog-recent-3.jpg" alt="" class="flex-shrink-0">
                    <div>
                      <h4><a href="blog-post.html">Id quia et et ut maxime similique occaecati ut</a></h4>
                      <time datetime="2020-01-01">Jan 1, 2020</time>
                    </div>
                  </div>

                  <div class="post-item">
                    <img src="assets/img/blog/blog-recent-4.jpg" alt="" class="flex-shrink-0">
                    <div>
                      <h4><a href="blog-post.html">Laborum corporis quo dara net para</a></h4>
                      <time datetime="2020-01-01">Jan 1, 2020</time>
                    </div>
                  </div>

                  <div class="post-item">
                    <img src="assets/img/blog/blog-recent-5.jpg" alt="" class="flex-shrink-0">
                    <div>
                      <h4><a href="blog-post.html">Et dolores corrupti quae illo quod dolor</a></h4>
                      <time datetime="2020-01-01">Jan 1, 2020</time>
                    </div>
                  </div>

                </div>

              </div> -->

              <!-- End sidebar recent posts-->

              <!-- <div class="sidebar-item tags">
                <h3 class="sidebar-title">Tags</h3>
                <ul class="mt-3">
                  <li><a href="#">App</a></li>
                  <li><a href="#">IT</a></li>
                  <li><a href="#">Business</a></li>
                  <li><a href="#">Mac</a></li>
                  <li><a href="#">Design</a></li>
                  <li><a href="#">Office</a></li>
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">Studio</a></li>
                  <li><a href="#">Smart</a></li>
                  <li><a href="#">Tips</a></li>
                  <li><a href="#">Marketing</a></li>
                </ul>
              </div> -->
              <!-- End sidebar tags-->