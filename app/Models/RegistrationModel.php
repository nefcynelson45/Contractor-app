<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BookingModel;
use App\Models\WorkModel;
use App\Models\FeedbackModel;

class RegistrationModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'cust_id';
    protected $fillable=['cust_id','cust_name','email'];
    public function work()
    {
        return $this->hasOne(WorkModel::class,'cust_id');
    }
    public function booking()
    {
        return $this->hasMany(BookingModel::class,'cust_id');
    }
    public function feedback()
    {
        return $this->hasMany(FeedbackModel::class,'cust_id');
    }
}
class Authorss extends \Eloquent{
    protected $primaryKey = 'cust_id';
    protected $fillable = [];
}