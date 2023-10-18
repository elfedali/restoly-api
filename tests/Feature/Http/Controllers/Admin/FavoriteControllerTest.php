<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\Favorite;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\FavoriteController
 */
class FavoriteControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $favorites = Favorite::factory()->count(3)->create();

        $response = $this->get(route('favorite.index'));

        $response->assertOk();
        $response->assertViewIs('favorite.index');
        $response->assertViewHas('favorites');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('favorite.create'));

        $response->assertOk();
        $response->assertViewIs('favorite.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\FavoriteController::class,
            'store',
            \App\Http\Requests\Admin\FavoriteStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $user = User::factory()->create();

        $response = $this->post(route('favorite.store'), [
            'user_id' => $user->id,
        ]);

        $favorites = Favorite::query()
            ->where('user_id', $user->id)
            ->get();
        $this->assertCount(1, $favorites);
        $favorite = $favorites->first();

        $response->assertRedirect(route('favorite.index'));
        $response->assertSessionHas('favorite.id', $favorite->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $favorite = Favorite::factory()->create();

        $response = $this->get(route('favorite.show', $favorite));

        $response->assertOk();
        $response->assertViewIs('favorite.show');
        $response->assertViewHas('favorite');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $favorite = Favorite::factory()->create();

        $response = $this->get(route('favorite.edit', $favorite));

        $response->assertOk();
        $response->assertViewIs('favorite.edit');
        $response->assertViewHas('favorite');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\FavoriteController::class,
            'update',
            \App\Http\Requests\Admin\FavoriteUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $favorite = Favorite::factory()->create();
        $user = User::factory()->create();

        $response = $this->put(route('favorite.update', $favorite), [
            'user_id' => $user->id,
        ]);

        $favorite->refresh();

        $response->assertRedirect(route('favorite.index'));
        $response->assertSessionHas('favorite.id', $favorite->id);

        $this->assertEquals($user->id, $favorite->user_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $favorite = Favorite::factory()->create();

        $response = $this->delete(route('favorite.destroy', $favorite));

        $response->assertRedirect(route('favorite.index'));

        $this->assertModelMissing($favorite);
    }
}
