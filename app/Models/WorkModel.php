<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BookingModel;
use App\Models\RegistrationModel;

class WorkModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'w_id';
    protected $fillable=['id','cust_id'];
    public function booking()
    {
        return $this->belongsTo(BookingModel::class,'id');
    }
    public function customer()
    {
        return $this->belongsTo(RegistrationModel::class,'cust_id');
    }
}
class Authors extends \Eloquent{
    protected $primaryKey = 'w_id';
    protected $fillable = [];
}