<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'mat_id';
}
class Authors extends \Eloquent{
    protected $primaryKey = 'mat_id';
    protected $fillable = [];
}