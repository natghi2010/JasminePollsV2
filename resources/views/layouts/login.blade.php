<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Webstrot Admin : Login</title>
   @include('components.style')
</head>

    <body>

        <div class="unix-login">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3">
                        <div class="login-content">
                            <div class="login-logo">
                                <a href="#"><span>Polling</span></a>
                            </div>
                            <div class="login-form">
                                <h4>Administratior Login</h4>
                                <form>
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Remember Me
                                        </label>
                                        <label class="pull-right">
                                            <a href="#">Forgotten Password?</a>
                                        </label>

                                    </div>
                                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Sign in</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('components.scripts')
    </body>



</html>
