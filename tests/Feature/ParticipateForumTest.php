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

    $this->post('/threads/'.$thread->id.'/replies', $reply->toArray());

    $this->get($thread->path())
        ->assertSee($reply->body);
   }

}
