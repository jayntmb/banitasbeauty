<?php

namespace App\Http\Controllers;

use App\Models\Partenaire;
use Illuminate\Http\Request;

class PartenaireController extends Controller
{

    public function indexAll()
    {
        $partenaires = Partenaire::all();
        return view('admin.pages.partenaires',compact('partenaires'));
    }
}