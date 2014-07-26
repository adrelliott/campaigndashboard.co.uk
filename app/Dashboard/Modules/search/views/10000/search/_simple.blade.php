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

        <ul class="productConditions">
            <li>
                <?= Form::hidden('', '', array( 'class' => 'searchInput' )) ?>
                <?= Form::select('', $products, '', array( 'class' => 'triggerInputDropdown productDropdown' )) ?>

                <span class="productVariant"></span>

                <span class="addRemove">
                    <a href="#" class="add"><i class="fa fa-plus"></i></a>
                </span>
            </li>
        </ul>
    </div>

    <div class="col-md-6">
        <h5>Hasn't Purchased:</h5>
    </div>
</div>