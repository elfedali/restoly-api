<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\City;
use App\Models\District;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\DistrictController
 */
class DistrictControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $districts = District::factory()->count(3)->create();

        $response = $this->get(route('district.index'));

        $response->assertOk();
        $response->assertViewIs('district.index');
        $response->assertViewHas('districts');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('district.create'));

        $response->assertOk();
        $response->assertViewIs('district.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\DistrictController::class,
            'store',
            \App\Http\Requests\Admin\DistrictStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $city = City::factory()->create();
        $name = $this->faker->name;
        $slug = $this->faker->slug;
        $is_active = $this->faker->boolean;

        $response = $this->post(route('district.store'), [
            'city_id' => $city->id,
            'name' => $name,
            'slug' => $slug,
            'is_active' => $is_active,
        ]);

        $districts = District::query()
            ->where('city_id', $city->id)
            ->where('name', $name)
            ->where('slug', $slug)
            ->where('is_active', $is_active)
            ->get();
        $this->assertCount(1, $districts);
        $district = $districts->first();

        $response->assertRedirect(route('district.index'));
        $response->assertSessionHas('district.id', $district->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $district = District::factory()->create();

        $response = $this->get(route('district.show', $district));

        $response->assertOk();
        $response->assertViewIs('district.show');
        $response->assertViewHas('district');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $district = District::factory()->create();

        $response = $this->get(route('district.edit', $district));

        $response->assertOk();
        $response->assertViewIs('district.edit');
        $response->assertViewHas('district');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\DistrictController::class,
            'update',
            \App\Http\Requests\Admin\DistrictUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $district = District::factory()->create();
        $city = City::factory()->create();
        $name = $this->faker->name;
        $slug = $this->faker->slug;
        $is_active = $this->faker->boolean;

        $response = $this->put(route('district.update', $district), [
            'city_id' => $city->id,
            'name' => $name,
            'slug' => $slug,
            'is_active' => $is_active,
        ]);

        $district->refresh();

        $response->assertRedirect(route('district.index'));
        $response->assertSessionHas('district.id', $district->id);

        $this->assertEquals($city->id, $district->city_id);
        $this->assertEquals($name, $district->name);
        $this->assertEquals($slug, $district->slug);
        $this->assertEquals($is_active, $district->is_active);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $district = District::factory()->create();

        $response = $this->delete(route('district.destroy', $district));

        $response->assertRedirect(route('district.index'));

        $this->assertModelMissing($district);
    }
}
