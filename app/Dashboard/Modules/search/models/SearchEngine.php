<?php namespace Dashboard\Search;

class SearchEngine
{
    public function search(array $conditions)
    {
        
    }
}

class SearchEngine_Conditions
{
    public static function fromArray( array $conditions )
    {
        $instance = new static;

        foreach ( $conditions as $table => $cons )
        {
            
        }
    }
}


// Usage:

$conditions = SearchEngine\Conditions::fromArray( Input::get('search') );

$engine = new SearchEngine;
$engine->search($conditions);