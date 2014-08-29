<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseContact">Customer</a></h4>
        </div>

        <div id="collapseContact" class="panel-collapse collapse in">
            <div class="panel-body">
                <?= Former::text('q[name]', 'Name') ?>
                <?= Former::text('q[company]', 'Company') ?>
                <?= Former::text('q[email]', 'Email') ?>
                <?= Former::text('q[phone]', 'Phone') ?>
                <?= Former::text('q[address]', 'Address') ?>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseProducts">Products</a></h4>
        </div>

        <div id="collapseProducts" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Has Purchased:</h5>

                        <ul class="productConditions" data-template="#productConditionHtml" data-variant-url="{{ URL::route('app.search.product_variants', '-ID-') }}">
                            @include('search::defaults.search._product')
                        </ul>
                    </div>

                    <div class="col-md-6">
                        <h5>Hasn't Purchased:</h5>

                        <ul class="productConditions" data-template="#notProductConditionHtml" data-variant-url="{{ URL::route('app.search.product_variants', '-ID-') }}">
                            @include('search::defaults.search._not_product')
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseTags">Tags</a></h4>
        </div>
        
        <div id="collapseTags" class="panel-collapse collapse">
            <div class="panel-body">
                <?= Former::text('q[tags]', 'Is Tagged')->setAttributes(array( 'class' => "form-control taggingInput" )) ?>
                <?= Former::text('q[not_tags]', "Isn't Tagged")->setAttributes(array( 'class' => "form-control taggingInput" )) ?>
            </div>
        </div>
    </div>
</div>

<script type="text/html" id="productConditionHtml">@include('search::defaults.search._product')</script>
<script type="text/html" id="notProductConditionHtml">@include('search::defaults.search._not_product')</script>