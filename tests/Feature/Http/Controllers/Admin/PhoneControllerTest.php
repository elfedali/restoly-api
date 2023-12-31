<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\Phone;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\PhoneController
 */
class PhoneControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $phones = Phone::factory()->count(3)->create();

        $response = $this->get(route('phone.index'));

        $response->assertOk();
        $response->assertViewIs('phone.index');
        $response->assertViewHas('phones');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('phone.create'));

        $response->assertOk();
        $response->assertViewIs('phone.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\PhoneController::class,
            'store',
            \App\Http\Requests\Admin\PhoneStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $phone = $this->faker->phoneNumber;

        $response = $this->post(route('phone.store'), [
            'phone' => $phone,
        ]);

        $phones = Phone::query()
            ->where('phone', $phone)
            ->get();
        $this->assertCount(1, $phones);
        $phone = $phones->first();

        $response->assertRedirect(route('phone.index'));
        $response->assertSessionHas('phone.id', $phone->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $phone = Phone::factory()->create();

        $response = $this->get(route('phone.show', $phone));

        $response->assertOk();
        $response->assertViewIs('phone.show');
        $response->assertViewHas('phone');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $phone = Phone::factory()->create();

        $response = $this->get(route('phone.edit', $phone));

        $response->assertOk();
        $response->assertViewIs('phone.edit');
        $response->assertViewHas('phone');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\PhoneController::class,
            'update',
            \App\Http\Requests\Admin\PhoneUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $phone = Phone::factory()->create();
        $phone = $this->faker->phoneNumber;

        $response = $this->put(route('phone.update', $phone), [
            'phone' => $phone,
        ]);

        $phone->refresh();

        $response->assertRedirect(route('phone.index'));
        $response->assertSessionHas('phone.id', $phone->id);

        $this->assertEquals($phone, $phone->phone);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $phone = Phone::factory()->create();

        $response = $this->delete(route('phone.destroy', $phone));

        $response->assertRedirect(route('phone.index'));

        $this->assertModelMissing($phone);
    }
}
