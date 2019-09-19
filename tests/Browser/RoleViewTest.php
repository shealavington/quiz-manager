<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RoleViewTest extends DuskTestCase
{
    /**
     * List all quizzes
     *
     * @return void
     */
    public function testLoginAs()
    {
        $user = \App\User::where('role_id', 2)->first();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                    ->visit('/')
                    ->assertSee($user->name)
                    ->screenshot('RoleView/LoggedIn');
        });
    }

    public function testQuizList()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/quizzes')
                    ->assertSee('General Knowledge')
                    ->screenshot('RoleView/QuizList');
        });
    }

    public function testQuizList_ActionControls()
    {
        $this->browse(function (Browser $browser) {
            $browser->assertDontSee('Create A Quiz');
        });
    }

    public function testQuizCreate()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/quizzes/create')
                    ->assertPathIs('/quizzes')
                    ->screenshot('RoleView/QuizCreate');
        });
    }

    public function testQuizRead_Title()
    {
        $this->browse(function (Browser $browser) {
            $browser->clickLink('View Quiz')
                    ->assertSee('General Knowledge')
                    ->screenshot('RoleView/QuizRead');
        });
    }

    public function testQuizRead_ActionControls()
    {
        $this->browse(function (Browser $browser) {
            $browser->assertDontSee('Delete Quiz')
                    ->assertDontSee('Edit Quiz')
                    ->screenshot('RoleView/QuizRead');
        });
    }

    public function testQuizRead_Questions()
    {
        $this->browse(function (Browser $browser) {
            $browser->assertSee('Which company re-branded Santa Claus?')
                    ->assertSee('What\'s the biggest search engine?')
                    ->assertSee('What\'s the legal drinking age in the UK?');
        });
    }

    public function testQuizRead_Answers()
    {
        $this->browse(function (Browser $browser) {
            $browser->assertSee('Coca Cola')
                    ->assertSee('Bing')
                    ->assertSee('21');
        });
    }

    public function testQuizEdit()
    {
        $this->browse(function (Browser $browser) {
            $quizUrl = '/quizzes/d3d29d70-1d25-11e3-8591-034165a3a613';
            $browser->visit($quizUrl . '/edit')
                    ->assertPathIs($quizUrl)
                    ->screenshot('RoleView/QuizEdit');
        });
    }

}
