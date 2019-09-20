<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RolePublicTest extends DuskTestCase
{
    /**
     * List all quizzes
     *
     * @return void
     */
    public function testLoginAs()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('LOGIN')
                    ->screenshot('RolePublic/LoggedIn');
        });
    }

    public function testQuizList()
    {
        $this->browse(function (Browser $browser) {
            $quizUrl = '/quizzes';
            $browser->visit($quizUrl)
                    ->assertPathIsNot($quizUrl)
                    ->screenshot('RolePublic/QuizList');
        });
    }

    public function testQuizCreate()
    {
        $this->browse(function (Browser $browser) {
            $quizUrl = '/quizzes/create';
            $browser->visit($quizUrl)
                    ->assertPathIsNot($quizUrl)
                    ->screenshot('RolePublic/QuizCreate');
        });
    }

    public function testQuizRead_Title()
    {
        $this->browse(function (Browser $browser) {
            $quizUrl = '/quizzes/d3d29d70-1d25-11e3-8591-034165a3a613';
            $browser->visit($quizUrl)
                    ->assertDontSee('General Knowledge')
                    ->assertPathIsNot($quizUrl)
                    ->screenshot('RolePublic/QuizRead');
        });
    }

    public function testQuizEdit()
    {
        $this->browse(function (Browser $browser) {
            $quizUrl = '/quizzes/d3d29d70-1d25-11e3-8591-034165a3a613/edit';
            $browser->visit($quizUrl)
                    ->assertPathIsNot($quizUrl)
                    ->screenshot('RoleView/QuizEdit');
        });
    }

}
