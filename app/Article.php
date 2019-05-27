<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $casts = [
        'imageUrl' => 'array'
    ];

  //  protected $guarded=[];
    protected $fillable = ['id','user_id','title','slug','description','body','images','tags'];

  //  use Sluggable;


//       public function user(){
//        return $this->belongsTo(User::class);
//    }

    public function user(){
        return $this->belongsTo(User::class);

    }

//    public function sluggable()
//    {
//        return [
//            'slug' => [
//                'source' => 'title'
//            ]
//        ];
//    }

}
