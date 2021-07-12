<?php


use Illuminate\Routing\Controller as BaseController;

class homeController extends BaseController
{
    public function home(){
        return view('homePage');
    }
}
