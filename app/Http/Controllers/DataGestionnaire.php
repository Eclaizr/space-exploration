<?php

namespace App\Http\Controllers;

use App\Models\VueMissionsAstronaute;
use App\Models\VueAstronauteAgence;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DataGestionnaire extends Controller
{
    public function index()
    {
        return view('affichageGestionnaire'); // Charge la vue
    }

}