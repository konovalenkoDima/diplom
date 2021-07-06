<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function onePage($type)
    {
        return view('formProject.one-page', ['parameter' => $type]);
    }

    public function polyPage($type)
    {
        return view('formProject.poly-page', ['parameter' => $type]);
    }
}
