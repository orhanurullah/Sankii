<?php


namespace Sankii\App\Controllers;


use Illuminate\Routing\Controller;

class EntityController extends Controller
{

    public function index(){
        return view('sankii::index');
    }
}
