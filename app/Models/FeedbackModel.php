<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RegistrationModel;

class FeedbackModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'f_id';
    protected $fillable=['cust_id'];
    public function customer()
    {
        return $this->belongsTo(RegistrationModel::class,'cust_id');
    }
}
class Auth extends \Eloquent{
    protected $primaryKey = 'f_id';
    protected $fillable = [];
}


