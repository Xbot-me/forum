<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ParticipateForumTest extends TestCase
{
   use DatabaseMigrations;


   /** @test */
   public function an_signed_in_user_may_participate_in_thread()
   {

    $this->be(factory('App\User')->create());
    
    $thread = factory('App\Thread')->create();

    $reply = factory('App\Reply')->create();
    
    $this->post('/threads/'.$thread->id.'/replies', $reply->toArray());

    $this->get($thread->path())
        ->assertSee($reply->body);
   }

}
