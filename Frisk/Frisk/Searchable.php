<?php namespace Frisk;

interface Searchable
{
    public static function search(array $conditions);

    public function searchableColumns();
}