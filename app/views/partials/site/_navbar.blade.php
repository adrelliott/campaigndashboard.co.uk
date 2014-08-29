
<div class="navbar navbar-default navbar-fixed-top"><!-- Navbar -->
    <div class="container"><!-- Container -->
        
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/app/dashboard" class="navbar-brand">
                {{ HTML::image('/assets/img/bootstrap/cdash_logo75px.png', 'Campaign Dashboard Logo', array('class' => 'visible-sm')) }}    
                {{ HTML::image('/assets/img/bootstrap/cdash_logo150px.png', 'Campaign Dashboard Logo', array('class' => 'hidden-sm')) }}    
            </a>
        </div>
        
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="{{ URL::route('app.search') }}"><i class="fa fa-search "></i> Search</a>
                </li>                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-cogs "></i> Settings<b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="">
                            <a href="#"><i class="fa fa-off "></i> Log Out
                            </a>
                        </li>                                                                    
                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
        
    </div><!-- /Container -->
</div><!-- /Navbar -->