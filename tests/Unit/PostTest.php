<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testViewPost(){
    	$response = $this->visit('news/newsid/22');
        $response->assertResponseStatus(200)
        ->see('Problems look mighty small from 117');
    }

    public function testComment(){
    	$response = $this->visit('news/newsid/22');
        $response->assertResponseStatus(200)
        ->see('Problems look mighty small from 117')
        ->press('btn-login');
    }
}
