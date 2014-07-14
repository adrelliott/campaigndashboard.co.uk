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
    
    <?= Form::open(array( 'url' => URL::route('app.search.process') )) ?>

        <div class="col-md-9">
            <p>I'd like to search for <?= Form::select('combination', [ 'all', 'any' ]) ?> of the following conditions:</p>

            <hr>

            <p>
                <?= Form::select('', $columns, '', array( 'class' => 'columnSelect' )) ?>
                <?= Form::select('', $predicates, '', array( 'class' => 'predicateSelect' )) ?>
                <?= Form::input('', '', array( 'placeholder' => 'value', 'class' => 'searchValue' )) ?>
            </p>
        </div>

    <?= Form::close() ?>

    <script type="text/html">
        <p>
            <?= Form::select('combination', [ 'and', 'or' ]) ?>
            <?= Form::select('', $columns, '', array( 'class' => 'columnSelect' )) ?>
            <?= Form::select('', $predicates, '', array( 'class' => 'predicateSelect' )) ?>
            <?= Form::input('', '', array( 'placeholder' => 'value', 'class' => 'searchValue' )) ?>
        </p>
    </script>

@stop