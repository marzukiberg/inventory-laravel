<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="/admin" class="site_title"><i class="fa fa-cubes"></i> <span>Admin Inventory</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="{{ asset('gentelella/production/images/user.png') }}" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Selamat datang,</span>
                        <h2>Admin</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <ul class="nav side-menu">
                            <li><a href="/admin"><i class="fa fa-home"></i> Beranda</a>
                            </li>
                            @if(session('role')==='admin')
                            <li>
                                <a><i class="fa fa-database"></i> Data Master
                                    <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="/admin/karyawan">Karyawan</a></li>
                                    <li><a href="/admin/supplier">Supplier</a></li>
                                    <li><a href="/admin/barang">Barang</a></li>
                                    <li><a href="/admin/kategori_barang">Kategori Barang</a></li>
                                </ul>
                            </li>
                            @endif
                            <li><a><i class="fa fa-shopping-cart"></i> Transaksi <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="/admin/pemakaian">Pemakaian Barang</a></li>
                                    <li><a href="/admin/pengembalian">Pengembalian</a></li>
                                </ul>
                            </li>
                            @if(session('role')==='manager')
                            <li>
                                <a><i class="fa fa-file"></i> Laporan
                                    <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="/admin/laporan/barang">Data Barang</a></li>
                                    <li><a href="/admin/laporan/pemakaian">Transaksi Pemakaian</a></li>
                                    <li><a href="/admin/laporan/pengembalian">Transaksi Pengembalian</a></li>
                                </ul>
                            </li>
                            @endif
                            <li>
                                <a><i class="fa fa-cog"></i> Sistem
                                    <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="/admin/profil">Profil Saya</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->
            </div>
        </div>