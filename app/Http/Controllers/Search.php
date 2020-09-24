<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Zipcode;


class Search extends Controller {
    public function get() {
        $states = DB::select(DB::raw("SELECT DISTINCT StateCode FROM zipcode ORDER BY StateCode"));
        return view("search", ["states" => $states, "state" => ""]);
    }

    public function post() {
        $states = DB::select(DB::raw("SELECT DISTINCT StateCode FROM zipcode ORDER BY StateCode"));

        $query = new Zipcode();

        if($_POST['zipcode'] != "")
            $query = $query->where('ZipCode', $_POST['zipcode']);
        if($_POST['city'] != "")
            $query = $query->where('City', strtoupper($_POST['city']));
        if($_POST['state'] != "")
            $query = $query->where('StateCode', $_POST['state']);

        $results = $query->get();
        return view("search", [
            "states" => $states,
            "zipcode" => $_POST['zipcode'],
            "city" => $_POST['city'],
            "state" => $_POST['state'],
            "results" => $results
        ]);
    }
}
?>
