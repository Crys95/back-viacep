<?php

namespace Tests\Feature;

use Tests\TestCase;

class RouteTest extends TestCase
{

    public function test_ViaCep()
    {
        $response = $this->getJson('api/cep/via-cep?cep=06412-030');

        $response->assertStatus(200);
    }

}
