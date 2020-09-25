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
        


    }
}
?>
