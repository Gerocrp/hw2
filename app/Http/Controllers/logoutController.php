<?php


use Illuminate\Routing\Controller as BaseController;

class logoutController extends BaseController
{
    public function logout(){
        Session::flush();
        if((Cookie::get('woothiery_user_id') && Cookie::get('woothiery_token'))){
            Cookie::queue(Cookie::forget('woothiery_user_id'));
            Cookie::queue(Cookie::forget('woothiery_token'));
        }
        return redirect ('login');
    }
}
