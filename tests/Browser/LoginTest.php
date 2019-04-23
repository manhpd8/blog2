<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Đăng ký')
                ->assertSee('Đăng nhập')
                ->see('Trang chủ')
                ->see('Post')
                ->see('Post mới nhất')
                ->see('Hỗ trợ trực tuyến')
                ->see('Post xem nhiều nhất');
        });
    }
}
