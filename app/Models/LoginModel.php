<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'login_id';
}
class Users extends \Eloquent{
    protected $primaryKey = 'login_id';
    protected $fillable = [];
}
