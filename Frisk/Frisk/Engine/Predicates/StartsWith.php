<?php namespace Frisk\Engine\Predicates;

class StartsWith implements Predicate
{
    public function toSql($column, $value)
    {
        return $column . ' LIKE "' . $value . '%"';
    }
}