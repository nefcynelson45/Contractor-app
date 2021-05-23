<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RegistrationModel;
use App\Models\ConstructionModel;
use App\Models\WorkModel;
use Kyslik\ColumnSortable\Sortable;

class BookingModel extends Model
{
    use HasFactory;
    use Sortable;
    protected $fillable=['id','cust_id','cons_id'];
    public $sortable = ['id','b_name','email'];
    public function booking()
    {
        return $this->hasOne(WorkModel::class,'id');
    }
    public function customer()
    {
        return $this->belongsTo(RegistrationModel::class,'cust_id');
    }
    public function construction()
    {
        return $this->belongsTo(ConstructionModel::class,'cons_id');
    }
}
