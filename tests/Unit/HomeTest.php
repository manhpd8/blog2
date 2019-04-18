<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function testGetHomePage()
    {
        $response = $this->visit('/');
        $response->assertResponseStatus(200)
        ->see('Đăng ký')
        ->see('Đăng nhập')
        ->see('Trang chủ')
        ->see('Post')
        ->see('Post mới nhất')
        ->see('Hỗ trợ trực tuyến')
        ->see('Post xem nhiều nhất');

    }

    public function testGetCart(){
    	$response = $this->visit('/cart');
        $response->assertResponseStatus(200)
        ->see('Shopping cart');
    }

    public function testAddToCart(){
    	$response = $this->visit('news/newsid/22');
        $response->assertResponseStatus(200)
        ->see('add to cart')
        ->click('add to cart')
        ->seePageIs('/cart');
    }

    

}
