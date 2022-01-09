<?php

namespace App\Models;

use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return "slug";
    }

    protected $fillable=['name','url','thumbnail','slug','length','description'];

    public function getLengthHumanReadableAttribute(){
        return gmdate("i:s",$this->length);
    }
    public function getCreatedAtAttribute($value){
        return (new Verta($value))->formatDifference();
    }

    public function relatedVideos(int $count=6){
        return Video::all()->random($count);
    }
}
