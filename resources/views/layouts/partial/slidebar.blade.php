<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an images using data-images tag
  -->

    <div class="sidebar-wrapper">
        <ul class="nav ">
            <p style="text-align: center; color: palevioletred; font-weight: bold ; font-size: 20px">MAMA'S KITCHEN</p>
           <hr>

            <li class="nav-item {{Request::is('admin/dashboard')?'active':''}} ">
                <a class="nav-link" href="{{route('dashboard.index')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item {{Request::is('admin/userProfile')?'active':''}}">
                <a class="nav-link" href="{{route('userProfile.index')}}">
                    <i class="material-icons">person</i>
                    <p>User Profile</p>
                </a>
            </li>
            <li class="nav-item {{Request::is('admin/Category')?'active':''}}">
                <a class="nav-link" href="{{route('Category.index')}}">
                    <i class="material-icons">content_paste</i>
                    <p>Categroy</p>
                </a>
            </li>
            <li class="nav-item {{Request::is('admin/item')?'active':''}}">
                <a class="nav-link"  href="{{route('item.index')}}">
                    <i class="material-icons">library_books</i>
                    <p>Items</p>
                </a>
            </li>

            <li class="nav-item {{ Request::is('admin/slider*') ? 'active': '' }}">
                <a class="nav-link" href="{{ route('slider.index') }}">
                <i class="material-icons">slideshow</i>
                <p>Sliders</p>
                </a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="./map.html">
                    <i class="material-icons">location_ons</i>
                    <p>Maps</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="./notifications.html">
                    <i class="material-icons">notifications</i>
                    <p>Notifications</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="./rtl.html">
                    <i class="material-icons">language</i>
                    <p>RTL Support</p>
                </a>
            </li>
            <li class="nav-item active-pro ">
                <a class="nav-link" href="./upgrade.html">
                    <i class="material-icons">unarchive</i>
                    <p>Upgrade to PRO</p>
                </a>
            </li>
        </ul>
    </div>
</div>
