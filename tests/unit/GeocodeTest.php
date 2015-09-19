<?php


class GeocodeTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function test()
    {
        $geo = new vitalik74\geocode\Geocode();
        $response = $geo->get('Moscow, Kremlin', ['kind' => 'house']);
        $this->assertArrayHasKey("response", $response, 'Not valid data');

        $response = $geo->get('Челябинск, Ленина, 89', ['kind' => 'house']);
        $this->assertArrayHasKey("response", $response, 'Not valid data');
    }
}