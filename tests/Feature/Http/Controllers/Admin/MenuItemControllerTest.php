<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\MenuCategory;
use App\Models\MenuItem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\MenuItemController
 */
class MenuItemControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $menuItems = MenuItem::factory()->count(3)->create();

        $response = $this->get(route('menu-item.index'));

        $response->assertOk();
        $response->assertViewIs('menuItem.index');
        $response->assertViewHas('menuItems');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('menu-item.create'));

        $response->assertOk();
        $response->assertViewIs('menuItem.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\MenuItemController::class,
            'store',
            \App\Http\Requests\Admin\MenuItemStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $menu_category = MenuCategory::factory()->create();
        $name = $this->faker->name;
        $price = $this->faker->randomFloat(/** decimal_attributes **/);

        $response = $this->post(route('menu-item.store'), [
            'menu_category_id' => $menu_category->id,
            'name' => $name,
            'price' => $price,
        ]);

        $menuItems = MenuItem::query()
            ->where('menu_category_id', $menu_category->id)
            ->where('name', $name)
            ->where('price', $price)
            ->get();
        $this->assertCount(1, $menuItems);
        $menuItem = $menuItems->first();

        $response->assertRedirect(route('menuItem.index'));
        $response->assertSessionHas('menuItem.id', $menuItem->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $menuItem = MenuItem::factory()->create();

        $response = $this->get(route('menu-item.show', $menuItem));

        $response->assertOk();
        $response->assertViewIs('menuItem.show');
        $response->assertViewHas('menuItem');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $menuItem = MenuItem::factory()->create();

        $response = $this->get(route('menu-item.edit', $menuItem));

        $response->assertOk();
        $response->assertViewIs('menuItem.edit');
        $response->assertViewHas('menuItem');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\MenuItemController::class,
            'update',
            \App\Http\Requests\Admin\MenuItemUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $menuItem = MenuItem::factory()->create();
        $menu_category = MenuCategory::factory()->create();
        $name = $this->faker->name;
        $price = $this->faker->randomFloat(/** decimal_attributes **/);

        $response = $this->put(route('menu-item.update', $menuItem), [
            'menu_category_id' => $menu_category->id,
            'name' => $name,
            'price' => $price,
        ]);

        $menuItem->refresh();

        $response->assertRedirect(route('menuItem.index'));
        $response->assertSessionHas('menuItem.id', $menuItem->id);

        $this->assertEquals($menu_category->id, $menuItem->menu_category_id);
        $this->assertEquals($name, $menuItem->name);
        $this->assertEquals($price, $menuItem->price);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $menuItem = MenuItem::factory()->create();

        $response = $this->delete(route('menu-item.destroy', $menuItem));

        $response->assertRedirect(route('menuItem.index'));

        $this->assertModelMissing($menuItem);
    }
}
