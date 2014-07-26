<li class="productCondition">
    <?= Form::hidden('q[not_products][]', '', array( 'class' => 'searchValue' )) ?>
    <?= Form::select('', $products, '', array( 'class' => 'triggerInputDropdown productDropdown form-control' )) ?>

    <span class="productVariant"></span>

    <span class="addRemove">
        <a href="#" class="add"><i class="fa fa-plus"></i></a>
        <a href="#" class="remove"><i class="fa fa-minus"></i></a>
    </span>
</li>