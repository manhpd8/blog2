<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\BrowserKitTesting\TestCase as BaseTestCase; 
class LoginAdminTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testLoginSuccess()
    {
        $response = $this->visit('/client/login');
        $response->assertResponseStatus(200)
        ->type('user1','user')
        ->type('pass1','pass')
        ->press('Sign In')
        ->seePageIs('/home/0');

    }

    public function testLoginFailPass()
    {
        $response = $this->visit('/client/login');
        $response->assertResponseStatus(200)
        ->type('user15','user')
        ->type('pass1','pass')
        ->press('Sign In')
        ->seePageIs('/client/login')
        ->see('sai tai khoan mat khau');
    }

    public function testLoginValidateUser()
    {
        $response = $this->visit('/client/login');
        $response->assertResponseStatus(200)
        ->type('','user')
        ->type('pass1','pass')
        ->press('Sign In')
        ->seePageIs('/client/login')
        ->see('tài khoản không được để trống');
    }

    public function testLoginValidatePass()
    {
        $response = $this->visit('/client/login');
        $response->assertResponseStatus(200)
        ->type('asd','user')
        ->type('','pass')
        ->press('Sign In')
        ->seePageIs('/client/login')
        ->see('mật khẩu không được để trống');
    }

    public function testLoginValidatePassUser()
    {
        $response = $this->visit('/client/login');
        $response->assertResponseStatus(200)
        ->type('','user')
        ->type('','pass')
        ->press('Sign In')
        ->seePageIs('/client/login')
        ->see('mật khẩu không được để trống')
        ->see('tài khoản không được để trống');
    }
}
