<?php


use Illuminate\Routing\Controller as BaseController;

class essenceController extends BaseController
{
    public function essence($toFind){

        if($toFind === '{}'){
            $essences = Essence::select('essence')->get();
        }else {
            $essences = DB::select("SELECT essence FROM essences WHERE json_extract(essence, '$.name') LIKE '%".trim($toFind,'{}')."%'");
        }
        
        return json_encode($essences);
    }
}
