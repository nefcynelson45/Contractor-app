<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BookingModel;

class ConstructionModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'cons_id';
    protected $fillable=['cons_id','cons_type'];
    public function booking()
    {
        return $this->hasMany(BookingModel::class,'cons_id');
    }
}
class Author extends \Eloquent{
    protected $primaryKey = 'cons_id';
    protected $fillable = [];
}

