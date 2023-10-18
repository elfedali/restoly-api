<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\Menu;
use App\Models\Restaurant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\MenuController
 */
class MenuControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $menus = Menu::factory()->count(3)->create();

        $response = $this->get(route('menu.index'));

        $response->assertOk();
        $response->assertViewIs('menu.index');
        $response->assertViewHas('menus');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('menu.create'));

        $response->assertOk();
        $response->assertViewIs('menu.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\MenuController::class,
            'store',
            \App\Http\Requests\Admin\MenuStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $restaurant = Restaurant::factory()->create();
        $name = $this->faker->name;

        $response = $this->post(route('menu.store'), [
            'restaurant_id' => $restaurant->id,
            'name' => $name,
        ]);

        $menus = Menu::query()
            ->where('restaurant_id', $restaurant->id)
            ->where('name', $name)
            ->get();
        $this->assertCount(1, $menus);
        $menu = $menus->first();

        $response->assertRedirect(route('menu.index'));
        $response->assertSessionHas('menu.id', $menu->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $menu = Menu::factory()->create();

        $response = $this->get(route('menu.show', $menu));

        $response->assertOk();
        $response->assertViewIs('menu.show');
        $response->assertViewHas('menu');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $menu = Menu::factory()->create();

        $response = $this->get(route('menu.edit', $menu));

        $response->assertOk();
        $response->assertViewIs('menu.edit');
        $response->assertViewHas('menu');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\MenuController::class,
            'update',
            \App\Http\Requests\Admin\MenuUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $menu = Menu::factory()->create();
        $restaurant = Restaurant::factory()->create();
        $name = $this->faker->name;

        $response = $this->put(route('menu.update', $menu), [
            'restaurant_id' => $restaurant->id,
            'name' => $name,
        ]);

        $menu->refresh();

        $response->assertRedirect(route('menu.index'));
        $response->assertSessionHas('menu.id', $menu->id);

        $this->assertEquals($restaurant->id, $menu->restaurant_id);
        $this->assertEquals($name, $menu->name);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $menu = Menu::factory()->create();

        $response = $this->delete(route('menu.destroy', $menu));

        $response->assertRedirect(route('menu.index'));

        $this->assertModelMissing($menu);
    }
}
