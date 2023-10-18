<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\Currency;
use App\Models\District;
use App\Models\Owner;
use App\Models\Restaurant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\RestaurantController
 */
class RestaurantControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $restaurants = Restaurant::factory()->count(3)->create();

        $response = $this->get(route('restaurant.index'));

        $response->assertOk();
        $response->assertViewIs('restaurant.index');
        $response->assertViewHas('restaurants');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('restaurant.create'));

        $response->assertOk();
        $response->assertViewIs('restaurant.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\RestaurantController::class,
            'store',
            \App\Http\Requests\Admin\RestaurantStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $owner = Owner::factory()->create();
        $district = District::factory()->create();
        $name = $this->faker->name;
        $slug = $this->faker->slug;
        $is_active = $this->faker->boolean;
        $currency = Currency::factory()->create();

        $response = $this->post(route('restaurant.store'), [
            'owner_id' => $owner->id,
            'district_id' => $district->id,
            'name' => $name,
            'slug' => $slug,
            'is_active' => $is_active,
            'currency_id' => $currency->id,
        ]);

        $restaurants = Restaurant::query()
            ->where('owner_id', $owner->id)
            ->where('district_id', $district->id)
            ->where('name', $name)
            ->where('slug', $slug)
            ->where('is_active', $is_active)
            ->where('currency_id', $currency->id)
            ->get();
        $this->assertCount(1, $restaurants);
        $restaurant = $restaurants->first();

        $response->assertRedirect(route('restaurant.index'));
        $response->assertSessionHas('restaurant.id', $restaurant->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $restaurant = Restaurant::factory()->create();

        $response = $this->get(route('restaurant.show', $restaurant));

        $response->assertOk();
        $response->assertViewIs('restaurant.show');
        $response->assertViewHas('restaurant');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $restaurant = Restaurant::factory()->create();

        $response = $this->get(route('restaurant.edit', $restaurant));

        $response->assertOk();
        $response->assertViewIs('restaurant.edit');
        $response->assertViewHas('restaurant');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\RestaurantController::class,
            'update',
            \App\Http\Requests\Admin\RestaurantUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $restaurant = Restaurant::factory()->create();
        $owner = Owner::factory()->create();
        $district = District::factory()->create();
        $name = $this->faker->name;
        $slug = $this->faker->slug;
        $is_active = $this->faker->boolean;
        $currency = Currency::factory()->create();

        $response = $this->put(route('restaurant.update', $restaurant), [
            'owner_id' => $owner->id,
            'district_id' => $district->id,
            'name' => $name,
            'slug' => $slug,
            'is_active' => $is_active,
            'currency_id' => $currency->id,
        ]);

        $restaurant->refresh();

        $response->assertRedirect(route('restaurant.index'));
        $response->assertSessionHas('restaurant.id', $restaurant->id);

        $this->assertEquals($owner->id, $restaurant->owner_id);
        $this->assertEquals($district->id, $restaurant->district_id);
        $this->assertEquals($name, $restaurant->name);
        $this->assertEquals($slug, $restaurant->slug);
        $this->assertEquals($is_active, $restaurant->is_active);
        $this->assertEquals($currency->id, $restaurant->currency_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $restaurant = Restaurant::factory()->create();

        $response = $this->delete(route('restaurant.destroy', $restaurant));

        $response->assertRedirect(route('restaurant.index'));

        $this->assertModelMissing($restaurant);
    }
}
