<!DOCTYPE html>
<html lang="{$lang}">
{include="../layout/header"}
<body id="loginpage">
 <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">{$sitename}</a>
            </div>
           
            
            </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading"><h3 class="panel-title">{$login_title}</h3></div>
                    <div class="panel-body">
                        <form role="form" id="form_login" method="POST" action="index.php?form=login" accept-charset="UTF-8" onsubmit='event.preventDefault();FormValidation.init();''>
                            <fieldset>
                                {if="$loginerror==true"}
                                    <div class="alert alert-error ">{$login_error}</div>
                                {/if}
                                
                                <div class="alert alert-error hide">
                                        <button class="close" data-dismiss="alert"></button>
                                        {$login_error}
                                </div>
                                <div class="alert alert-success hide">
                                        <button class="close" data-dismiss="alert"></button>
                                        {$login_success}
                                </div>
                                
                                <div class="form-group">
                                    <input class="form-control" placeholder="{$placeholder_username}" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="{$placeholder_password}" name="password" type="password" value="">
                                </div>
<!--                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>-->
                                <!-- Change this to a button or input when using this as a form -->
                                <button class="btn btn-large btn-primary" type="submit">{$login_submit}</button>
                                <a class="btn btn-large btn-warning" href="index.php?page=registration" type="link">{$str_registration}</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="loaderWrapper" style="z-index: -1001;display: none;"><div class="loaderContainer"><div class='ring blue'></div><div id="loaderText"><span>{$str_pleaseWait}</span></div></div></div>
    {include="../layout/footer"}
    <script src="pagejs/login.js" type="text/javascript"></script>
    <script type="text/javascript">$(function() { FormValidation.init();});</script>
</body>
 
</html>
