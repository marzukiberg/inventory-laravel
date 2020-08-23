@extends('auth/layout/header')
@section('title', 'Masuk')

<body class="login">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <form action="" method="post">
            @csrf
            <h1>Masuk</h1>
            @if(session('success'))
            <div class="alert alert-success">
              {{session('success')}}
            </div>
            @endif
            @if (session()->has('err'))
            <div class="alert alert-danger">
              {{ session('err') }}
            </div>
            @endif
            <div>
              <input type="text" class="form-control" placeholder="Username" name="username" value="{{ old('username') }}" required />
            </div>
            <div>
              <input type="password" class="form-control" placeholder="Password" name="password" required />
            </div>
            <div>
              <button class="btn btn-default submit border" type="submit"><small class="text-muted">Masuk</small></button>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <p class="change_link">Belum punya akun?
                <a href="auth/daftar" class="to_register"> Buat akun </a>
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