<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\Restaurant;
use App\Models\Salle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\SalleController
 */
class SalleControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $salles = Salle::factory()->count(3)->create();

        $response = $this->get(route('salle.index'));

        $response->assertOk();
        $response->assertViewIs('salle.index');
        $response->assertViewHas('salles');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('salle.create'));

        $response->assertOk();
        $response->assertViewIs('salle.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\SalleController::class,
            'store',
            \App\Http\Requests\Admin\SalleStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $restaurant = Restaurant::factory()->create();
        $name = $this->faker->name;
        $description = $this->faker->text;

        $response = $this->post(route('salle.store'), [
            'restaurant_id' => $restaurant->id,
            'name' => $name,
            'description' => $description,
        ]);

        $salles = Salle::query()
            ->where('restaurant_id', $restaurant->id)
            ->where('name', $name)
            ->where('description', $description)
            ->get();
        $this->assertCount(1, $salles);
        $salle = $salles->first();

        $response->assertRedirect(route('salle.index'));
        $response->assertSessionHas('salle.id', $salle->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $salle = Salle::factory()->create();

        $response = $this->get(route('salle.show', $salle));

        $response->assertOk();
        $response->assertViewIs('salle.show');
        $response->assertViewHas('salle');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $salle = Salle::factory()->create();

        $response = $this->get(route('salle.edit', $salle));

        $response->assertOk();
        $response->assertViewIs('salle.edit');
        $response->assertViewHas('salle');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\SalleController::class,
            'update',
            \App\Http\Requests\Admin\SalleUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $salle = Salle::factory()->create();
        $restaurant = Restaurant::factory()->create();
        $name = $this->faker->name;
        $description = $this->faker->text;

        $response = $this->put(route('salle.update', $salle), [
            'restaurant_id' => $restaurant->id,
            'name' => $name,
            'description' => $description,
        ]);

        $salle->refresh();

        $response->assertRedirect(route('salle.index'));
        $response->assertSessionHas('salle.id', $salle->id);

        $this->assertEquals($restaurant->id, $salle->restaurant_id);
        $this->assertEquals($name, $salle->name);
        $this->assertEquals($description, $salle->description);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $salle = Salle::factory()->create();

        $response = $this->delete(route('salle.destroy', $salle));

        $response->assertRedirect(route('salle.index'));

        $this->assertModelMissing($salle);
    }
}
