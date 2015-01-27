<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search"><div class="input-group custom-search-form"><input type="text" class="form-control" id="navsearch" placeholder="{$str_search}..."><span class="input-group-btn"><button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></span></div></li>
                        <li><a href="index.php?page=dashboard"><i class="fa fa-dashboard fa-fw"></i> {$home_sitename}</a></li>
                        <li><a href="index.php?page=newsnippet"><i class="fa fa-pencil fa-fw"></i> {$str_newSnippet}</a></li> 
                       <li><a href="index.php?page=my-snippets"><i class="fa fa-book fa-fw"></i> {$str_mySnippets}</a></li>
                        <li><a href="index.php?page=newest-snippets"><i class="fa fa-coffee fa-fw"></i> {$str_newest}</a></li>
                        <li><a href="index.php?page=most-commented"><i class="fa fa-comments fa-fw"></i> {$str_mostCommented}</a></li>
                        <li><a href="index.php?page=most-viewed"><i class="fa fa-eye fa-fw"></i> {$str_mostViewed}</a></li>
                        <!--<li><a href="index.php?page=by-language"><i class="fa fa-flag fa-fw"></i> {$str_snippetsByLanguage}</a></li>-->
                        <li>
                            <a href="#"><i class="fa fa-flag fa-fw"></i> {$str_snippetsByLanguage}<span class="fa arrow"></span></a>                        
                            <ul class="nav nav-second-level">
                                <li><a href="index.php?page=snippetOverview&cat=1">Script</a></li>
                                <li><a href="index.php?page=snippetOverview&cat=2">Web</a></li>
                                <li><a href="index.php?page=snippetOverview&cat=3">.Net</a></li>
                                <li><a href="index.php?page=snippetOverview&cat=4">System</a></li>
                                <li><a href="index.php?page=snippetOverview&cat=5">Configuration</a></li>
                                <li><a href="index.php?page=snippetOverview&cat=6">Schema &AMP; Data</a></li>
                                <li><a href="index.php?page=snippetOverview&cat=8">Highlevel</a></li>
                                <li><a href="index.php?page=snippetOverview&cat=7">Others</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>