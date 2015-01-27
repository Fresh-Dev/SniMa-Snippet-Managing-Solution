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
                             <span class="viewsnippetAuthor">
                                <i class="fa fa-user"></i> {$snippetAuthor}
                            </span>                          
                            <span class="viewsnippetTitle">
                                {$headline}
                            </span>
                             <span class="badge snilapre">{$langName}</span>
                            <span class="viewsnippetCreated pull-right">{$snippetCreated}</span>
                        </div>
                        <div class="panel-infos">
                            <span class=""><i class="fa fa-eye"></i> {$str_views}: {$num_views}</span>
                            <span class=""><i class="fa fa-comments"></i> {$str_comments}: {$num_comments}</span>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                 <textarea id="editor" name="source">{$snippetSource}</textarea>
            <input type="hidden" name="source" id="sourcecode">
        <div class="themeselectWrapper">
            <label for="theme">Theme:</label>
            <select id="theme" onchange="editor.setTheme('ace/theme/'+$(this).val());">
                <option value="ambiance">ambiance</option>
                <option value="chaos">chaos</option>
                <option value="chrome">chrome</option>
                <option value="clouds">clouds</option>
                <option value="clouds_midnight">clouds_midnight</option>
                <option value="cobalt">cobalt</option>
                <option value="crimson_editor">crimson_editor</option>
                <option value="dawn">dawn</option>
                <option value="dreamweaver">dreamweaver</option>
                <option value="eclipse">eclipse</option>
                <option value="github">github</option>
                <option value="idle_fingers">idle_fingers</option>
                <option value="katzenmilch">katzenmilch</option>
                <option value="kr_theme">kr_theme</option>
                <option value="kuroir">kuroir</option>
                <option value="merbivore">merbivore</option>
                <option value="merbivore_soft">merbivore_soft</option>
                <option value="mono_industrial">mono_industrial</option>
                <option value="monokai">monokai</option>
                <option value="pastel_on_dark">pastel_on_dark</option>
                <option value="solarized_dark">solarized_dark</option>
                <option value="solarized_light">solarized_light</option>
                <option value="terminal">terminal</option>
                <option value="textmate">textmate</option>
                <option value="tomorrow">tomorrow</option>
                <option value="tomorrow_night">tomorrow_night</option>
                <option value="tomorrow_night_blue">tomorrow_night_blue</option>
                <option value="tomorrow_night_bright">tomorrow_night_bright</option>
                <option value="tomorrow_night_eighties">tomorrow_night_eighties</option>
                <option value="twilight">twilight</option>
                <option value="vibrant_ink">vibrant_ink</option>
                <option value="xcode">xcode</option>
            </select>
        </div>
                            </div>
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
    var snippetsMode = "{$snippetCodeMode}";
    editor.getSession().setMode('ace/mode/'+snippetsMode);
</script>
</body>

</html>
