@extends('layouts.app')

@section('content')

  <!-- Start your project here-->

  <style>
    .gradient-custom-2 {
      /* fallback for old browsers */
      background: #fccb90;

      /* Chrome 10-25, Safari 5.1-6 */
      background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
    }

    @media (min-width: 768px) {
      .gradient-form {
        height: 100vh !important;
      }
    }
    @media (min-width: 769px) {
      .gradient-custom-2 {
        border-top-right-radius: .3rem;
        border-bottom-right-radius: .3rem;
      }
    }
    #cntre{
      margin-top: 40px;
    }
  </style>
  <section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100" id="cntre">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
          {{-- <div class="card-header">{{ __('Register') }}</div> --}}
          <div class="card rounded-3 text-black">
            <div class="row g-0">
              <div class="col-lg-6">
                <div class="card-body p-md-5 mx-md-4">

                  <div class="text-center">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp" style="width: 185px;" alt="logo">
                    <h4 class="mt-1 mb-5 pb-1">We are The Lotus Team</h4>
                  </div>

                  <form method="POST" action="{{ route('register') }}">
                    @csrf
                  
                    <p>Please login to your account</p>
                    <div class="form-outline mb-4">
                      <input type="name" id="form2Example11" class="form-control" placeholder=" name"  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                      <!-- <label class="form-label" for="form2Example11">{{ __('Email Address') }}</label> -->
                        @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                      <input type="email" id="form2Example11" class="form-control" placeholder=" email address" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                      {{-- <label class="form-label" for="form2Example11">{{ __('Email Address') }}</label> --}}
                        @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                      <input type="password" id="form2Example22" class="form-control"  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"/>
                      <label class="form-label" for="form2Example22">{{ __('Password') }}</label>
                      @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="form-outline mb-4">
                      <input type="password" id="form2Example22" class="form-control"   name="password_confirmation" required autocomplete="new-password"/>
                      <label class="form-label" for="password-confirm">{{ __('Confirm Password') }}</label>
                    
                    </div>


                    <div class="text-center pt-1 mb-5 pb-1">
                      <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">{{ __('Register') }}</button>
                    
                    </div>

                   

                  </form>

                </div>
              </div>
              <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                  <h4 class="mb-4">We are more than just a company</h4>
                  <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
