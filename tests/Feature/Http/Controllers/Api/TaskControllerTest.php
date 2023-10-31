<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Api\TaskController
 */
class TaskControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected(): void
    {
        $tasks = Task::factory()->count(3)->create();

        $response = $this->get(route('task.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Api\TaskController::class,
            'store',
            \App\Http\Requests\Api\TaskStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves(): void
    {
        $name = $this->faker->name;
        $is_done = $this->faker->boolean;

        $response = $this->post(route('task.store'), [
            'name' => $name,
            'is_done' => $is_done,
        ]);

        $tasks = Task::query()
            ->where('name', $name)
            ->where('is_done', $is_done)
            ->get();
        $this->assertCount(1, $tasks);
        $task = $tasks->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected(): void
    {
        $task = Task::factory()->create();

        $response = $this->get(route('task.show', $task));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Api\TaskController::class,
            'update',
            \App\Http\Requests\Api\TaskUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected(): void
    {
        $task = Task::factory()->create();
        $name = $this->faker->name;
        $is_done = $this->faker->boolean;

        $response = $this->put(route('task.update', $task), [
            'name' => $name,
            'is_done' => $is_done,
        ]);

        $task->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($name, $task->name);
        $this->assertEquals($is_done, $task->is_done);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with(): void
    {
        $task = Task::factory()->create();

        $response = $this->delete(route('task.destroy', $task));

        $response->assertNoContent();

        $this->assertModelMissing($task);
    }
}
