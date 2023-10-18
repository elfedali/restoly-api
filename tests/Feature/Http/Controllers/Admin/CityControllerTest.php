<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\City;
use App\Models\Country;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\CityController
 */
class CityControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $cities = City::factory()->count(3)->create();

        $response = $this->get(route('city.index'));

        $response->assertOk();
        $response->assertViewIs('city.index');
        $response->assertViewHas('cities');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('city.create'));

        $response->assertOk();
        $response->assertViewIs('city.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\CityController::class,
            'store',
            \App\Http\Requests\Admin\CityStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $country = Country::factory()->create();
        $name = $this->faker->name;
        $slug = $this->faker->slug;
        $is_active = $this->faker->boolean;

        $response = $this->post(route('city.store'), [
            'country_id' => $country->id,
            'name' => $name,
            'slug' => $slug,
            'is_active' => $is_active,
        ]);

        $cities = City::query()
            ->where('country_id', $country->id)
            ->where('name', $name)
            ->where('slug', $slug)
            ->where('is_active', $is_active)
            ->get();
        $this->assertCount(1, $cities);
        $city = $cities->first();

        $response->assertRedirect(route('city.index'));
        $response->assertSessionHas('city.id', $city->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $city = City::factory()->create();

        $response = $this->get(route('city.show', $city));

        $response->assertOk();
        $response->assertViewIs('city.show');
        $response->assertViewHas('city');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $city = City::factory()->create();

        $response = $this->get(route('city.edit', $city));

        $response->assertOk();
        $response->assertViewIs('city.edit');
        $response->assertViewHas('city');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\CityController::class,
            'update',
            \App\Http\Requests\Admin\CityUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $city = City::factory()->create();
        $country = Country::factory()->create();
        $name = $this->faker->name;
        $slug = $this->faker->slug;
        $is_active = $this->faker->boolean;

        $response = $this->put(route('city.update', $city), [
            'country_id' => $country->id,
            'name' => $name,
            'slug' => $slug,
            'is_active' => $is_active,
        ]);

        $city->refresh();

        $response->assertRedirect(route('city.index'));
        $response->assertSessionHas('city.id', $city->id);

        $this->assertEquals($country->id, $city->country_id);
        $this->assertEquals($name, $city->name);
        $this->assertEquals($slug, $city->slug);
        $this->assertEquals($is_active, $city->is_active);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $city = City::factory()->create();

        $response = $this->delete(route('city.destroy', $city));

        $response->assertRedirect(route('city.index'));

        $this->assertModelMissing($city);
    }
}
