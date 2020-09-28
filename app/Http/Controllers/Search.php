<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Zipcode;


class Search extends Controller {

    private function getStates() {
        return DB::select(DB::raw("SELECT DISTINCT StateCode FROM zipcode ORDER BY StateCode"));
    }

    public function get() {
        return view("search", ["states" => $this->getStates()]);
    }

    public function post() {
        $results = [];
        $message = "";

        try {
            $query = new Zipcode();

            if($_POST['zipcode'] != "")
                $query = $query->where('ZipCode', intval($_POST['zipcode']));
            if($_POST['city'] != "")
                $query = $query->where('City', strtoupper($_POST['city']));
            if($_POST['state'] != "")
                $query = $query->where('StateCode', $_POST['state']);

            $results = $query->get();
        } catch (\Exception $e) {
            $message = $e->getMessage();
        }

        return view("search", [
            "states" => $this->getStates(),
            "zipcode" => $_POST['zipcode'],
            "city" => $_POST['city'],
            "state" => $_POST['state'],
            "results" => $query->get(),
            "message" => $message
        ]);
    }
}
?>
