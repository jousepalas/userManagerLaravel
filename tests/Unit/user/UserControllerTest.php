<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\UserController;
use Tests\TestCase;

/**
 * Class UserControllerTest.
 *
 * @covers \App\Http\Controllers\UserController
 */
final class UserControllerTest extends TestCase
{
    private UserController $userController;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->userController = new UserController();
        $this->app->instance(UserController::class, $this->userController);
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->userController);
    }

    public function testCreate(): void
    {
        /** @todo This test is incomplete. */
        $this->get('/register')
            ->assertStatus(200);
    }

    public function testNew(): void
    {
        $data = [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => bcrypt('secret'),
        ];
        $this->get('/register/new', $data)
            ->assertStatus(200);
    }

    
    public function testLogin(): void
    {
        /** @todo This test is incomplete. */
        $this->get('/login')
        ->assertStatus(200);
    }
    
    public function testAuthenticate(): void
    {
        /** @todo This test is incomplete. */
        $this->get('/admin/authenticate')
        ->assertStatus(200);
    }

    public function testLogout(): void
    {
        /** @todo This test is incomplete. */
        $this->get('/logout')
            ->assertStatus(200);
    }
}
