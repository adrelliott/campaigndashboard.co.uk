<?php namespace Frisk\Engine\Predicates;

abstract class Predicate
{
    protected $shortName;
    
    abstract public function toSql($column, $value);

    public function toArray($column, $value)
    {
        return array( $column . '_' . $this->shortName => $value );
    }
}