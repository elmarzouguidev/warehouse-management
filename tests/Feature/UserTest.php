<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Auth\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_create_a_user()
    {
        User::factory(2)->create();

        $this->assertDatabaseCount('users', 2);
    }
}
