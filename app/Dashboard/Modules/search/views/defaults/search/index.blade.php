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
    
    <?= Former::open_horizontal(URL::route('app.search.process'), 'post', array( 'id' => 'searchForm' )) ?>

        <?/*<div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="active"><a href="#simple" data-toggle="tab">Basic Search</a></li>
                    <li><a href="#advanced" data-toggle="tab">Advanced Search</a></li>
                </ul>
            </div>
        </div>*/ ?>

        <div class="row">
            <div class="col-md-9">

                <?/*
                <div class="tab-pane active" id="simple">*/ ?>

                    @ownerInclude('search::search._simple')
                

                <?/*</div>

                <div class="tab-pane" id="advanced">
                    <p>I'd like to search for <?= Form::select('combination', [ 'and' => 'all', 'or' => 'any' ]) ?> of the following conditions:</p>

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
                    </div>*/?>


                </div>

            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Search Options</h3>
                    </div>

                    <div class="panel-body" style="text-align:center">
                        <p>
                            <button type="submit" class="btn btn-lg btn-primary">Search</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    <?= Form::close() ?>

    <?/*<script type="text/html" id="searchConditionTemplate">
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
    </script>*/ ?>

@stop

@section('end_of_page')
    <script type="text/javascript" src="<?= URL::to('/') ?>/assets/js/app/search.js"></script>
@stop