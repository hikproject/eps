<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
  <title>Login | {{ config('app.name') }}</title>
  <!-- [Meta] -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="{{ config('app.description') }}">
  <meta name="keywords" content="{{ config('app.keywords') }}">
  <meta name="author" content="{{ config('app.author') }}">

  <!-- [Favicon] icon -->
  <link rel="icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon">
  <!-- [Google Font] Family -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">
  <!-- [Tabler Icons] -->
  <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}">
  <!-- [Feather Icons] -->
  <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}">
  <!-- [Font Awesome Icons] -->
  <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}">
  <!-- [Material Icons] -->
  <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}">
  <!-- [Template CSS Files] -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link">
  <link rel="stylesheet" href="{{ asset('assets/css/style-preset.css') }}">
</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body>
  <!-- [ Pre-loader ] start -->
  <div class="loader-bg">
    <div class="loader-track">
      <div class="loader-fill"></div>
    </div>
  </div>
  <!-- [ Pre-loader ] End -->

  <div class="auth-main">
    <div class="auth-wrapper v3">
      <div class="auth-form">
        <div class="card my-5">
          <div class="card-body">
            <form method="POST" action="/login">
              @csrf
              <div class="d-flex justify-content-center mb-4">
                <a href="#"><img src="{{ asset('assets/images/Leoco.png') }}" alt="logo"></a>
              </div>
              <div class="form-group mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email Address" required autocomplete="email" autofocus>
                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary">Login</button>
              </div>
            </form>
          </div>
        </div>
        <div class="auth-footer row">
          <div class="col my-1">
            <p class="m-0"> Hikpro Copyright 2025 © <a href="#">{{ config('app.name') }}</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- [ Main Content ] end -->
  <!-- Required Js -->
  <script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/simplebar.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/fonts/custom-font.js') }}"></script>
  <script src="{{ asset('assets/js/pcoded.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>

  <script>layout_change('light');</script>
  <script>change_box_container('false');</script>
  <script>layout_rtl_change('false');</script>
  <script>preset_change("preset-1");</script>
  <script>font_change("Public-Sans");</script>
</body>
<!-- [Body] end -->

</html>