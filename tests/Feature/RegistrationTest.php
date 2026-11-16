<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register_with_a_name_email_and_password()
    {
        $response = $this->post('/register', [
            'name' => 'Tea Fan',
            'email' => 'tea@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertRedirect('/home');
        $this->assertAuthenticated();
        $this->get('/home')->assertOk()->assertSee('You are logged in!');
        $user = User::where('email', 'tea@example.com')->firstOrFail();
        $this->assertSame('Tea Fan', $user->name);
        $this->assertTrue(Hash::check('password123', $user->password));
    }

    public function test_email_must_be_unique()
    {
        User::create([
            'name' => 'First User',
            'email' => 'tea@example.com',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->from('/register')->post('/register', [
            'name' => 'Second User',
            'email' => 'tea@example.com',
            'password' => 'password456',
            'password_confirmation' => 'password456',
        ]);

        $response->assertRedirect('/register');
        $response->assertSessionHasErrors('email');
    }

    public function test_user_can_log_in_with_email_and_password()
    {
        User::create([
            'name' => 'Tea Fan',
            'email' => 'tea@example.com',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->post('/login', [
            'email' => 'tea@example.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect('/home');
        $this->assertAuthenticated();
    }
}
