<div class="tab-content"><!-- Tab Content --> 
    
    @foreach($tabs as $tab)
        <!-- Start {{ camel_case($tab) }} Tab section -->
        <div class="tab-pane " id="{{ camel_case($tab) }}" >
                @section(camel_case($tab))
                
                @show
        </div>
        <!-- End {{ camel_case($tab) }} Tab section -->
    @endforeach

</div><!-- /Tab Content -->
