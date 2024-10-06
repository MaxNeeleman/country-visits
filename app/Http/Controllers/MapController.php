<?php

namespace App\Http\Controllers;

use App\Models\VisitedCountry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class MapController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $visitedCountries = Auth::user()->visitedCountries()->pluck('country_code')->toArray();
        return view('map', compact('visitedCountries'));
    }

    public function toggleCountry(Request $request)
    {
        $countryCode = $request->input('country_code');
        $user = Auth::user();

        $visited = $user->visitedCountries()->where('country_code', $countryCode)->first();

        if ($visited) {
            $visited->delete();
            return response()->json(['status' => 'removed']);
        } else {
            $user->visitedCountries()->create(['country_code' => $countryCode]);
            return response()->json(['status' => 'added']);
        }
    }
}