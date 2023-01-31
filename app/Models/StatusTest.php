<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusTest extends Model
{
    use HasFactory;
    protected $table = 'test_status';
    protected $fillable = [
        'status'
    ];
}
