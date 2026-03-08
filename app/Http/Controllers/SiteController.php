<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){
        $name = "Julia";
        $habits = ["Ler", "Academia", "Correr", "Estudar"];
        return view("home", ["name" => $name, "habits" => $habits]);
    } 
}
