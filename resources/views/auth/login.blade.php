@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login.custom') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                    <br />
                    <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                            <form id="googleform">
                                <button type="submit" class="btn btn-primary">
                                    Log in With Google
                                </button>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
            </div>
        </div>
    </div>
</main>
</body>
</html>            </div>
        </div>
    </div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<script type="text/javascript">
$( document ).ready( function( $ ) {

    // console.log(location.hash.split('access_token'))[1];
    // if(sessionStorage.getItem("token.access_token")==null)
    if(sessionStorage.getItem("token")==null)
    {
                //console.log(location.hash.split('access_token'));
        if(location.hash)
        {
            if(location.hash.split('access_token'))
            {
                
                var access_token = location.hash.split('access_token=')[1].split('&')[0];
                sessionStorage.setItem('token', access_token);
                sessionStorage.setItem('authenticated',  new Date(). getTime());
               // console.log(location.hash.split('access_token'));
                // sessionStorage.setItem('token.access_token', access_token);

                $.ajax({
                    url: 'https://www.googleapis.com/oauth2/v1/userinfo?alt=json&access_token='+access_token,
                }).success(function ($data){
                    // sessionStorage.setItem('userName', data.email)
                });

            }
        }
        else{
            alert('access_token is invalid');
        }
    }
    $('#googleform').on('submit',function(e){
        e.preventDefault();
        var clientid ='185630134614-63pam8gi17ou9ub9okkr5hcm7lrnbm6q.apps.googleusercontent.com';
        var redirectUrl = 'http://localhost/SwitchWebSite/switch-website/public/dashboard';
        window.location.href = 'https://accounts.google.com/o/oauth2/v2/auth?' +
                                'scope=openid%20email'+
                                '&response_type=token' +
                                '&redirect_uri='+ redirectUrl +
                                '&client_id='+ clientid;
        //console.log('gg');
        
    });
    });
</script>
</body>
</html>