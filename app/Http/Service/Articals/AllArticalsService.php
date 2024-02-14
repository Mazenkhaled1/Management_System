<?php

namespace App\Http\Service\Articals;

use App\Models\Artical;
use Illuminate\Http\Request;

class AllArticalsService 
{ 
    public function index() 
     {
        return  Artical::Status()->get() ; 
     }


}

?>