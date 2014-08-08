<?php namespace Dashboard\Search;

use BaseController, View, Input, Request, Response, DB;
use Dashboard\Crm\SearchableContact;
use Dashboard\Sales\Product;
use Dashboard\Sales\OrderProduct;
use Dashboard\Tags\Tag;

class SearchController extends BaseController
{
    public function index()
    {
        $products = [ '' => '' ] + Product::onlyOwners()
            ->lists('product_title', 'id');
        $tags = Tag::forJson();
        
        return $this->renderView()
            ->withProducts($products)
            ->withTags($tags);
    }

    public function search()
    {
        $search = SearchableContact::search(Input::get('q'));

        return $this->renderView()
            ->withResults($search);
    }

    public function variants($productId)
    {
        $variants = OrderProduct::listsVariant($productId);
        
        if (Request::wantsJson() && $variants)
            return Response::json([ '' => '' ] + $variants);
        elseif ($variants)
            return View::make('search::defaults.search._variants', [ 'variants' => [ '' => '' ] + $variants ]);
        else
            return '';
    }
}