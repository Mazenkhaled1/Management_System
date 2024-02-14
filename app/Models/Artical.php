<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Artical extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'name',
        'image',
        'title', 
        'description',
        'comment',
        'user_id'
        
    ] ; 

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public static  function scopeStatus($query)  
    {
         $query->where('post_status' , 'active') ;
    }

    public static function scopeSearch($query, $word)
    {

        $query->where('name', 'like', '%' . $word . '%')
            ->orWhere('title', 'like', '%' . $word . '%')
            ->orWhere('description', 'like', '%' . $word . '%')
            ->orWhere('comment', 'like', '%' . $word . '%');
    }


    public function getImageUrlAttribute(){
        return asset(Storage::url($this->image));
    }
}