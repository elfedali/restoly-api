<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\Menu;
use App\Models\MenuCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\MenuCategoryController
 */
class MenuCategoryControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $menuCategories = MenuCategory::factory()->count(3)->create();

        $response = $this->get(route('menu-category.index'));

        $response->assertOk();
        $response->assertViewIs('menuCategory.index');
        $response->assertViewHas('menuCategories');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('menu-category.create'));

        $response->assertOk();
        $response->assertViewIs('menuCategory.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\MenuCategoryController::class,
            'store',
            \App\Http\Requests\Admin\MenuCategoryStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $menu = Menu::factory()->create();
        $name = $this->faker->name;

        $response = $this->post(route('menu-category.store'), [
            'menu_id' => $menu->id,
            'name' => $name,
        ]);

        $menuCategories = MenuCategory::query()
            ->where('menu_id', $menu->id)
            ->where('name', $name)
            ->get();
        $this->assertCount(1, $menuCategories);
        $menuCategory = $menuCategories->first();

        $response->assertRedirect(route('menuCategory.index'));
        $response->assertSessionHas('menuCategory.id', $menuCategory->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $menuCategory = MenuCategory::factory()->create();

        $response = $this->get(route('menu-category.show', $menuCategory));

        $response->assertOk();
        $response->assertViewIs('menuCategory.show');
        $response->assertViewHas('menuCategory');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $menuCategory = MenuCategory::factory()->create();

        $response = $this->get(route('menu-category.edit', $menuCategory));

        $response->assertOk();
        $response->assertViewIs('menuCategory.edit');
        $response->assertViewHas('menuCategory');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\MenuCategoryController::class,
            'update',
            \App\Http\Requests\Admin\MenuCategoryUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $menuCategory = MenuCategory::factory()->create();
        $menu = Menu::factory()->create();
        $name = $this->faker->name;

        $response = $this->put(route('menu-category.update', $menuCategory), [
            'menu_id' => $menu->id,
            'name' => $name,
        ]);

        $menuCategory->refresh();

        $response->assertRedirect(route('menuCategory.index'));
        $response->assertSessionHas('menuCategory.id', $menuCategory->id);

        $this->assertEquals($menu->id, $menuCategory->menu_id);
        $this->assertEquals($name, $menuCategory->name);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $menuCategory = MenuCategory::factory()->create();

        $response = $this->delete(route('menu-category.destroy', $menuCategory));

        $response->assertRedirect(route('menuCategory.index'));

        $this->assertModelMissing($menuCategory);
    }
}
