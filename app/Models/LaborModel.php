<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaborModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'l_id';
}
class Auth extends \Eloquent{
    protected $primaryKey = 'l_id';
    protected $fillable = [];
}
