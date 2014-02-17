
@section('page-title-area')
    <div class="col-lg-8 col-md-10 col-sm-10 col-xs-12">
        <div class="page-header">
            @section('page-title')
                <h1>
                    <i class="fa fa-CHOOSE_ICON"></i> About this page
                </h1>
                <p class="lead">
                    More info about the page
                </p>
            @show
        </div>
    </div>
@show
          
@section('next-actions')
    <div class="col-lg-4 col-md-2 col-sm-2 visible-lg visible-md visible-sm hidden-xs">
        <div class="page-header border-none">
            <div class="btn-group pull-right">
                <button type="button" class="btn btn-lg btn-default dropdown-toggle" data-toggle="dropdown">
                    Extra Actions... <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    @section('actions-list')
                        <li><a><p><em>No Actions available</em></p></a></li>
                    @show
                </ul>
            </div>  
        </div>
    </div>
@show