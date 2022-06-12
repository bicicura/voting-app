<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Idea;
use App\Models\Status;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowIdeasTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_list_of_ideas_shows_on_main_page() {

        $categoryOne = Category::factory()->create(['name' => 'Category 1']);
        $categoryTwo = Category::factory()->create(['name' => 'Category 1']);

        $statusOpen = Status::factory()->create(['name' => 'Open', 'classes' => 'bg-gray-200']);
        $statusConsidering = Status::factory()->create(['name' => 'Considering', 'classes' => 'bg-purple text-white']);

        $ideaOne = Idea::factory()->create([
            'title' => 'My First Idea',
            'category_id' => $categoryOne->id,
            'status_id' => $statusOpen->id,
            'description' => 'Description of my first idea'
        ]);

        $ideaTwo = Idea::factory()->create([
            'title' => 'My Second Idea',
            'category_id' => $categoryTwo->id,
            'status_id' => $statusConsidering->id,
            'description' => 'Description of my second idea'
        ]);

        $response = $this->get(route('idea.index'));
        
        $response->assertSuccessful();
        $response->assertSee($ideaOne->title);
        $response->assertSee($ideaOne->description);
        $response->assertSee($categoryOne->name);
        $response->assertSee('<div class="px-4 py-2 font-bold leading-none text-center uppercase bg-gray-200 rounded-full text-xxs w-28 h-7">Open</div>' , false);
        $response->assertSee($ideaTwo->title);
        $response->assertSee($ideaTwo->description);
        $response->assertSee($categoryTwo->name);
        // $response->assertSee('<div class="px-4 py-2 font-bold leading-none text-center text-white uppercase rounded-full bg-purple text-xxs w-28 h-7">Considering</div>' , false);
    }

    /** @test */
    public function test_single_idea_shows_correctly_on_the_show_page() {

        $categoryOne = Category::factory()->create(['name' => 'Category 1']);
        
        $statusOpen = Status::factory()->create(['name' => 'Open', 'classes' => 'bg-gray-200']);

        $idea = Idea::factory()->create([
            'category_id' => $categoryOne->id,
            'title' => 'My First Idea',
            'status_id' => $statusOpen->id,
            'description' => 'Description of my first idea'
        ]);

        $response = $this->get(route('idea.show', $idea));
        
        $response->assertSuccessful();
        $response->assertSee($idea->title);
        $response->assertSee($categoryOne->name);
        $response->assertSee($idea->description);
        // $response->assertSee('<div class="px-4 py-2 font-bold leading-none text-center uppercase bg-gray-200 rounded-full text-xxs w-28 h-7">Open</div>' , false);
    }
    
    /** @test */
    public function test_ideas_pagination_works() {

        $categoryOne = Category::factory()->create(['name' => 'Category 1']);

        $statusOpen = Status::factory()->create(['name' => 'Open', 'classes' => 'bg-gray-200']);

        Idea::factory(Idea::PAGINATION_COUNT + 1)->create([
            'category_id' => $categoryOne->id,
            'status_id' => $statusOpen->id,
        ]);

        $ideaOne = Idea::find(1);
        $ideaOne->title = 'My first idea';
        $ideaOne->save();

        $ideaEleven = Idea::find(11);
        $ideaEleven->title = 'My Eleventh idea';
        $ideaEleven->save();

        $response = $this->get('/');

        $response->assertSee($ideaOne->title);
        $response->assertDontSee($ideaEleven->title);

        $response = $this->get('/?page=2');

        $response->assertDontSee($ideaOne->title);
        $response->assertSee($ideaEleven->title);
    }

    /** @test */
    public function test_same_idea_title_different_slugs() {

        $categoryOne = Category::factory()->create(['name' => 'Category 1']);

        $statusOpen = Status::factory()->create(['name' => 'Open', 'classes' => 'bg-gray-200']);

        $ideaOne = Idea::factory()->create([
            'category_id' => $categoryOne->id,
            'status_id' => $statusOpen->id,
            'title' => 'My First Idea',
            'description' => 'Description of my first idea'
        ]);

        $ideaTwo = Idea::factory()->create([
            'category_id' => $categoryOne->id,
            'title' => 'My First Idea',
            'status_id' => $statusOpen->id,
            'description' => 'Description of my second idea'
        ]);

        $this->assertEquals('my-first-idea', $ideaOne->slug);
        $this->assertEquals('my-first-idea-2', $ideaTwo->slug);

    }
    
}
