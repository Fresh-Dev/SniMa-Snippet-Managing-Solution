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
                        <div class="panel-heading">
                            <div class="panelHeadlineText">{$view_headline}</div>
                            <div class="panelHeadlineActions">
                                
                                <label>Snippets / Seite</label>
                                <select onchange="paginationChangePerPage($(this).val());">
                                    <option value="5" selected>5</option>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                </select>
                                <span class="headerVertSep"></span>
                                <label>Sortieren nach</label>
                                <select onchange="changeSortBy($(this).val());">
                                    <option value="id" selected>ID</option>
                                    <option value="views">Meisst gesehen</option>
                                    <option value="comments">Anzahl Kommentare</option>
                                </select>
                                
                            </div>                                
                        </div>
                        <div class="panel-body">
                            
                                <input type="hidden" id="current_page" />
                                <input type="hidden" id="show_per_page" />
                                
                                <div class="snippets">
                                    {$snippetList}
                                </div>
                            
                        </div>
                        <div class="panel-footer">
                            <div id='page_navigation'></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: NEW SNIPPET -->
            
        </div>                
    </div>
</div>
     

    </div>
    <!-- /#wrapper -->

{include="../layout/footer"}
<script>
 
</script>
</body>

</html>
