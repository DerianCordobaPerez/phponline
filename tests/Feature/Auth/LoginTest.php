<?php

declare(strict_types=1);

use App\Http\Controllers\Web\Auth\Login\SubmitController;
use App\Http\Controllers\Web\Auth\Login\ViewController;
use App\Models\User;
use Treblle\Tools\Http\Enums\Status;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

test('it responds with the correct status code')
    ->expect(fn () => get(action(ViewController::class)))
    ->assertStatus(status: Status::OK->value);

test('it loads the correct view')
    ->expect(fn () => get(action(ViewController::class)))
    ->assertViewIs('auth.login');

test('it will redirect if authenticated')
    ->expect(fn () => actingAs(createUser())->get(action(ViewController::class)))
    ->assertRedirect();

test('it returns errors if validation fails')
    ->expect(fn () => post(action(SubmitController::class)))
    ->assertRedirect()
    ->assertSessionHasErrors();

test('it can authenticate a user')
    ->with('emails')
    ->expect(function (string $email) {
        User::factory()->create(['email' => $email]);

        return post(
            uri: action(SubmitController::class),
            data: [
                'email' => $email,
                'password' => 'password'
            ],
        );
    })->assertRedirect()->assertSessionHasNoErrors();
