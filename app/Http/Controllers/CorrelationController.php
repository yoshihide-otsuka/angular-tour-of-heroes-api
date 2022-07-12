<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Correlation;

class CorrelationController extends Controller
{
    public function index(Request $request)
    {
        $records = Correlation::findAll();

        return response()->json($records, 200, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
    }
}
