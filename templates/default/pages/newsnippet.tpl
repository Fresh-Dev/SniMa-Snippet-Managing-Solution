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
