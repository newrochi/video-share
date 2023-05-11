<?php

namespace App\Models;

use App\Models\Traits\Likeable;
use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory,Likeable;

    protected $perPage=18;

    public function getRouteKeyName()
    {
        return "slug";
    }

    protected $fillable=['name','url','thumbnail','slug','length','description','category_id'];

    public function getLengthHumanReadableAttribute(){
        return gmdate("i:s",$this->length);
    }
    public function getCreatedAtAttribute($value){
        return (new Verta($value))->formatDifference();
    }



    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function relatedVideos(int $count=6){
        return $this->category->getRandomVideos($count);
    }

    public function getCategoryNameAttribute(){
        if($this->category){
            return $this->category->name;
        }
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function getOwnerNameAttribute(){
        return $this->user?$this->user->name:"";
    }
    public function getOwnerAvatarAttribute(){
        return $this->user?$this->user->avatar:"";
    }

    public function comments(){
        return $this->hasMany(Comment::class)->orderBy('created_at','desc');
    }


}
