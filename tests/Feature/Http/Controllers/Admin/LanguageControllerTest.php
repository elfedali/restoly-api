<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\Language;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\LanguageController
 */
class LanguageControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $languages = Language::factory()->count(3)->create();

        $response = $this->get(route('language.index'));

        $response->assertOk();
        $response->assertViewIs('language.index');
        $response->assertViewHas('languages');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('language.create'));

        $response->assertOk();
        $response->assertViewIs('language.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\LanguageController::class,
            'store',
            \App\Http\Requests\Admin\LanguageStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $name = $this->faker->name;
        $slug = $this->faker->slug;
        $is_active = $this->faker->boolean;

        $response = $this->post(route('language.store'), [
            'name' => $name,
            'slug' => $slug,
            'is_active' => $is_active,
        ]);

        $languages = Language::query()
            ->where('name', $name)
            ->where('slug', $slug)
            ->where('is_active', $is_active)
            ->get();
        $this->assertCount(1, $languages);
        $language = $languages->first();

        $response->assertRedirect(route('language.index'));
        $response->assertSessionHas('language.id', $language->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $language = Language::factory()->create();

        $response = $this->get(route('language.show', $language));

        $response->assertOk();
        $response->assertViewIs('language.show');
        $response->assertViewHas('language');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $language = Language::factory()->create();

        $response = $this->get(route('language.edit', $language));

        $response->assertOk();
        $response->assertViewIs('language.edit');
        $response->assertViewHas('language');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\LanguageController::class,
            'update',
            \App\Http\Requests\Admin\LanguageUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $language = Language::factory()->create();
        $name = $this->faker->name;
        $slug = $this->faker->slug;
        $is_active = $this->faker->boolean;

        $response = $this->put(route('language.update', $language), [
            'name' => $name,
            'slug' => $slug,
            'is_active' => $is_active,
        ]);

        $language->refresh();

        $response->assertRedirect(route('language.index'));
        $response->assertSessionHas('language.id', $language->id);

        $this->assertEquals($name, $language->name);
        $this->assertEquals($slug, $language->slug);
        $this->assertEquals($is_active, $language->is_active);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $language = Language::factory()->create();

        $response = $this->delete(route('language.destroy', $language));

        $response->assertRedirect(route('language.index'));

        $this->assertModelMissing($language);
    }
}
