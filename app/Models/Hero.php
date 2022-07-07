<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public static function findAll()
    {
        $results = self::all();

        return $results;
    }

    public static function findByName($name)
    {
        $results = self::where('name', 'LIKE', '%'.$name.'%')
                         ->get();

        return $results;
    }

    public static function findById($id)
    {
        $results = self::find($id);

        return $results;
    }

    public static function createHero($name)
    {
        $results = self::create(['name' => $name]);

        return $results;
    }

    public static function updateHero($id, $name)
    {
        $results = self::where('id', $id)
                         ->update(['name' => $name]);

        return $results;
    }

    public static function deleteHero($id)
    {
        $results = self::where('id', $id)
                         ->delete();

        return $results;
    }
}
