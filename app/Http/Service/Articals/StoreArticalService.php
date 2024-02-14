<?php

namespace App\Http\Service\Articals;
use App\Models\Artical;
use App\Notifications\ArticleCreatedNotification;
use Illuminate\Support\str;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreArticalRequest;

class StoreArticalService 
{
     public function store(StoreArticalRequest $request)
     { 
        $data = $request->validated() ;
        $user = auth()->user();
        if($data) { 

          $imageName = str::random(32) . "." . $request->image->getClientOriginalExtension();
          Storage::disk('public')->put($imageName, file_get_contents($request->image));
          $data['image']   = $imageName ;
          $data['user_id'] = $user->id;
          $record          = Artical::create($data);
            // // event
          $user->notify(new ArticleCreatedNotification($record));
          return $record ;
  
      }
     }
}



