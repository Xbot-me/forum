<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateThreadsTest extends TestCase
{
    use DatabaseMigrations;
    /** @test */
    public function guest_cant_create_thread()
    {
        $this->withExceptionHandling();
        $this->get('/threads/create')
        ->assertRedirect('/login');

        $this->post('/threads')
        ->assertRedirect('/login');

    
        
    }
    
    /** @test */
    public function a_sign_in_user_can_make_threads()
    {
        $this->signIn();
        $thread = make('App\Thread');
       
       $response = $this->post('/threads',$thread->toArray());
        //dd($response->headers->get('Location'));
        $this->get($response->headers->get('Location'))
           ->assertSee($thread->title)
            ->assertSee($thread->body);
    }
    /** @test */
    public function a_thread_requires_a_title()
    {   
        $this->pusblishThread(['title'=>null])
                ->assertSessionHasErrors('title');

       
     }
    /** @test */
    public function a_thread_requires_a_body()
    {   
        $this->pusblishThread(['body'=>null])
                ->assertSessionHasErrors('body');

       
     }
    /** @test */
    public function a_thread_requires_a_channal_id()
    {   
        
        factory('App\Channel',2)->create();
        $this->pusblishThread(['channel_id'=>212])
                ->assertSessionHasErrors('channel_id');

       
     }
     public function pusblishThread($overrides = [])
     {
        $this->withExceptionHandling()->signIn();
        $thread = make('App\Thread',$overrides);
        //dd($thread);
       return $this->post('/threads',$thread->toArray());
        
     }
}
