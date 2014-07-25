<?php namespace Frisk\Engine\Predicates;

class NotContains extends Predicate
{
    protected $shortName = 'notcont';

    public function toSql($column, $value)
    {
        return $column . ' NOT LIKE "%' . $value . '%"';
    }
}