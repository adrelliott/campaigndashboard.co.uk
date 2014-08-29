<?php namespace Dashboard\Search;

use BaseController, View, Input, Request, Response, DB;
use Dashboard\Crm\SearchableContact;
use Dashboard\Sales\Product;
use Dashboard\Sales\OrderProduct;
use Dashboard\Tags\Tag;
use Dashboard\Services\DatatableService;
use Dashboard\Repositories\EloquentSearchableContactRepository;

class SearchController extends BaseController
{
    public function __construct(EloquentSearchableContactRepository $repo)
    {
        parent::__construct();
        
        $this->repo = $repo;
    }

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
        View::share('newDatatables', TRUE);

        $q = Input::get('q');

        if (Request::wantsJson())
        {
            $service = new DatatableService(Input::getFacadeApplication()['request'], $this->repo);
            list( $search, $total ) = SearchableContact::search($q, $service->fetchOptions());

            return $this->render('search/_row_json')
                ->withTotal($total)
                ->withDraw(Input::get('draw'))
                ->withResults($search);
        }
        else
        {
            return $this->renderView()
                ->withQuery($q);
        }
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