<!DOCTYPE html>
<html lang="{$lang}">
{include="../layout/header"}
<body>
    <div id="wrapper">
        
        
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
           
            <!-- TopBar Including -->
                {include="../layout/topbar"}
            <!-- !TopBar Including -->

            
            <!-- Navigation Including -->
                {include="../layout/navigation"}
            <!-- !Navigation Including -->
        </nav>

        <div id="page-wrapper">
            
            <!-- PAGENAME -->
            <div class="row"><div class="col-lg-12"><h1 class="page-header">{$pagename}</h1></div></div>
            <!-- END: PAGENAME -->
            
            <!-- NUM FIELDS -->
            <div class="row">                
                <div class="col-lg-4 col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><div class="row"><div class="col-xs-3"><i class="fa fa-mail-reply fa-5x"></i></div><div class="col-xs-9 text-right"><div class="huge">{$num_newmessages}</div><div>{$str_newmessages}!</div></div></div></div>
                        <a href="index.php?page=messages"><div class="panel-footer"><span class="pull-left">{$str_viewall}</span><span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span><div class="clearfix"></div></div></a>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-4">
                    <div class="panel panel-red">
                        <div class="panel-heading"><div class="row"><div class="col-xs-3"><i class="fa fa-comments fa-5x"></i></div><div class="col-xs-9 text-right"><div class="huge">{$num_newcomments}</div><div>{$str_newcomments}!</div></div></div></div>
                        <a href="index.php?page=comments"><div class="panel-footer"><span class="pull-left">{$str_viewall}</span><span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span><div class="clearfix"></div></div></a>
                    </div>
                </div>
                                
                <div class="col-lg-4 col-md-4">
                    <div class="panel panel-green">
                        <div class="panel-heading"><div class="row"><div class="col-xs-3"><i class="fa fa-code fa-5x"></i></div><div class="col-xs-9 text-right"><div class="huge">{$num_totalSnippets}</div><div>{$str_totalSnippets}</div></div></div></div>
                        <a href="index.php?page=newest-snippets"><div class="panel-footer"><span class="pull-left">{$str_viewall}</span><span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span><div class="clearfix"></div></div></a>
                    </div>
                </div>
            </div>
            <!-- END: NUM FIELDS -->
            
            
            <!-- NEW SNIPPET -->
            <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">{$str_newSnippet}</div>
                        <div class="panel-body">
                            {include="../layout/newSnippetForm"}
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: NEW SNIPPET -->
            
        </div>                
    </div>
</div>

    {include="../layout/modal-new-message"}

    </div>
    <!-- /#wrapper -->

{include="../layout/footer"}

</body>

</html>
