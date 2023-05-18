<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'languages';
    protected $fillable = [
        'name','abbr','direction','active','created_at','updated_at',
    ];
    protected $hidden = ['locale','created_at','updated_at',];

    ######  Scopes
    public function scopeActive($query){
        return $query -> where('active',1);
    }

    public function  scopeSelection($query){
        return $query -> select('id','abbr','name', 'direction', 'active');
    }

    ######  Methods
    public function getActive(){
        return   $this -> active == 1 ? 'مفعل'  : 'غير مفعل';
    }

    ######  Relations
    public function categories(){
        return $this->hasMany('App\Models\MainCategory','language_id','id');
    }

}
