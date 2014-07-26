<?php namespace Dashboard\Search;

use BaseController, View, Input, Request, Response;
use Dashboard\Crm\SearchableContact;
use Dashboard\Sales\Product;
use Dashboard\Sales\OrderProduct;

class SearchController extends BaseController
{
    public function index()
    {
        // $columns = [ 'full_name' => 'Full name', 'email' => 'Email', 'phone' => 'Phone Number', 'tag_name' => 'Tags', 'tag_with_variants' => 'Tag Variants', 'product_id' => 'Product IDs' ];
        // $predicates = [ 'cont' => 'contains', 'notcont' => 'doesn\'t contain', 'start' => 'starts with', 'end' => 'ends with' ];

        $products = [ '' => '' ] + Product::onlyOwners()
            ->lists('product_title', 'id');
        
        return $this->renderView()
            ->withProducts($products);
    }

    public function search()
    {
        $search = SearchableContact::search(Input::except([ '_token', 'combination' ]))
            ->search(Input::only([ 'combination' ]))
            ->results( FALSE )
            ->select('id', 'first_name', 'last_name')
            ->get()
            ->toArray();

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