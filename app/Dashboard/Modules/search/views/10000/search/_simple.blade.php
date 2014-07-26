<h4>Customer</h4>

<?= Former::text('q[name]', 'Name') ?>
<?= Former::text('q[email]', 'Email') ?>
<?= Former::text('q[phone]', 'Phone') ?>
<?= Former::text('q[address]', 'Address') ?>

<hr>

<h4>Products</h4>

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

<script type="text/html" id="productConditionHtml">@include('search::defaults.search._product')</script>
<script type="text/html" id="notProductConditionHtml">@include('search::defaults.search._not_product')</script>