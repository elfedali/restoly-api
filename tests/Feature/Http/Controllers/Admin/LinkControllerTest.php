<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\Link;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\LinkController
 */
class LinkControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $links = Link::factory()->count(3)->create();

        $response = $this->get(route('link.index'));

        $response->assertOk();
        $response->assertViewIs('link.index');
        $response->assertViewHas('links');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('link.create'));

        $response->assertOk();
        $response->assertViewIs('link.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\LinkController::class,
            'store',
            \App\Http\Requests\Admin\LinkStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $name = $this->faker->name;
        $url = $this->faker->url;
        $is_active = $this->faker->boolean;

        $response = $this->post(route('link.store'), [
            'name' => $name,
            'url' => $url,
            'is_active' => $is_active,
        ]);

        $links = Link::query()
            ->where('name', $name)
            ->where('url', $url)
            ->where('is_active', $is_active)
            ->get();
        $this->assertCount(1, $links);
        $link = $links->first();

        $response->assertRedirect(route('link.index'));
        $response->assertSessionHas('link.id', $link->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $link = Link::factory()->create();

        $response = $this->get(route('link.show', $link));

        $response->assertOk();
        $response->assertViewIs('link.show');
        $response->assertViewHas('link');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $link = Link::factory()->create();

        $response = $this->get(route('link.edit', $link));

        $response->assertOk();
        $response->assertViewIs('link.edit');
        $response->assertViewHas('link');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\LinkController::class,
            'update',
            \App\Http\Requests\Admin\LinkUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $link = Link::factory()->create();
        $name = $this->faker->name;
        $url = $this->faker->url;
        $is_active = $this->faker->boolean;

        $response = $this->put(route('link.update', $link), [
            'name' => $name,
            'url' => $url,
            'is_active' => $is_active,
        ]);

        $link->refresh();

        $response->assertRedirect(route('link.index'));
        $response->assertSessionHas('link.id', $link->id);

        $this->assertEquals($name, $link->name);
        $this->assertEquals($url, $link->url);
        $this->assertEquals($is_active, $link->is_active);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $link = Link::factory()->create();

        $response = $this->delete(route('link.destroy', $link));

        $response->assertRedirect(route('link.index'));

        $this->assertModelMissing($link);
    }
}
