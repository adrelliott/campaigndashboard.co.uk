<?php namespace Frisk\Engine\Predicates;

class Contains extends Predicate
{
    protected $shortName = 'cont';

    public function toSql($column, $value)
    {
        return $column . ' LIKE "%' . $value . '%"';
    }
}