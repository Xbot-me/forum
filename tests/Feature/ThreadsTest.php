<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadsTest extends TestCase
{
    use DatabaseMigrations;
    public function setUp()
    {
        parent::setUp();
        $this->thread = create('App\Thread');

    }
    /** @test*/
    public function a_user_can_browse_all_threads()
    {
        $this->get('/threads')
                ->assertSee($this->thread->title);
    }
    /** @test */
    public function a_thread_can_make_a_string_path()
    {
        $thread = create('App\Thread');

        $this->assertEquals('/threads/'.$thread->channel->slug.'/'.$thread->id,$thread->path());
    }
    /** @test */
    public function a_user_can_browse_single_thread()
    {

        $this->get('/threads/some-channel/'.$this->thread->id)
            ->assertSee($this->thread->title);
    }
 
    /** @test */
    public function a_user_can_read_a_reply_of_thread()
    {

       $reply = create('App\Reply',['thread_id'=>$this->thread->id]);

        $this->get('/threads/some-channel/'.$this->thread->id)
            ->assertSee($reply->body);

    }
    /** @test */

    public function a_user_can_filter_threads_by_tag()
    {
        $channel = create('App\Channel');
        $threadInChannel = create('App\Thread',['channel_id'=>$channel->id]);
        $threadNotInChannel = create('App\Thread');
        $this->get('/threads/'.$channel->slug)
            ->assertSee($threadInChannel->title)
            ->assertSee($threadNotInChannel->title);
    }
   
}
