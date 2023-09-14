<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Forgot Password</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href={{ asset('/assets/vendor/bootstrap/css/bootstrap.min.css')}}>
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href={{ asset('/assets/vendor/font-awesome/css/font-awesome.min.css')}}>
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href={{ asset('/assets/css/font.css')}}>
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href={{ asset('/assets/https://fonts.googleapis.com/css?family=Muli:300,400,700')}}>
    <!-- theme stylesheet-->
    <link rel="stylesheet" href={{ asset('/assets/css/style.default.css')}} id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href={{ asset('/assets/css/custom.css')}}>
    <!-- Favicon-->
    <link rel="shortcut icon" href={{ asset('/assets/img/favicon.ico')}}>
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
                    <h2>Confirm Password</h2>
                    <br>

                    <div class="mb-4 text-sm text-gray-600">
                        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                    </div>
                    
                
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                
                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf
                    
                        <!-- Password -->

                        <div class="form-group-material">
                            <input id="password" type="password" name="password" required autocomplete="current-password"  class="input-material"
                            :value="__('Password')" >
                            <label for="email" class="label-material">Password</label>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                          </div>
                    
                        {{-- <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Confirm') }}
                            </x-primary-button>
                        </div> --}}
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="btn btn-primary">
                                {{ __('Confirm') }}
                            </x-primary-button>
                        </div>
                    </form>
                    </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     
    </div>
    <!-- JavaScript files-->
    <script src={{ asset('/assets/vendor/jquery/jquery.min.js')}}></script>
    <script src={{ asset('/assets/vendor/popper.js/umd/popper.min.js')}}> </script>
    <script src={{ asset('/assets/vendor/bootstrap/js/bootstrap.min.js')}}></script>
    <script src={{ asset('/assets/vendor/jquery.cookie/jquery.cookie.js')}}> </script>
    <script src={{ asset('/assets/vendor/chart.js/Chart.min.js')}}></script>
    <script src={{ asset('/assets/vendor/jquery-validation/jquery.validate.min.js')}}></script>
    <script src={{ asset('/assets/js/front.js')}}></script>
  </body>
</html>