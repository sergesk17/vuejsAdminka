<?php
/**
 * Created by PhpStorm.
 * User: Serge
 * Date: 25.01.2019
 * Time: 18:59
 */

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index(){

        return view('home.index');
    }
}
