<?php namespace Dashboard\Transformers;


abstract class Transformer {


    /**
     * Transform a collection
     *
     * @param array $items
     * @return array
     */
    public function transformCollection(array $items)
    {
        return array_map([$this, 'transform'], $items);
    }

    public abstract function transform($item);

} 