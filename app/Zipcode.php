<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Zipcode extends Model {
    protected $table = 'zipcode';
    protected $primaryKey = "ZipCode";
    public $incrementing = false;
    public $timestamps = false;
    protected $guarded = array();

}
?>
