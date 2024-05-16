<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Invoice extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_routing_biaya_operasional(): void
    {
        $response = $this->get('/biaya-operasional');

        $response->assertStatus(302);
    }
}
