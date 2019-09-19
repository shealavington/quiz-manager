<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class IndexTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testIndexPageLoads()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Quiz Manager');
        });
    }
}
