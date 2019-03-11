<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ParticipateForumTest extends TestCase
{
   use DatabaseMigrations;


   /** @test */
   public function a_signed_in_user_may_participate_in_thread()
   {

    $this->signIn();    
    $thread = create('App\Thread');

    $reply = create('App\Reply');

    $this->post('/threads/some-channel/'.$thread->id.'/replies', $reply->toArray());

    $this->get($thread->path())
        ->assertSee($reply->body);
   }

   /** @test */
   public function a_reply_requires_a_body()
   {
      $this->withExceptionHandling()->signIn();
      $thread = create('App\Thread');

      $reply = make('App\Reply',['body'=>null]);

      $this->post($thread->path().'/replies', $reply->toArray())
         ->assertSessionHasErrors('body');
   }

}
