<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\Review;
use App\Models\Reviewer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\ReviewController
 */
class ReviewControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $reviews = Review::factory()->count(3)->create();

        $response = $this->get(route('review.index'));

        $response->assertOk();
        $response->assertViewIs('review.index');
        $response->assertViewHas('reviews');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('review.create'));

        $response->assertOk();
        $response->assertViewIs('review.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\ReviewController::class,
            'store',
            \App\Http\Requests\Admin\ReviewStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $reviewer = Reviewer::factory()->create();
        $rating = $this->faker->numberBetween(-10000, 10000);

        $response = $this->post(route('review.store'), [
            'reviewer_id' => $reviewer->id,
            'rating' => $rating,
        ]);

        $reviews = Review::query()
            ->where('reviewer_id', $reviewer->id)
            ->where('rating', $rating)
            ->get();
        $this->assertCount(1, $reviews);
        $review = $reviews->first();

        $response->assertRedirect(route('review.index'));
        $response->assertSessionHas('review.id', $review->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $review = Review::factory()->create();

        $response = $this->get(route('review.show', $review));

        $response->assertOk();
        $response->assertViewIs('review.show');
        $response->assertViewHas('review');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $review = Review::factory()->create();

        $response = $this->get(route('review.edit', $review));

        $response->assertOk();
        $response->assertViewIs('review.edit');
        $response->assertViewHas('review');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\ReviewController::class,
            'update',
            \App\Http\Requests\Admin\ReviewUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $review = Review::factory()->create();
        $reviewer = Reviewer::factory()->create();
        $rating = $this->faker->numberBetween(-10000, 10000);

        $response = $this->put(route('review.update', $review), [
            'reviewer_id' => $reviewer->id,
            'rating' => $rating,
        ]);

        $review->refresh();

        $response->assertRedirect(route('review.index'));
        $response->assertSessionHas('review.id', $review->id);

        $this->assertEquals($reviewer->id, $review->reviewer_id);
        $this->assertEquals($rating, $review->rating);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $review = Review::factory()->create();

        $response = $this->delete(route('review.destroy', $review));

        $response->assertRedirect(route('review.index'));

        $this->assertModelMissing($review);
    }
}
