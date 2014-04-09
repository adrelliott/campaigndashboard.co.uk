<?php namespace Dashboard\Repositories;

use Dashboard\Crm\Contact as Model;

class EloquentContactRepository extends EloquentRepository implements ContactRepositoryInterface {

    public function __construct(Model $model)
    {
        // $this->model = $model;
        parent::__construct($model);
    }

    protected function addCustomColumns( $tableName )
    {
        // $tableName is often the relatedModel name
        switch ( $tableName )
        {
            // When we are getting a able of order items, add col of product name
            case 'orderProducts':
                $this->datatable->addColumn('Product name', function($model)
                    {
                        $retval = $model->product->product_title . ' (at £';
                        $retval .= round($model->price / 100, 2) . ')';
                        return $retval;
                    }
                );
                $this->datatable->addColumn('Qty', function($model)
                    {
                        return (string)$model->quantity;
                    }
                );
                // $this->datatable->addColumn('Line Price', function($model)
                //     {
                //         return round($model->product->product_price / 12, 2);
                //     }
                // );
                $this->datatable->addColumn('Total', function($model)
                    {
                        $total = $model->quantity * $model->price;
                        return '£' . round($total / 100, 2);
                    }
                );
                break;
            
            default:
                # code...
                break;
        }

        //is overwritten in each repo
        
    }


    


}