<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CorrelationList;

class CorrelationListController extends Controller
{
    public function index($here_id)
    {
        $records = CorrelationList::findAll($here_id);

        return response()->json($records, 200, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
    }

    public function create(Request $request)
    {
        $result = CorrelationList::createCorrelation($request->from, $request->to, $request->correlation_id, $request->my_id);

        return response()->json($result, 200, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
    }
}
