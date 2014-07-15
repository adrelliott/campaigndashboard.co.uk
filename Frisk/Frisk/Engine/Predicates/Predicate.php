<?php namespace Frisk\Engine\Predicates;

interface Predicate
{
    public function toSql($column, $value);
}