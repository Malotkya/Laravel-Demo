<?php
namespace App;

class Api {
    private const apiKey = "qcPXcznwJ7K8mhCP06w6XXeUhBsM7dnj6xxP6zMdMt4jjQ1VAKqosPOEXyQ2t1Hb";

    public static function getDistance($zipCode1, $zipCode2, $maxDistance) {
        $client = new \GuzzleHttp\Client();
        $responce = $client->request("GET", "https://www.zipcodeapi.com/rest/" . Api::apiKey
                    . "/match-close.json/" . $zipCode1 . ", " . $zipCode2 . "/" . $maxDistance . "/mile");

        if($responce->getStatusCode() !== 200)
            throw new Exception("Invalid Responce");

        return json_decode($responce->getBody(), false);
    }

    public static function getInfo($zipCode) {
        $client = new \GuzzleHttp\Client();
        $responce = $client->request("GET", "https://www.zipcodeapi.com/rest/" . Api::apiKey
                    . "/info.json/" . $zipCode . "/degrees");

        if($responce->getStatusCode() !== 200)
            throw new Exception("Invalid Responce");

        return json_decode($responce->getBody(), false);
    }
}
?>
