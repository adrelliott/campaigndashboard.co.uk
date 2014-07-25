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

    public function results($get = TRUE)
    {
        if (!$this->results)
            $this->search(array( 'get' => $get ));

        return $this->results;
    }

    public function search(array $options)
    {
        $instance = new $this->modelName;
        $where = $this->conditions->toSql( $instance, $options );

        $this->results = $instance->whereRaw($where)
            ->groupBy('id');

        if ( isset($options['get']) && $options['get'] ) $this->results = $this->results->get();

        return $this;
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