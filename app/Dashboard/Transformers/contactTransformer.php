<?php namespace Dashboard\Transformers;


class contactTransformer extends Transformer {


    public function transform($item)
    {
        return [
            'fname' => $item['first_name'],
            'lname' => $item['last_name'],
            'id' => $item['id'],
            'optinEmail' => (boolean)$item['optin_email']
        ];
    }
}