<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nette\Utils\Image;

class Pokemons extends Model
{
    use HasFactory;
    protected $table = 'pokemons';
    protected $primaryKey = 'id';
    protected $fillable =['Image', 'Name', 'DexNumber', 'Type1', 'Type2', 'Gen', 'DexEntry', 'category_id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}


