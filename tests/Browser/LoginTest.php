<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    /**
     * Ensure that users can login
     *
     * @return void
     */
    public function testCanLogin()
    {
        $user = \App\User::find(1);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('email', 'shea@example.com')
                    ->type('password', 'shea123')
                    ->press('Login')
                    ->assertPathIs('/quizzes')
                    ->assertSee($user->name);
        });
    }
}
