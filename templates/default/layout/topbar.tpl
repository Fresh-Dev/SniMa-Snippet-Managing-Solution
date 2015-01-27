 <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <span class="badge topbarbaddge">{$num_newmessages}</span>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        
                        {$messagesDropdown}
                        <li class="divider"></li>
                        <span class="pull-right text-muted">
                            <a href="#newmessage" class="topbaraction" data-toggle="modal" data-target="#newmessage"><i class="fa fa-envelope"></i> Neue Nachricht</a></span>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <span class="badge topbarbaddge">{$num_newcomments}</span><i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        {*<li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>*}
                       {$commentsDropdown}
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user fa-fw"></i> {$username} <i class="fa fa-caret-down"></i></a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="index.php?page=usersettings"><i class="fa fa-gear fa-fw"></i> {$str_myAccount}</a></li>
                        <li class="divider"></li>
                        <li><a href="index.php?page=logout"><i class="fa fa-sign-out fa-fw"></i> {$str_logout}</a></li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>