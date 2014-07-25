<?php namespace Frisk\Engine;

/**
 * Frisk\Search is the public API for the Frisk search system. The Frisk\Model trait
 * will, when called, return an instance of this class.
 */
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

    /**
     * Spit out the search conditions as JSON, to facilitate the storing of
     * search parameters in a database
     */
    public function toJson()
    {
        return json_encode($this->toArray());
    }

    public function toArray()
    {
        return $this->conditions->toArray();
    }
}