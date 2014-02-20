
<div class="navbar navbar-default navbar-fixed-top"><!-- Navbar -->
    <div class="container"><!-- Container -->
        
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/app/dashboard" class="navbar-brand">
                {{ HTML::image($logo['small'], 'Campaign Dashboard Logo', array('class' => 'visible-sm')) }}    
                {{ HTML::image($logo['large'], 'Campaign Dashboard Logo', array('class' => 'hidden-sm')) }} 
            </a>
        </div>
        
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                @foreach ($navbar as $nav)
                    @if ( $nav['min_admin_level'] >= $user['admin_level'])
                        @if ( count($nav['dropdowns']))
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-{{ $nav['icon'] }}"></i> 
                                    {{ $nav['label'] }}<b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach ($nav['dropdowns'] as $dropdown)
                                        @if ( $dropdown['min_admin_level'] >= $user['admin_level'])
                                            <li class="">
                                                <a href="/{{ $dropdown['route'] }}"><i class="fa fa-{{ $dropdown['icon'] }} "></i> 
                                                    {{ $dropdown['label'] }}
                                                </a>
                                            </li>   
                                        @endif
                                    @endforeach
                                </ul>
                        @else
                            @if ( $misc['current_route']  == $nav['route'] )
                                <li class="active">
                            @else
                                <li>
                            @endif
                                <a href="/{{ ($nav['route']) }}">
                                    <i class="fa fa-{{ $nav['icon'] }}"> </i>
                                    {{ $nav['label'] }}
                                </a>
                            </li>
                        @endif
                    @endif

                @endforeach
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="#"><i class="fa fa-search "></i> Search</a>
                </li>                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-cogs "></i> Settings<b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="">
                            <a href="/app/logout"><i class="fa fa-off "></i> Log Out
                            </a>
                        </li>                                                                    
                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
        
    </div><!-- /Container -->
</div><!-- /Navbar -->