<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LogoutTest extends TestCase
{

    public function routing_invoice()
    {
        $this->get("/invoice")->assertStatus(302);
    }
}