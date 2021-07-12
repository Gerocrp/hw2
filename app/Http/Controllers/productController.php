<?php


use Illuminate\Routing\Controller as BaseController;

class productController extends BaseController
{
    public function product($toFind){

        if($toFind === '{}'){
            $products = Product::select('product')->get()->toArray();
        }else {
            $products = DB::select("SELECT product FROM products WHERE json_extract(product, '$.name') LIKE '%".trim($toFind,'{}')."%'");
        }
        
        return json_encode($products);
    }
}
