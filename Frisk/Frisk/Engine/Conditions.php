<?php namespace Frisk\Engine;

use Frisk\Searchable;

class Conditions implements \ArrayAccess
{
    protected $conditions;

    public static function fromArray( array $conditions )
    {
        $instance = new static;

        foreach ( $conditions as $name => $value )
        {
            $instance[] = new Conditions\Condition($name, $value);
        }
        
        return $instance;
    }

    public function toSql( Searchable $model )
    {
        return '(' . implode(') AND (', array_map(function($cond) use ($model)
        {
            if ($model->searchableColumns() == '*' || in_array($cond->getColumnName(), $model->searchableColumns()))
                return $cond->toSql();
        }, $this->conditions)) . ')';
    }

    public function toArray()
    {
        $return = array();
        $conds = array_map(function($cond)
        {
            return $cond->toArray();
        }, $this->conditions);

        foreach ($conds as $c)
            $return = array_merge($return, $c);

        return $return;
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