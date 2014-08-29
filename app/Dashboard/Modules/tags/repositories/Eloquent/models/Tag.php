<?php namespace Dashboard\Tags;

use BaseModel, DB;

class Tag extends BaseModel {
    
    protected static $relationships = array(
        'contacts' => array( 'belongsToMany', "\Dashboard\Crm\Contact" ),
    );

    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at', 'owner_id'];
    public $presenter = 'Dashboard\Tags\TagPresenter';

    public static function forJson()
    {
        $tags = DB::table('tags')
            ->select(DB::raw('tag_title AS label, id AS value'));
        with(new static)->scopeOnlyOwners($tags);
        $tags = $tags->get();

        return $tags;
    }
}