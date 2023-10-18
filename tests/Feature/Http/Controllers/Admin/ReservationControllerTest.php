<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\Reservation;
use App\Models\Table;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\ReservationController
 */
class ReservationControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $reservations = Reservation::factory()->count(3)->create();

        $response = $this->get(route('reservation.index'));

        $response->assertOk();
        $response->assertViewIs('reservation.index');
        $response->assertViewHas('reservations');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('reservation.create'));

        $response->assertOk();
        $response->assertViewIs('reservation.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\ReservationController::class,
            'store',
            \App\Http\Requests\Admin\ReservationStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $table = Table::factory()->create();
        $user = User::factory()->create();
        $arrival_date = $this->faker->dateTime();
        $status = $this->faker->randomElement(/** enum_attributes **/);

        $response = $this->post(route('reservation.store'), [
            'table_id' => $table->id,
            'user_id' => $user->id,
            'arrival_date' => $arrival_date,
            'status' => $status,
        ]);

        $reservations = Reservation::query()
            ->where('table_id', $table->id)
            ->where('user_id', $user->id)
            ->where('arrival_date', $arrival_date)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $reservations);
        $reservation = $reservations->first();

        $response->assertRedirect(route('reservation.index'));
        $response->assertSessionHas('reservation.id', $reservation->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $reservation = Reservation::factory()->create();

        $response = $this->get(route('reservation.show', $reservation));

        $response->assertOk();
        $response->assertViewIs('reservation.show');
        $response->assertViewHas('reservation');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $reservation = Reservation::factory()->create();

        $response = $this->get(route('reservation.edit', $reservation));

        $response->assertOk();
        $response->assertViewIs('reservation.edit');
        $response->assertViewHas('reservation');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\ReservationController::class,
            'update',
            \App\Http\Requests\Admin\ReservationUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $reservation = Reservation::factory()->create();
        $table = Table::factory()->create();
        $user = User::factory()->create();
        $arrival_date = $this->faker->dateTime();
        $status = $this->faker->randomElement(/** enum_attributes **/);

        $response = $this->put(route('reservation.update', $reservation), [
            'table_id' => $table->id,
            'user_id' => $user->id,
            'arrival_date' => $arrival_date,
            'status' => $status,
        ]);

        $reservation->refresh();

        $response->assertRedirect(route('reservation.index'));
        $response->assertSessionHas('reservation.id', $reservation->id);

        $this->assertEquals($table->id, $reservation->table_id);
        $this->assertEquals($user->id, $reservation->user_id);
        $this->assertEquals($arrival_date, $reservation->arrival_date);
        $this->assertEquals($status, $reservation->status);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $reservation = Reservation::factory()->create();

        $response = $this->delete(route('reservation.destroy', $reservation));

        $response->assertRedirect(route('reservation.index'));

        $this->assertModelMissing($reservation);
    }
}
