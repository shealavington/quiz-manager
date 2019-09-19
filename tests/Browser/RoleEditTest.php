<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RoleEditTest extends DuskTestCase
{
    /**
     * List all quizzes
     *
     * @return void
     */
    public function testLoginAs()
    {
        $user = \App\User::where('role_id', 1)->first();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                    ->visit('/')
                    ->assertSee($user->name)
                    ->screenshot('RoleEdit/LoggedIn');
        });
    }

    public function testQuizList()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/quizzes')
                    ->assertSee('General Knowledge')
                    ->screenshot('RoleEdit/QuizList');
        });
    }

    public function testQuizList_ActionControls()
    {
        $this->browse(function (Browser $browser) {
            $browser->assertSee('Create A Quiz');
        });
    }

    public function testQuizCreate()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/quizzes/create')
                    ->assertPathIs('/quizzes/create')
                    ->screenshot('RoleEdit/QuizCreate');
        });
    }

    // Need to create tests for showing that the create form works

    public function testQuizRead_Title()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/quizzes')
                    ->clickLink('View Quiz')
                    ->assertSee('General Knowledge')
                    ->screenshot('RoleEdit/QuizRead');
        });
    }

    public function testQuizRead_ActionControls()
    {
        $this->browse(function (Browser $browser) {
            $browser->assertSee('Delete Quiz')
                    ->assertSee('Edit Quiz')
                    ->screenshot('RoleEdit/QuizRead');
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
            $quizUrl = '/quizzes/d3d29d70-1d25-11e3-8591-034165a3a613/edit';
            $browser->visit($quizUrl)
                    ->assertPathIs($quizUrl)
                    ->screenshot('RoleEdit/QuizEdit');
        });
    }

    public function testQuizEdit_UpdateDescription()
    {
        $this->browse(function (Browser $browser) {
            $data = 'generated_' . uniqid();
            $browser->type('description',$data)
                    ->click('[name="save"]')
                    ->waitForText('General Knowledge')
                    ->assertPathIs('/quizzes/d3d29d70-1d25-11e3-8591-034165a3a613')
                    ->assertSee($data)
                    ->screenshot('RoleEdit/QuizEdit_UpdateDescription');
        });
    }

}
