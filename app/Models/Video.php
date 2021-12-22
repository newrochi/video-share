<?php

namespace App\Models;

use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable=['name','url','thumbnail','slug','length','description'];

    public function getLengthAttribute($value){
        return gmdate("i:s",$value);
    }
    public function getCreatedAtAttribute($value){
        return (new Verta($value))->formatDifference();
    }
}
