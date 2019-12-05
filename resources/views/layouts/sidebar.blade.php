<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="{{ route('home') }}" class="site_title"><i class="fa fa-paw"></i> <span>SIPENTUR</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                </div>
                <!-- /menu profile quick info -->
                <br />
                <br>
                <br>
                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <ul class="nav side-menu">
                            @if (Auth::user()->id_role == '1')
                            <li><a><i class="fa fa-edit"></i> Gedung <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li>
                                        <a href="{{ route('admin.indexbuilding')}}" class="nav-link">
                                            <i class="fa fa-table"></i>
                                            <span>Data Gedung</span>
                                        </a>
                                    </li>
                                    {{-- <li>
                                        <a href="{{ route('admin.buildingverification')}}" class="nav-link">
                                            <i class="fa fa-table"></i>
                                            <span>Verifikasi Gedung</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.editverification')}}" class="nav-link">
                                            <i class="fa fa-table"></i>
                                            <span>Pengajuan Edit Gedung</span>
                                        </a>
                                    </li> --}}
                                </ul>
                            </li>


                            <li>
                                <a href="{{ route('admin.index')}}" class="nav-link">
                                    <i class="fa fa-edit"></i>
                                    <span>Data Penyewaan</span>
                                </a>
                            </li>
                            @endif

                            @if (Auth::user()->id_role == 2)
                            <li>
                                <a href="{{ route('owner.profile')}}" class="nav-link">
                                    <i class="fa fa-user"></i>
                                    <span>Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('owner.indexgedung')}}" class="nav-link">
                                    <i class="fa fa-table"></i>
                                    <span>Data Gedung</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('owner.penyewaan')}}" class="nav-link">
                                    <i class="fa fa-edit"></i>
                                    <span>Data Penyewaan</span>
                                </a>
                            </li>
                            @endif

                            @if (Auth::user()->id_role == '3')
                            <li>
                                <a href="{{ route('profile.index')}}" class="nav-link">
                                    <i class="fa fa-user"></i>
                                    <span>Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('masyarakat.indexrekomendasi')}}" class="nav-link">
                                    <i class="fa fa-table"></i>
                                    <span>Rekomendasi Gedung</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('masyarakat.indexsewa')}}" class="nav-link">
                                    <i class="fa fa-edit"></i>
                                    <span>Sewa Gedung</span>
                                </a>
                            </li>
                            @endif


                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->
            </div>
        </div>
        <!-- page content -->

    </div>