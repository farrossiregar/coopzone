<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockPhoto extends Model
{
    use HasFactory;
    protected $table = 'stockphoto';
    protected $primaryKey = 'id';
}
