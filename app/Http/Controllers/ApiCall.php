<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Api;


class ApiCall extends Controller {


    public function get() {
        return view("api");
    }

    public function post() {
        $result = (object)[ "distance" => -1 ];
        try {
            $zipcode1 = intval($_POST['zipcode1'], 10);
            $zipcode2 = intval($_POST["zipcode2"], 10);
            $distance = intval($_POST['distance'], 10);

            if($zipcode1 == 0)
                throw new \Exception("The first Zipcode is invalid!");

            if($zipcode2 == 0)
                throw new \Exception("The second Zipcode is invalid!");

            if($distance == 0)
                throw new \Exception("The distance is invalid!");

            $responce = Api::getDistance($zipcode1, $zipcode2, $distance);

            if(sizeof($responce) > 0) {
                $result = (object)[
                    "distance" => $responce[0]->distance,
                    "zipcode1" => Api::getInfo($responce[0]->zip_code1),
                    "zipcode2" => Api::getInfo($responce[0]->zip_code2)
                ];
            }
        } catch (\Exception $e) {
            $result = (object)[
                "distance" => -1,
                "message" => $e->getMessage()
            ];
        }

        return view("api", [
            "zipcode1" => $_POST['zipcode1'],
            "zipcode2" => $_POST['zipcode2'],
            "distance" => $_POST['distance'],
            "result" => $result
        ]);
    }
}
?>
