<?php namespace Frisk\Engine;

class Search
{
    protected $conditions;
    protected $modelName;
    protected $results = FALSE;

    public function __construct(Conditions $conditions, $model)
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
        $where = $this->conditions->toSql( $instance );

        $this->results = $instance->whereRaw($where)
            ->groupBy('id')
            ->get();
    }
}