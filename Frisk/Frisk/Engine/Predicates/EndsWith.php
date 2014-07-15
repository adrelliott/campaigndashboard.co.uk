<?php namespace Frisk\Engine\Predicates;

class EndsWith implements Predicate
{
    public function toSql($column, $value)
    {
        return $column . ' LIKE "' . $value . '%"';
    }
}