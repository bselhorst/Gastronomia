<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GeneralTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLoginPage()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function testMainPage()
    {
        $response = $this->get('/');

        $response->assertStatus(302);
    }

    public function testMainPageRedirect()
    {
        $response = $this->get('/');

        $response->assertRedirect('/login');
    }

    public function testUser(){
        $user = factory(App\Models\User::class)->find(1);

        $this->actingAs($user)
        ->visit('/patrimonio')
        ->see('Patrimonio');
    }
}
