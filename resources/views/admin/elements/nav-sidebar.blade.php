<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    @foreach(config('admin_menu') as $block=>$menu)
    @php
     $isActive = isset($menu['sub_menu']) ? array_key_exists(Route::currentRouteName(),$menu['sub_menu']) : false;
    @endphp
    @if(isset($menu['sub_menu']))
        <li class="nav-item @if($isActive)menu-open @endif" >
            <a href="#" class="nav-link @if($isActive)active @endif">
                <i class="nav-icon fas {{ $menu['icon'] ?? 'fa-circle' }}"></i>
                <p>
                    {{trans("menu.$block")}}
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                @foreach($menu['sub_menu'] as $name=>$sub_menu)
                <li class="nav-item">
                    <a href="{{ route("$name") }}" class="nav-link  @if(Route::currentRouteName() === $name) active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ trans("menu.".$name) }}</p>
                    </a>
                </li>
                @endforeach
            </ul>
        </li>
    @else
        <li class="nav-item">
            <a href="{{ route("$block") }}" class="nav-link  @if(Route::currentRouteName() === $block) active @endif">
                <i class="fas nav-icon {{ $menu['icon'] ?? 'fa-circle' }}"></i>
                <p>{{ trans("menu.".$block) }}</p>
            </a>
        </li>
    @endif

    @endforeach
</ul>
