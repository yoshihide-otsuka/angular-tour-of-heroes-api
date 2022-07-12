<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Correlation extends Model
{
    use HasFactory;

    public static function findAll()
    {
        $results = self::all();

        return $results;
    }
}
