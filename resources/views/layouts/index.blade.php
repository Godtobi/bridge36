<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>56BRIDGE</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
  <link rel="stylesheet" href="{{asset('index/style.css')}}">

</head>
<body>
<!-- partial:index.partial.html -->
<p class="tip"><img style="height:50px;" src="{{asset('index/images/logo.png')}}"> </p>
<div class="cont">
  <div class="form sign-in">
    <h2>Welcome back,</h2>
    <label>
      <span>Email</span>
      <input type="email" />
    </label>
    <label>
      <span>Password</span>
      <input type="password" />
    </label>
    <p class="forgot-pass"><a href='#'>Forgot password?</a></p>
    <button type="button" class="submit">Sign In</button>
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
      <h2>Register below to create an account</h2>
      <label>
        <span>Name</span>
        <input type="text" />
      </label>
      <label>
        <span>Email</span>
        <input type="email" />
      </label>
      <label>
        <span>Phone</span>
        <input type="email" />
      </label>
      <label>
        <span>Password</span>
        <input type="password" />
      </label>
      <button type="button" class="submit">Sign Up</button>
    </div>
  </div>
</div>


<!-- partial -->
  <script  src="{{asset('index/script.js')}}"></script>

</body>
</html>
