<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>56BRIDGE</title>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('index/style.css')}}">

</head>
<body>
<!-- partial:index.partial.html -->
<p class="tip"><img style="height:50px;" src="{{asset('index/images/logo.png')}}"> </p>
<div class="cont">
    <div class="form sign-in">
        <h2>Welcome back,</h2>
       <form method="post" action="{{route('login')}}" >
           @csrf

           <label>
               <span>Email</span>
               <input name="email" type="email" />
               @error('email')
               <span class="alert text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
               @enderror
           </label>
           <label>
               <span>Password</span>
               <input name="password" type="password" />
               @error('password')
               <span class="alert text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
               @enderror
           </label>
           <p class="forgot-pass"><a href='#'>Forgot password?</a></p>
           <button type="submit"  class="submit">Sign In</button>
       </form>
    </div>
    <div class="sub-cont">
        <div class="img">
            <div class="img__text m--up">
                <h2>New here?</h2>
                <p>Sign up and discover great amounts of new learning opportunities!</p>
            </div>
            <div class="img__text m--in">
                <h2>Already registered?</h2>
                <p>If you already have an account, just sign in. We've missed you!</p>
            </div>
            <div class="img__btn">
                <span class="m--up">Sign Up</span>
                <span class="m--in">Sign In</span>
            </div>
        </div>
        <div class="form sign-up">

    <form method="post" action="{{route('register')}}">
        @csrf
        <label>
            <span>First Name</span>
            @error('firstname')
            <span class="alert text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
            <input name="firstname" type="text" />

        </label>
        <label>
            <span>Last Name</span>
            @error('lastname')
            <span class="alert text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
            <input name="lastname" type="text" />
        </label>
        <label>
            <span>Email</span>
            @error('email')
            <span class="alert text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
            <input name="email" type="email" />
        </label>

        <label>
            <span>Password</span>
            @error('password')
            <span class="alert text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
            <input name="password" type="password" />
        </label>
        <label>
            <span>Confirm Password</span>
            <input name="password_confirmation" type="password" />
        </label>
        <button type="submit" class="submit">Sign Up</button>
    </form>
        </div>
    </div>
</div>


<!-- partial -->
<script  src="{{asset('index/script.js')}}"></script>

</body>
</html>
