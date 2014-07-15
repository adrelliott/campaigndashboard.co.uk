<?php namespace Dashboard\Search;

use DB;

trait Searchable
{
    public static function search(array $conditions)
    {
        return new SearchEngine_Search(SearchEngine_Conditions::fromArray($conditions), get_called_class());
    }
}

class SearchEngine_Search
{
    protected $conditions;
    protected $modelName;
    protected $results = FALSE;

    public function __construct(SearchEngine_Conditions $conditions, $model)
    {
        $this->conditions = $conditions;
        $this->modelName = $model;
    }

    public function results()
    {
        if (!$this->results)
            $this->search();

        return $this->results;
    }

    public function search()
    {
        $instance = new $this->modelName;
        $where = $this->conditions->toSql();

        $this->results = $instance->whereRaw($where)
            ->groupBy('id')
            ->get();
    }
}

class SearchEngine_Conditions implements \ArrayAccess
{
    protected $conditions;

    public static function fromArray( array $conditions )
    {
        $instance = new static;

        foreach ( $conditions as $name => $value )
        {
            $instance[] = new SearchEngine_Condition($name, $value);
        }

        return $instance;
    }

    public function toSql()
    {
        return '(' . implode(') AND (', array_map(function($cond)
        {
            return $cond->toSql();
        }, $this->conditions)) . ')';
    }

    public function offsetGet($k) { return $this->conditions[$k]; }
    public function offsetSet($k, $v)
    {
        if (is_null($k))
            $this->conditions[] = $v;
        else
            $this->conditions[$k] = $v;
    }
    public function offsetExists($k) { return isset($this->conditions[$k]); }
    public function offsetUnset($k) { unset($this->conditions[$k]); }
}

class SearchEngine_Condition
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

    protected function parseName($name)
    {
        $result = array_map('strrev', explode('_', strrev($name), 2));
        $predicate = $result[0];
        $column = $result[1];

        return array( $column, SearchEngine_Predicates::factory($predicate) );
    }

    protected function setColumnName($name)
    {
        $this->columnName = $name;
    }

    protected function setPredicate(SearchEngine_Predicate $predicate)
    {
        $this->predicate = $predicate;
    }

    protected function setValue($value)
    {
        $this->value = $value;
    }
}

/**
 * Factory for predicate classes
 */
class SearchEngine_Predicates
{
    protected static $registeredPredicates = array(
        'cont' => 'Dashboard\Search\SearchEngine_Predicate_Contains',
        'start' => 'Dashboard\Search\SearchEngine_Predicate_StartsWith',
        'end' => 'Dashboard\Search\SearchEngine_Predicate_EndsWith', );

    public static function exists($shortName)
    {
        return in_array($shortName, array_keys(static::$registeredPredicates));
    }

    public static function register($shortName, $className)
    {
        if (!class_exists($className))
            throw new Exception("Unknown class: $className");

        if (!is_a('SearchEngine_Predicate', $className))
            throw new Exception("Predicates must implement SearchEngine_Predicate $className");

        static::$registeredPredicates[$shortName] = $className;
    }

    public static function factory($shortName)
    {
        if ( !SearchEngine_Predicates::exists($shortName) )
            throw new SearchEngine_UnknownPredicateException;

        return new static::$registeredPredicates[$shortName];
    }
}

interface SearchEngine_Predicate
{
    public function toSql($column, $value);
}

class SearchEngine_Predicate_Contains implements SearchEngine_Predicate
{
    public function toSql($column, $value)
    {
        return $column . ' LIKE "%' . $value . '%"';
    }
}

class SearchEngine_Predicate_StartsWith implements SearchEngine_Predicate
{
    public function toSql($column, $value)
    {
        return $column . ' LIKE "' . $value . '%"';
    }
}

class SearchEngine_Predicate_EndsWith implements SearchEngine_Predicate
{
    public function toSql($column, $value)
    {
        return $column . ' LIKE "' . $value . '%"';
    }
}

class SearchEngine_UnknownPredicateException extends \Exception { }