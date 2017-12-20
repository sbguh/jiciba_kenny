<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    //
    protected $fillable = ['chapter_id','name','type'];
    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function phrase()
    {

      return $this->belongsToMany(Phrase::class);

    }

}
