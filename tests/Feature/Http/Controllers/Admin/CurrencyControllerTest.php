<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\Currency;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\CurrencyController
 */
class CurrencyControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $currencies = Currency::factory()->count(3)->create();

        $response = $this->get(route('currency.index'));

        $response->assertOk();
        $response->assertViewIs('currency.index');
        $response->assertViewHas('currencies');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('currency.create'));

        $response->assertOk();
        $response->assertViewIs('currency.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\CurrencyController::class,
            'store',
            \App\Http\Requests\Admin\CurrencyStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $currency = $this->faker->word;

        $response = $this->post(route('currency.store'), [
            'currency' => $currency,
        ]);

        $currencies = Currency::query()
            ->where('currency', $currency)
            ->get();
        $this->assertCount(1, $currencies);
        $currency = $currencies->first();

        $response->assertRedirect(route('currency.index'));
        $response->assertSessionHas('currency.id', $currency->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $currency = Currency::factory()->create();

        $response = $this->get(route('currency.show', $currency));

        $response->assertOk();
        $response->assertViewIs('currency.show');
        $response->assertViewHas('currency');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $currency = Currency::factory()->create();

        $response = $this->get(route('currency.edit', $currency));

        $response->assertOk();
        $response->assertViewIs('currency.edit');
        $response->assertViewHas('currency');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\CurrencyController::class,
            'update',
            \App\Http\Requests\Admin\CurrencyUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $currency = Currency::factory()->create();
        $currency = $this->faker->word;

        $response = $this->put(route('currency.update', $currency), [
            'currency' => $currency,
        ]);

        $currency->refresh();

        $response->assertRedirect(route('currency.index'));
        $response->assertSessionHas('currency.id', $currency->id);

        $this->assertEquals($currency, $currency->currency);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $currency = Currency::factory()->create();

        $response = $this->delete(route('currency.destroy', $currency));

        $response->assertRedirect(route('currency.index'));

        $this->assertModelMissing($currency);
    }
}
