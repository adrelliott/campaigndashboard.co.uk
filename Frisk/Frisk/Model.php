<?php namespace Frisk;

trait Model
{
    public static function search(array $conditions)
    {
        return new Engine\Search(Engine\Conditions::fromArray($conditions), get_called_class());
    }
}