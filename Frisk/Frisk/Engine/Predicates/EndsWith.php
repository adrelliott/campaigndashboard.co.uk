<?php namespace Frisk\Engine\Predicates;

class EndsWith extends Predicate
{
    protected $shortName = 'end';

    public function toSql($column, $value)
    {
        return $column . ' LIKE "' . $value . '%"';
    }
}