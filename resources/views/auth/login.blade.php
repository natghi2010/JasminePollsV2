<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    @include('components.style')
</head>
<body class="bg-primary">
    <div class="unix-login">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="{{ route('home') }}"><span>Addis Ababa Polls</span></a>
                        </div>
                        <div class="login-form">
                            <h4>Administrator Login</h4>

                            <!-- Error Section -->
                            @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                            <!-- End Error Section -->

                            <form method="POST" action="/login">
                                @csrf
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input id="email" type="email" class="form-control" name="email" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input id="password" type="password" class="form-control" name="password" required>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" id="remember">
                                        Remember Me
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">
                                    Login
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Include your JavaScript scripts here -->
</body>
</html>
