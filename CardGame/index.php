<!DOCTYPE html>
<html>

<head>
  <title>Uno Game</title>
  <link href="./Frontend/styles/index.css" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet"
    id="bootstrap-css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="./Frontend/scripts/index.js"></script>
  <script src="../Frontend/scripts/showPassword"></script>
</head>
<body id="LoginForm">
  <div class="container">
    <h1 class="form-heading"></h1>
    <div class="modal" id="signupSuccessModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Signup Success</h5>
            <button type="button" class="close" data-dismiss="modal">
              &times;
            </button>
          </div>
          <div class="modal-body"></div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              Close
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal" id="loginErrorModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Login Error</h5>
            <button type="button" class="close" data-dismiss="modal">
              &times;
            </button>
          </div>
          <div class="modal-body">
            <p>Login failed. User not found!</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              Close
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="login-form">
      <div class="main-div">
        <div class="panel">
          <h2>Admin Login</h2>
          <p>Please enter your username and password</p>
        </div>
        <form id="Login" method="POST" action="./Backend/Controller/User/Login.php">
          <div class="form-group">
            <input type="text" name="email" class="form-control" id="inputEmail" placeholder="Email Address" />
          </div>
          <div class="form-group">
            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" />
          </div>
          <div class="form-group" style="text-align: left">
            <label><input type="checkbox" name="showPassword" id="showPassword" />
              Show password</label>
          </div>

          <div class="form-group" style="text-align: left">
            <label><input type="checkbox" name="remember" /> Remember me
            </label>
          </div>
          <div class="forgot">
            <a href="#">Forgot password?</a>
          </div>
          <div class="forgot">
            <a href="./Frontend/Views/signup.html">Sign Up</a>
          </div>
          <input type="submit" class="btn btn-primary" value="Login" name="login" />
        </form>
        <p class="botto-text">by Cairocoders</p>
      </div>
    </div>
  </div>
</body>

</html>