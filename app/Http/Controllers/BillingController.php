<?php
/**
 * Created by PhpStorm.
 * User: vuquo
 * Date: 11/18/2017
 * Time: 11:36 AM
 */

namespace App\Http\Controllers;


class BillingController extends Controller
{
    function index(){
        return view('billing.index');
    }


}