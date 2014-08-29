<?php namespace Frisk\Engine\Conditions;

use Frisk\Engine\Predicates;
use Frisk\Engine\Predicates\Predicate;

class Condition
{
    protected $columnName;
    protected $predicate;
    protected $value;

    public function __construct($name, $value)
    {
        list($columnName, $predicate) = $this->parseName($name);

        $this->setColumnName($columnName);
        $this->setPredicate($predicate);
        $this->setValue($value);
    }

    public function toSql()
    {
        return $this->predicate->toSql($this->columnName, $this->value);
    }

    public function toArray()
    {
        return $this->predicate->toArray($this->columnName, $this->value);
    }

    protected function parseName($name)
    {
        $result = array_map('strrev', explode('_', strrev($name), 2));
        $predicate = $result[0];
        $column = $result[1];
        
        return array( $column, Predicates::factory($predicate) );
    }

    protected function getColumnName()
    {
        return $this->columnName;
    }

    protected function setColumnName($name)
    {
        $this->columnName = $name;
    }

    protected function setPredicate(Predicate $predicate)
    {
        $this->predicate = $predicate;
    }

    protected function setValue($value)
    {
        $this->value = $value;
    }
}