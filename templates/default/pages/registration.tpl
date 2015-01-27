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
                    <div class="panel-heading"><h3 class="panel-title">{$register_title}</h3></div>
                    <div class="panel-body">
                        <form id="form_registration" class="" action="index.php?form=registration" method="POST" accept-charset="UTF-8" onsubmit="event.preventDefault();FormValidation.init();">
                            <fieldset>
                                   {if="$regError==true"}<div class="alert alert-error hide"><button class="close" data-dismiss="alert"></button>{$register_error}</div>{/if}
                                <div class="alert alert-error hide"><button class="close" data-dismiss="alert"></button>{$register_error}</div>
                                <div class="alert alert-success hide"><button class="close" data-dismiss="alert"></button>{$register_success}</div>
                                
                                <div class="form-group">
                                        <label class="control-label">{$label_username}<span class="required">*</span></label>
                                        <div class="controls  hint--bottom hint--info hint--bounce hint--rounded" data-hint="{$help_username}">
                                                <input type="text" name="username" data-required="1" class="span6 m-wrap form-control"/>
                                        </div>
                                        
                                </div>
                                <div class="form-group">
                                        <label class="control-label">{$label_email}<span class="required">*</span></label>
                                        <div class="controls">
                                                <input name="email" type="text" class="span6 m-wrap form-control"/>
                                        </div>
                                </div>
                                <div class="form-group">
                                        
                                        <label class="control-label">{$label_password}<span class="required">*</span></label>
                                        <div class="controls hint--bottom hint--info hint--bounce hint--rounded" data-hint="{$help_password}">
                                                <input name="password" type="password" class="span6 m-wrap form-control"/>
                                        </div>
                                        
                                </div>
                                 <div class="form-group">                                        
                                     <div class="controls"><label class="control-label">{$label_password_repeat}<span class="required">*</span></label>
                                            
                                                <input name="password_repeat" type="password" class="form-control"/>
                                        </div>
                                </div>
                                <div class="form-actions">
                                        <button type="submit" class="btn btn-primary">{$str_validate}</button>
                                        <button type="button" class="btn">{$str_cancel}</button>
                                </div>
                            </fieldset>
			</form>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <div id="loaderWrapper" style="z-index: -1001;display: none;"><div class="loaderContainer"><div class='ring blue'></div><div id="loaderText"><span>{$str_pleaseWait}</span></div></div></div>
    {include="../layout/footer"}
    <script src="pagejs/registration.js" type="text/javascript"></script>
    <script type="text/javascript">$(function() { FormValidation.init();});</script>
</body>
 
</html>
