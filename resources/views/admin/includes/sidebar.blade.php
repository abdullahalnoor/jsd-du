<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        @auth
        <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="{{asset(auth()->user()->image)}}" alt="{{auth()->user()->name}}">
        <div>
          <p class="app-sidebar__user-name">{{auth()->user()->name}}</p>
          <p class="app-sidebar__user-designation">
            @foreach(auth()->user()->roles as $sidebarRoleName)
            {{$sidebarRoleName->name}}
            @endforeach
          </p>
        </div>
      </div>
      @endauth
      <ul class="app-menu">
        <li><a class="app-menu__item" href="{{route('admin.dashboard')}}"><i class="app-menu__icon bi bi-speedometer"></i><span class="app-menu__label">Dashboard</span></a></li>
        
        <li><a class="app-menu__item" href="{{route('admin.site-page.index')}}"><i class="app-menu__icon bi bi-info"></i><span class="app-menu__label">Site Page</span></a></li>
       
        <li><a class="app-menu__item" href="{{route('admin.manage-author.index')}}"><i class="app-menu__icon bi bi-info"></i><span class="app-menu__label">Manage Author </span></a></li>
        <li><a class="app-menu__item" href="{{route('admin.manage-manuscript.index')}}"><i class="app-menu__icon bi bi-info"></i><span class="app-menu__label">Manage Manuscript </span></a></li>
       
        <!-- <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon bi bi-laptop"></i>
        <span class="app-menu__label">Category</span>
        <i class="treeview-indicator bi bi-chevron-right"></i></a>

          <ul class="treeview-menu">
             <li><a class="treeview-item " href="{{route('admin.category.create')}}"><i class="icon bi bi-circle-fill"></i> Add</a></li>
            <li><a class="treeview-item  " href="{{route('admin.category.index')}}"><i class="icon bi bi-circle-fill"></i> Manage</a></li>
          </ul>
        </li> -->


        <!-- <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon bi bi-info"></i>
        <span class="app-menu__label">Site Page</span>
        <i class="treeview-indicator bi bi-chevron-right"></i></a>

          <ul class="treeview-menu">
             <li><a class="treeview-item " href="{{route('admin.site-page.create')}}"><i class="icon bi bi-circle-fill"></i> Add</a></li>
            <li><a class="treeview-item  " href="{{route('admin.site-page.index')}}"><i class="icon bi bi-circle-fill"></i> Manage</a></li>
          </ul>
        </li> -->


        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon bi bi-person-badge"></i>
        <span class="app-menu__label">Board Member</span>
        <i class="treeview-indicator bi bi-chevron-right"></i></a>

          <ul class="treeview-menu">
             <li><a class="treeview-item " href="{{route('admin.board-member.create')}}"><i class="icon bi bi-circle-fill"></i> Add</a></li>
            <li><a class="treeview-item  " href="{{route('admin.board-member.index')}}"><i class="icon bi bi-circle-fill"></i> Manage</a></li>
          </ul>
        </li>

        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon bi bi-calendar"></i>
        <span class="app-menu__label">Journal Year</span>
        <i class="treeview-indicator bi bi-chevron-right"></i></a>

          <ul class="treeview-menu">
             <li><a class="treeview-item " href="{{route('admin.journal-year.create')}}"><i class="icon bi bi-circle-fill"></i> Add</a></li>
            <li><a class="treeview-item  " href="{{route('admin.journal-year.index')}}"><i class="icon bi bi-circle-fill"></i> Manage</a></li>
          </ul>
        </li>


        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon bi bi-book-half"></i>
        <span class="app-menu__label">Journal Volume</span>
        <i class="treeview-indicator bi bi-chevron-right"></i></a>

          <ul class="treeview-menu">
             <li><a class="treeview-item " href="{{route('admin.journal-volume.create')}}"><i class="icon bi bi-circle-fill"></i> Add</a></li>
            <li><a class="treeview-item  " href="{{route('admin.journal-volume.index')}}"><i class="icon bi bi-circle-fill"></i> Manage</a></li>
          </ul>
        </li>
       

        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon bi bi-pen"></i>
        <span class="app-menu__label">Journal Issue</span>
        <i class="treeview-indicator bi bi-chevron-right"></i></a>

          <ul class="treeview-menu">
             <li><a class="treeview-item " href="{{route('admin.journal-issue.create')}}"><i class="icon bi bi-circle-fill"></i> Add</a></li>
            <li><a class="treeview-item  " href="{{route('admin.journal-issue.index')}}"><i class="icon bi bi-circle-fill"></i> Manage</a></li>
          </ul>
        </li>


        

        <!-- <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon bi bi-laptop"></i>
        <span class="app-menu__label">User</span>
        <i class="treeview-indicator bi bi-chevron-right"></i></a>

          <ul class="treeview-menu">
             <li><a class="treeview-item  " href="{{route('admin.user.create')}}"><i class="icon bi bi-circle-fill"></i> Add</a></li>
            <li><a class="treeview-item " href="{{route('admin.user.index')}}"><i class="icon bi bi-circle-fill"></i> Manage</a></li>
          </ul>
        </li>


        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon bi bi-laptop"></i>
        <span class="app-menu__label">Role</span>
        <i class="treeview-indicator bi bi-chevron-right"></i></a>

          <ul class="treeview-menu">
             <li><a class="treeview-item " href="{{route('admin.role.create')}}"><i class="icon bi bi-circle-fill"></i> Add</a></li>
            <li><a class="treeview-item  " href="{{route('admin.role.index')}}"><i class="icon bi bi-circle-fill"></i> Manage</a></li>
          </ul>
        </li>





        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon bi bi-laptop"></i>
        <span class="app-menu__label">Permission</span>
        <i class="treeview-indicator bi bi-chevron-right"></i></a>

          <ul class="treeview-menu">
             <li><a class="treeview-item  " href="{{route('admin.permission.create')}}"><i class="icon bi bi-circle-fill"></i> Add</a></li>
            <li><a class="treeview-item  " href="{{route('admin.permission.index')}}"><i class="icon bi bi-circle-fill"></i> Manage</a></li>
          </ul>
        </li>
 -->





      </ul>
    </aside>