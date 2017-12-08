<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LOGGGGGIIIIIIINNNN</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
  <!-- Bulma Version 0.6.0 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.0/css/bulma.min.css" integrity="sha256-HEtF7HLJZSC3Le1HcsWbz1hDYFPZCqDhZa9QsCgVUdw=" crossorigin="anonymous" />
  <style>
  html,body {
  font-family: 'Open Sans', serif;
  font-size: 14px;
  font-weight: 300;
}
.hero.is-success {
  background: #F2F6FA;
}
.hero .nav, .hero.is-success .nav {
  -webkit-box-shadow: none;
  box-shadow: none;
}
.box {
  margin-top: 5rem;
}
.avatar {
  margin-top: -70px;
  padding-bottom: 20px;
}
.avatar img {
  padding: 5px;
  background: #fff;
  border-radius: 50%;
  -webkit-box-shadow: 0 2px 3px rgba(10,10,10,.1), 0 0 0 1px rgba(10,10,10,.1);
  box-shadow: 0 2px 3px rgba(10,10,10,.1), 0 0 0 1px rgba(10,10,10,.1);
}
input {
  font-weight: 300;
}
p {
  font-weight: 700;
}
p.subtitle {
  padding-top: 1rem;
}
</style>
</head>
<body>
  <section class="hero is-success is-fullheight">
    <div class="hero-body">
      <div class="container has-text-centered">
        <div class="column is-4 is-offset-4">
          <h3 class="title has-text-grey">Login</h3>
          <p class="subtitle has-text-grey">Login to see them jawns, dawg</p>
          <div class="box">
            <figure class="avatar">
              <img src="https://thenypost.files.wordpress.com/2014/09/bear1.jpg?quality=90&strip=all&w=400">
            </figure>
            <form method="POST" action="{{ route('login') }}">
              {{ csrf_field() }}

              <div class="field">
                <div class="control">
                  <input
                    class="input is-large"
                    id="email"
                    name="email"
                    type="email"
                    placeholder="Your Email"
                    autofocus=""
                    value="{{ old('email') }}">
                </div>
              </div>

              <div class="field">
                <div class="control">
                  <input
                    class="input is-large"
                    type="password"
                    placeholder="Your Password"
                    name="password">
                </div>
              </div>
              <div class="field">
                <label class="checkbox">
                  <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                  Remember me
                </label>
              </div>
              <a class="button is-block is-info is-large">Login</a>
            </form>
          </div>
          <p class="has-text-grey">
            <a href="{{ route('register') }}">Sign Up</a> &nbsp;·&nbsp;
            <a href="{{ route('password.request') }}">Forgot Password</a>
          </p>
        </div>
      </div>
    </div>
  </section>
</body>
</html>
