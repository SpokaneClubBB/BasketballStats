<?php   
        require_once 'header.php';
        
        if(isset($_COOKIE["loggedin"]) && $_COOKIE["loggedin"]==1)
        {
            //If you're logged in then redirect you to the landing page.
            //header( 'Location: index.php' );
        }        
?>

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Sign in!</h1>
            <div class="account-wall">
                <form class="form-signin" action ="admin_test.php" method ="post">
                <input type="text"  name ="Username" class = "form-control" placeholder="Username" required autofocus><br>
                <input type="password" name = "Password" class = "form-control" placeholder="Password" required><br>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Sign in</button>
                <!--<label class="checkbox pull-left">
                    <input type="checkbox" value="remember-me">
                    Remember me
                </label>
                <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>-->
                </form>
            </div>
           
        </div>
    </div>
</div>