<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Change Password</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="{{ asset('/assets/css/font.css')}}">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="{{ asset('/assets/https://fonts.googleapis.com/css?family=Muli:300,400,700')}}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('/assets/css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('/assets/css/custom.css')}}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('/assets/img/favicon.ico')}}">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <h1>Rembo Football Club</h1>
                  </div>
                  <p class="text-center">"Unite. Triumph. Conquer."</p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">

                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Update Password') }}
                            </h2>
                    
                            <p class="mt-3 text-sm text-primary text-gray-600">
                                {{ __('Ensure your account is using a long, random password to stay secure.') }}
                            </p>
                        </header>
                    
                        <form method="post" action="{{ route('password.update') }}" class="mt-4 space-y-6">
                            @csrf
                            @method('put')
                    
                            <div class="mb-3">
                                <x-input-label for="current_password" :value="__('Current Password')" />
                                <x-text-input id="current_password" name="current_password" type="password" class="form-control" autocomplete="current-password" />
                                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                            </div>
                    
                            <div class="mb-3">
                                <x-input-label for="password" :value="__('New Password')" />
                                <x-text-input id="password" name="password" type="password" class="form-control" autocomplete="new-password" />
                                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                            </div>
                    
                            <div class="mb-3">
                                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" />
                                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                            </div>
                    
                            <div class="flex items-center gap-4">
                              <button type="submit" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                                {{ __('Save') }}
                            </button>
                          
                    
                                @if (session('status') === 'password-updated')
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-success text-gray-600"
                                    >{{ __('Saved.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     
    </div>
    <!-- JavaScript files-->
    <script src="{{ asset('/assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('/assets/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{ asset('/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('/assets/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{ asset('/assets/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{ asset('/assets/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{ asset('/assets/js/front.js')}}"></script>
  </body>
</html>