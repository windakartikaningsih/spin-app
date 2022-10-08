<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{ route('dashboardPage') }}">
                        <i data-feather="airplay"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li class="menu-title mt-2">Apps</li>

                <li>
                    <a href="{{ route('getListKategori') }}">
                        <i data-feather="calendar"></i>
                        <span> Kategori </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('getListKatalog') }}">
                        <i data-feather="message-square"></i>
                        <span> Katalog </span>
                    </a>
                </li>

                <li class="menu-title mt-2">Custom</li>

                <li>
                    <a href="#">
                        <i data-feather="gift"></i>
                        <span> Users </span>
                    </a>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->
        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->
</div>