<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
            <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                        <img src="{{asset('gentelella/production/images/user.png')}}" alt="User Image">
                        {{strtoupper(session('username'))}}
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/admin/pengguna/ubahpass/{{session('username')}}"><i class="fa fa-lock pull-right"></i> Ubah Password</a>
                        <a class="dropdown-item" href="/auth/logout" onclick="return confirm('Lanjut keluar?')"><i class="fa fa-sign-out pull-right"></i> Keluar</a>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>