<div class="tab-content"><!-- Tab Content -->   

    @foreach($tabs as $tab)
        <div class="tab-pane" id="{{ camel_case($tab) }}" data-toggle="tab">
            <div class="row">
                @include('defaults.partials._message')
                @section(camel_case($tab))
                @show
            </div>
        </div>
    @endforeach

    <div class="margin_top_30">
        <a class="text-danger del" href="#" ><i class="fa fa-trash-o"></i> Delete this record...</a>
    </div>

</div><!-- /Tab Content -->