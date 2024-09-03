<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <!-- @auth -->
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="{{asset(auth()->user()->image)}}" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">{{auth()->user()->name}}</p>
          <p class="app-sidebar__user-designation">{{auth()->user()->name}}</p>
        </div>
      </div>
      <!-- @endauth -->
      <ul class="app-menu">
        <li><a class="app-menu__item" href="{{route('admin.dashboard')}}"><i class="app-menu__icon bi bi-speedometer"></i><span class="app-menu__label">Dashboard</span></a></li>
       
        <li class="treeview
        @if(request()->url() ==  route('admin.category.index')  ) 
                    is-expanded 
                    @elseif(request()->url() == route('admin.category.create') ) 
                    is-expanded 
                  @endif"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon bi bi-laptop"></i>
        <span class="app-menu__label">Category</span>
        <i class="treeview-indicator bi bi-chevron-right"></i></a>

          <ul class="treeview-menu">
             <li><a class="treeview-item  @if(request()->url() == route('admin.category.create')) active @endif" href="{{route('admin.category.create')}}"><i class="icon bi bi-circle-fill"></i> Add</a></li>
            <li><a class="treeview-item  @if(request()->url() == route('admin.category.index')) active @endif" href="{{route('admin.category.index')}}"><i class="icon bi bi-circle-fill"></i> Manage</a></li>
          </ul>
        </li>


        
        <li class="treeview
        @if(request()->url() ==  route('admin.manufacturer.index')  ) 
                    is-expanded 
                    @elseif(request()->url() == route('admin.manufacturer.create') ) 
                    is-expanded 
                  @endif"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon bi bi-laptop"></i>
        <span class="app-menu__label">Manufacturer</span>
        <i class="treeview-indicator bi bi-chevron-right"></i></a>

          <ul class="treeview-menu">
             <li><a class="treeview-item  @if(request()->url() == route('admin.manufacturer.create')) active @endif" href="{{route('admin.manufacturer.create')}}"><i class="icon bi bi-circle-fill"></i> Add</a></li>
            <li><a class="treeview-item  @if(request()->url() == route('admin.manufacturer.index')) active @endif" href="{{route('admin.manufacturer.index')}}"><i class="icon bi bi-circle-fill"></i> Manage</a></li>
          </ul>
        </li>

        <li class="treeview
        @if(request()->url() ==  route('admin.product.index')  ) 
                    is-expanded 
                    @elseif(request()->url() == route('admin.product.create') ) 
                    is-expanded 
                  @endif"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon bi bi-laptop"></i>
        <span class="app-menu__label">Product</span>
        <i class="treeview-indicator bi bi-chevron-right"></i></a>

          <ul class="treeview-menu">
             <li><a class="treeview-item  @if(request()->url() == route('admin.product.create')) active @endif" href="{{route('admin.product.create')}}"><i class="icon bi bi-circle-fill"></i> Add</a></li>
            <li><a class="treeview-item  @if(request()->url() == route('admin.product.index')) active @endif" href="{{route('admin.product.index')}}"><i class="icon bi bi-circle-fill"></i> Manage</a></li>
          </ul>
        </li>



        <li class="treeview
        @if(request()->url() ==  route('admin.customer.index')  ) 
                    is-expanded 
                    @elseif(request()->url() == route('admin.customer.create') ) 
                    is-expanded 
                  @endif"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon bi bi-laptop"></i>
        <span class="app-menu__label">Customer</span>
        <i class="treeview-indicator bi bi-chevron-right"></i></a>

          <ul class="treeview-menu">
             <li><a class="treeview-item  @if(request()->url() == route('admin.customer.create')) active @endif" href="{{route('admin.customer.create')}}"><i class="icon bi bi-circle-fill"></i> Add</a></li>
            <li><a class="treeview-item  @if(request()->url() == route('admin.customer.index')) active @endif" href="{{route('admin.customer.index')}}"><i class="icon bi bi-circle-fill"></i> Manage</a></li>
          </ul>
        </li>


        <li class="treeview
        @if(request()->url() ==  route('admin.supplier.index')  ) 
                    is-expanded 
                    @elseif(request()->url() == route('admin.supplier.create') ) 
                    is-expanded 
                  @endif"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon bi bi-laptop"></i>
        <span class="app-menu__label">Supplier</span>
        <i class="treeview-indicator bi bi-chevron-right"></i></a>

          <ul class="treeview-menu">
             <li><a class="treeview-item  @if(request()->url() == route('admin.supplier.create')) active @endif" href="{{route('admin.supplier.create')}}"><i class="icon bi bi-circle-fill"></i> Add</a></li>
            <li><a class="treeview-item  @if(request()->url() == route('admin.supplier.index')) active @endif" href="{{route('admin.supplier.index')}}"><i class="icon bi bi-circle-fill"></i> Manage</a></li>
          </ul>
        </li>



        <li class="treeview
        @if(request()->url() ==  route('admin.purchase.index')  ) 
                    is-expanded 
                    @elseif(request()->url() == route('admin.purchase.create') ) 
                    is-expanded 
                  @endif"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon bi bi-laptop"></i>
        <span class="app-menu__label">Purchase</span>
        <i class="treeview-indicator bi bi-chevron-right"></i></a>

          <ul class="treeview-menu">
             <li><a class="treeview-item  @if(request()->url() == route('admin.purchase.create')) active @endif" href="{{route('admin.purchase.create')}}"><i class="icon bi bi-circle-fill"></i> Add</a></li>
            <li><a class="treeview-item  @if(request()->url() == route('admin.purchase.index')) active @endif" href="{{route('admin.purchase.index')}}"><i class="icon bi bi-circle-fill"></i> Manage</a></li>
          </ul>
        </li>
      


        <li class="treeview
        @if(request()->url() ==  route('admin.sale.index')  ) 
                    is-expanded 
                    @elseif(request()->url() == route('admin.sale.create') ) 
                    is-expanded 
                  @endif"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon bi bi-laptop"></i>
        <span class="app-menu__label">Sale</span>
        <i class="treeview-indicator bi bi-chevron-right"></i></a>

          <ul class="treeview-menu">
             <li><a class="treeview-item  @if(request()->url() == route('admin.sale.create')) active @endif" href="{{route('admin.sale.create')}}"><i class="icon bi bi-circle-fill"></i> Add</a></li>
            <li><a class="treeview-item  @if(request()->url() == route('admin.sale.index')) active @endif" href="{{route('admin.sale.index')}}"><i class="icon bi bi-circle-fill"></i> Manage</a></li>
          </ul>
        </li>



        <li class="treeview
        @if(request()->url() ==  route('admin.damage.index')  ) 
                    is-expanded 
                    @elseif(request()->url() == route('admin.damage.create') ) 
                    is-expanded 
                  @endif"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon bi bi-laptop"></i>
        <span class="app-menu__label">Damage</span>
        <i class="treeview-indicator bi bi-chevron-right"></i></a>

          <ul class="treeview-menu">
             <li><a class="treeview-item  @if(request()->url() == route('admin.damage.create')) active @endif" href="{{route('admin.damage.create')}}"><i class="icon bi bi-circle-fill"></i> Add</a></li>
            <li><a class="treeview-item  @if(request()->url() == route('admin.damage.index')) active @endif" href="{{route('admin.damage.index')}}"><i class="icon bi bi-circle-fill"></i> Manage</a></li>
          </ul>
        </li>



        <li class="treeview
        @if(request()->url() ==  route('admin.user.index')  ) 
                    is-expanded 
                    @elseif(request()->url() == route('admin.user.create') ) 
                    is-expanded 
                  @endif"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon bi bi-laptop"></i>
        <span class="app-menu__label">User</span>
        <i class="treeview-indicator bi bi-chevron-right"></i></a>

          <ul class="treeview-menu">
             <li><a class="treeview-item  @if(request()->url() == route('admin.user.create')) active @endif" href="{{route('admin.user.create')}}"><i class="icon bi bi-circle-fill"></i> Add</a></li>
            <li><a class="treeview-item  @if(request()->url() == route('admin.user.index')) active @endif" href="{{route('admin.user.index')}}"><i class="icon bi bi-circle-fill"></i> Manage</a></li>
          </ul>
        </li>


        <li class="treeview
        @if(request()->url() ==  route('admin.role.index')  ) 
                    is-expanded 
                    @elseif(request()->url() == route('admin.role.create') ) 
                    is-expanded 
                  @endif"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon bi bi-laptop"></i>
        <span class="app-menu__label">Role</span>
        <i class="treeview-indicator bi bi-chevron-right"></i></a>

          <ul class="treeview-menu">
             <li><a class="treeview-item  @if(request()->url() == route('admin.role.create')) active @endif" href="{{route('admin.role.create')}}"><i class="icon bi bi-circle-fill"></i> Add</a></li>
            <li><a class="treeview-item  @if(request()->url() == route('admin.role.index')) active @endif" href="{{route('admin.role.index')}}"><i class="icon bi bi-circle-fill"></i> Manage</a></li>
          </ul>
        </li>





        <li class="treeview
        @if(request()->url() ==  route('admin.permission.index')  ) 
                    is-expanded 
                    @elseif(request()->url() == route('admin.permission.create') ) 
                    is-expanded 
                  @endif"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon bi bi-laptop"></i>
        <span class="app-menu__label">Permission</span>
        <i class="treeview-indicator bi bi-chevron-right"></i></a>

          <ul class="treeview-menu">
             <li><a class="treeview-item  @if(request()->url() == route('admin.permission.create')) active @endif" href="{{route('admin.permission.create')}}"><i class="icon bi bi-circle-fill"></i> Add</a></li>
            <li><a class="treeview-item  @if(request()->url() == route('admin.permission.index')) active @endif" href="{{route('admin.permission.index')}}"><i class="icon bi bi-circle-fill"></i> Manage</a></li>
          </ul>
        </li>






      </ul>
    </aside>