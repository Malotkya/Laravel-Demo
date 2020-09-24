<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Zipcode;
use Illuminate\Support\Facades\Log;


class Upload extends Controller {
    public function get() {
        return view("upload");
    }

    public function post() {
        $output = "";
        if($_FILES["file"]["type"] == "application/vnd.ms-excel") {
            $file = fopen($_FILES["file"]["tmp_name"], "r");
            $map = fgetcsv($file);

            //Eloquent::unguard();
            while($obj = $this->format(fgetcsv($file), $map)) {
                try {
                    Zipcode::firstOrCreate( ["ZipCode" => $obj["ZipCode"]], $obj );
                } catch (\Exception $e) {
                    Log::alert($e->getMessage());
                }
            }
            $output .= "Success";
            fclose($file);
        }
        else {
            $output .= "File is not a .csv";
        }

        return $output;
    }

    private function format($input, $map) {
        if($input == false)
            return false;

        $output = array();
        foreach($map as $index => $key) {
            $output[$key] = $input[$index];
        }

        return $output;
    }
}
?>
