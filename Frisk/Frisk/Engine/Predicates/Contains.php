<?php namespace Frisk\Engine\Predicates;

class Contains implements Predicate
{
    public function toSql($column, $value)
    {
        return $column . ' LIKE "%' . $value . '%"';
    }
}