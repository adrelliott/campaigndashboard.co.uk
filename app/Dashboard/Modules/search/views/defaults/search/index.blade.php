@extends('layouts.index')

@section('page-title')
    <h1>
        <i class="fa fa-search"></i> Search
    </h1>
    <p class="lead">
        Because who wants to dig around data tables?
    </p>
@stop

@section('content')
    
    <?= Form::open(array( 'action' => 'app.search.process', 'id' => 'searchForm' )) ?>

        <div class="col-md-9">
            <p>I'd like to search for <?= Form::select('combination', [ 'all', 'any' ]) ?> of the following conditions:</p>

            <hr>

            <div id="searchConditions">
                <p class="searchCondition">
                    <?= Form::select('', $columns, '', array( 'class' => 'columnSelect' )) ?>
                    <?= Form::select('', $predicates, '', array( 'class' => 'predicateSelect' )) ?>
                    <?= Form::text('', '', array( 'placeholder' => 'value', 'class' => 'searchValue' )) ?>

                    <span class="addRemove">
                        <a href="#" class="add"><i class="fa fa-plus"></i></a>
                    </span>
                </p>
            </div>
        </div>

    <?= Form::close() ?>

    <script type="text/html" id="searchConditionTemplate">
        <p class="searchCondition">
            <?= Form::select('combination', [ 'and', 'or' ]) ?>
            <?= Form::select('', $columns, '', array( 'class' => 'columnSelect' )) ?>
            <?= Form::select('', $predicates, '', array( 'class' => 'predicateSelect' )) ?>
            <?= Form::text( '', '', array( 'placeholder' => 'value', 'class' => 'searchValue' )) ?>

            <span class="addRemove">
                <a href="#" class="add"><i class="fa fa-plus"></i></a>
                <a href="#" class="remove"><i class="fa fa-minus"></i></a>
            </span>
        </p>
    </script>

@stop

@section('end_of_page')
    <script type="text/javascript" src="<?= URL::to('/') ?>/assets/js/app/search.js"></script>
@stop