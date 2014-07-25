<?php namespace Frisk\Engine;

use Exception;
use Frisk\Exceptions\UnknownPredicateException, Frisk\Exceptions\NewPredicateException;

class Predicates
{
    protected static $registeredPredicates = array(
        'notcont' => 'Frisk\Engine\Predicates\NotContains',
        'cont' => 'Frisk\Engine\Predicates\Contains',
        'start' => 'Frisk\Engine\Predicates\StartsWith',
        'end' => 'Frisk\Engine\Predicates\EndsWith', );

    public static function exists($shortName)
    {
        return in_array($shortName, array_keys(static::$registeredPredicates));
    }

    public static function register($shortName, $className)
    {
        if (!class_exists($className))
            throw new NewPredicateException("Unknown class: $className");

        if (!is_a('Frisk\Predicates\Predicate', $className))
            throw new NewPredicateException("Predicates must implement Frisk\Predicate\Predicate $className");

        static::$registeredPredicates[$shortName] = $className;
    }

    public static function factory($shortName)
    {
        if ( !static::exists($shortName) )
            throw new UnknownPredicateException("Unknown predicate: $shortName");

        return new static::$registeredPredicates[$shortName];
    }
}