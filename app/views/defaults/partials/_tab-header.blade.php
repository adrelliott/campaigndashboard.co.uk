
<ul class="nav nav-pills visible-lg visible-md hidden-sm hidden-xs"><!-- Standard Pill Navigation -->
    @foreach($tabs as $tab)
        <li>
            <a href="#{{ camel_case($tab) }}" data-toggle="tab">{{ $tab }}</a>
        </li>
    @endforeach
</ul><!-- /Standard Pill Navigation -->

<ul class="nav nav-pills nav-stacked hidden-lg hidden-md visible-sm visible-xs"><!-- nav for Phones and small tablets -->
    <li class="dropdown active ">
        <a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown"><h4><i class="fa fa-toggle"></i> Click for more... <b class="caret"></b></h4></a>
        <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
            @foreach($tabs as $tab)
                <li>
                    <a href="#{{ camel_case($tab) }}" data-toggle="tab">{{ $tab }}</a>
                </li>
            @endforeach
        </ul>
    </li>
</ul><!-- /nav for Phones and small tablets -->