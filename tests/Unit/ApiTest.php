<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Api;

class ApiTest extends TestCase
{

    public function testDistance()
    {
        $res = Api::getDistance(53711, 53703, 10);

        $this->assertSame($res[0]->distance, 4.959);
    }

    public function testInfo()
    {
        $res = Api::getInfo(53711);

        $this->assertSame($res->city, "Madison");
    }
}
