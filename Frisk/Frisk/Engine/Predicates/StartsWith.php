<?php namespace Frisk\Engine\Predicates;

class StartsWith extends Predicate
{
    protected $shortName = 'start';

    public function toSql($column, $value)
    {
        return $column . ' LIKE "' . $value . '%"';
    }
}