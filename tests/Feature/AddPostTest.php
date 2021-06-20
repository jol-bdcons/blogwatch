<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Features;
use Laravel\Jetstream\Jetstream;
use Tests\TestCase;

class AddPostTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_add_post()
    {
        $this->actingAs($user = User::factory()->create());

        $response = $this->post('/add-post', [
            'title' => 'Test Post',
            'description' => 'dummy description',
        ]);

        $response->assertRedirect(RouteServiceProvider::HOME);
    }
}
