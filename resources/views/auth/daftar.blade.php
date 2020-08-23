@extends('auth/layout/header')

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="" method="post">
                        @csrf
                        <h1>Buat Akun</h1>

                        @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        @if (session()->has('err'))
                        <div class="alert alert-danger">
                            {{ session('err') }}
                        </div>
                        @endif
                        <div>
                            <input type="text" class="form-control" placeholder="Username" name="username" value="{{ old('username') }}" />
                            @if ($errors->any())
                            @error('username')
                            <span class="text-danger float-left" style="margin-top: -20px">{{ $message }}</span>
                            @enderror
                            @endif
                        </div>
                        <div>
                            <input type="password" class="form-control password" placeholder="Password" name="password" />
                            @if ($errors->any())
                            @error('password')
                            <span class="text-danger float-left" style="margin-top: -20px">{{ $message }}</span>
                            @enderror
                            @endif
                        </div>
                        <div>
                            <input type="password" class="form-control password1" placeholder="Konfirmasi Password" name="password1" />
                            @if ($errors->any())
                            @error('password1')
                            <span class="text-danger float-left" style="margin-top: -20px">{{ $message }}</span>
                            @enderror
                            @endif
                        </div>
                        <div>
                            <select name="role" id="role" class="form-control" required>
                                <option value="">-- PILIH ROLE --</option>
                                <option value="admin">admin</option>
                                <option value="manager">manajer</option>
                            </select>
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-default submit border btn-daftar" type="submit"><small class="text-muted">Daftar</small></button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">Sudah punya akun ?
                                <a href="/" class="to_register"> Masuk </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-cubes"></i> Sistem Inventory Barang!</h1>
                                <p>©2020. Sistem Inventory Barang</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>

</html>