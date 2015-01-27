<form role="form" id="newSnippetForm" method="POST" action="index.php?form=newsnippet" onsubmit="event.preventDefault();FormValidation.init();" accept-charset="UTS-8">
    <div class="alert alert-error hide"><button class="close" data-dismiss="alert"></button>{$codesubmit_error}</div>
    <div class="alert alert-success hide"><button class="close" data-dismiss="alert"></button>{$login_success}</div>
    <div class="row">                                
        <div class="col-lg-6">
            <div class="form-group">
                <label>{$str_snippetName}</label>
                <input class="form-control" type="text" name="title">
            </div>
        </div>                                            
        <div class="col-lg-6">                                
            <div class="form-group">
                <label>{$str_snippetlanguage}</label>
                
                <select class="form-control acemode" onchange="$('#langVal').val($(this).find(':selected').data('lang-id'));editor.getSession().setMode('ace/mode/'+$(this).val());">
                    <option disabled selected>{$str_select}</option>
                    {$dropdown_languages}
                </select><input type="hidden" name="language" id="langVal" value="">
            </div>
        </div>
    </div>
    <div class="row">                                    
        <div class="col-lg-12">
            <label>{$str_description}</label>
            <textarea class="form-control" name="description" placeholder=""></textarea>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-lg-6">
            <label>{$str_tags}</label>
            <input type="text" class="form-control" name="tags" placeholder="{$str_tags}">
        </div>
        <div class="col-lg-6">
            <div class="checkbox">
                <br/>
                <label>
                    <input type="checkbox" value="" name="private">{$str_private}
                </label>
            </div>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-lg-12">
            <label>{$label_code}</label>                                                
            <textarea id="editor" name="source">console.log("type youre code here");</textarea>
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
    <div class="row">

    <div class="col-md-12">
        <div class="form-group pull-right">
            <button type="submit" onclick="FormValidation.init();" class="btn btn-default">{$str_save}</button>
            <button type="reset" class="btn btn-default">{$str_reset}</button>
        </div>
        </div>
    </div>
</form>