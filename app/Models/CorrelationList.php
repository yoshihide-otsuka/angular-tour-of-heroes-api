<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CorrelationList extends Model
{
    use HasFactory;

    protected $fillable = [
        'from',
        'to',
        'correlation_id',
    ];

    public static function findAll($hero_id)
    {
        $results_from = self::where('correlation_lists.from', $hero_id)
          ->where('correlations.id', '<>', 3)
          ->leftJoin('heroes', 'correlation_lists.to', '=', 'heroes.id')
          ->leftJoin('correlations', 'correlations.id', '=', 'correlation_lists.correlation_id')
          ->select('correlation_lists.from', 'correlation_lists.to', DB::raw('heroes.name as hero_name'), DB::raw('correlation_lists.correlation_id as correlation_id'), 'correlations.name', DB::raw("1 as category"));

        $results_to = self::where('correlation_lists.to', $hero_id)
          ->where('correlations.id', '<>', 3)
          ->leftJoin('heroes', 'correlation_lists.from', '=', 'heroes.id')
          ->leftJoin('correlations', 'correlations.id', '=', 'correlation_lists.correlation_id')
          ->select('correlation_lists.from', 'correlation_lists.to', DB::raw('heroes.name as hero_name'), DB::raw('correlation_lists.correlation_id as correlation_id'), 'correlations.name', DB::raw("2 as category"));

        $result = $results_from->union($results_to)
          ->orderBy('category')
          ->orderBy('correlation_id')
          ->get();
          //->toSql();
          Log::info($result);

        return $result;
    }

    public static function createCorrelation($from, $to, $correlation_id, $my_id)
    {
        try {
            self::updateOrCreate([
                'from' => $from,
                'to' => $to
            ], [
                'from' => $from,
                'to' => $to,
                'correlation_id' => $correlation_id,
            ]);

            return self::findAll($my_id);
        } catch (\Throwable $th) {
            return false;
        }
    }
}
