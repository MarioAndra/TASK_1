<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_product',
        'price',
        'category_id',
        'user_id',

    ];

    public function toArray()
    {
        $array = parent::toArray();
        $array['created_at'] = $this->getCreatedFromAttribute();

        return $array;
    }
    public function category()
    {
        return $this->BelongsTo(Category::class,'category_id');
    }

    public function user(){

        return $this->BelongsTo(User::class,'user_id');
    }

    public function getCreatedFromAttribute()
    {
        return Carbon::parse($this->created_at)->diffForHumans(null,true);
    }

}
