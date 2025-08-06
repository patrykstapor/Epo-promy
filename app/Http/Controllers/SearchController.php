<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'from'       => 'required|string|max:100',
            'to'         => 'required|string|max:100|different:from',
            'date'       => 'required|date|after_or_equal:today',
            'passengers' => 'required|integer|min:1|max:9',
            'vehicle'    => 'nullable|in:none,car,bike,van',
        ]);

        if ($validator->fails()) {
            return redirect()->route('home')
                ->withErrors($validator)
                ->withInput();
        }

        // Tu normalnie zapytanie do bazy/extern. API operatorów promowych
        // Poniżej przykładowe dane „wyników”
        $results = [
            [
                'from' => $request->from,
                'to' => $request->to,
                'date' => $request->date,
                'depart' => '08:00',
                'arrive' => '15:00',
                'operator' => 'BalticFerry',
                'price' => 275.00,
            ],
            [
                'from' => $request->from,
                'to' => $request->to,
                'date' => $request->date,
                'depart' => '20:00',
                'arrive' => '03:00 +1',
                'operator' => 'NordicSea',
                'price' => 299.00,
            ],
        ];

        // Na potrzeby przykładu zwróćmy prosty widok blade inline:
        return view('results', [
            'results' => $results,
            'query' => $request->only(['from', 'to', 'date', 'passengers', 'vehicle']),
        ]);
    }
}
