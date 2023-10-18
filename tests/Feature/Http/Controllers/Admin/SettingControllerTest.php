<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\SettingController
 */
class SettingControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $settings = Setting::factory()->count(3)->create();

        $response = $this->get(route('setting.index'));

        $response->assertOk();
        $response->assertViewIs('setting.index');
        $response->assertViewHas('settings');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('setting.create'));

        $response->assertOk();
        $response->assertViewIs('setting.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\SettingController::class,
            'store',
            \App\Http\Requests\Admin\SettingStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $name = $this->faker->name;

        $response = $this->post(route('setting.store'), [
            'name' => $name,
        ]);

        $settings = Setting::query()
            ->where('name', $name)
            ->get();
        $this->assertCount(1, $settings);
        $setting = $settings->first();

        $response->assertRedirect(route('setting.index'));
        $response->assertSessionHas('setting.id', $setting->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $setting = Setting::factory()->create();

        $response = $this->get(route('setting.show', $setting));

        $response->assertOk();
        $response->assertViewIs('setting.show');
        $response->assertViewHas('setting');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $setting = Setting::factory()->create();

        $response = $this->get(route('setting.edit', $setting));

        $response->assertOk();
        $response->assertViewIs('setting.edit');
        $response->assertViewHas('setting');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\SettingController::class,
            'update',
            \App\Http\Requests\Admin\SettingUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $setting = Setting::factory()->create();
        $name = $this->faker->name;

        $response = $this->put(route('setting.update', $setting), [
            'name' => $name,
        ]);

        $setting->refresh();

        $response->assertRedirect(route('setting.index'));
        $response->assertSessionHas('setting.id', $setting->id);

        $this->assertEquals($name, $setting->name);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $setting = Setting::factory()->create();

        $response = $this->delete(route('setting.destroy', $setting));

        $response->assertRedirect(route('setting.index'));

        $this->assertModelMissing($setting);
    }
}
