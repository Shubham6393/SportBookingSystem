<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Equipment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the home page with facilities and equipment.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facilities = Facility::where('is_available', true)->get();
        $equipment = Equipment::where('is_available', true)->get();
        
        return view('home', compact('facilities', 'equipment'));
    }
}
