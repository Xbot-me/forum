<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Favorite;
use PhpParser\Node\Stmt\TryCatch;

class FavoritesTest extends TestCase
{
    use DatabaseMigrations;
    /** @test */
    public function guests_can_not_favorite_anything()
    {   
        $this->withExceptionHandling()
            ->post('replies/1/favorites')
            ->assertRedirect('/login');
    }
    /** @test */
    public function a_signed_in_user_can_favorite_any_reply()
    {
        $this->signIn();
        $reply = create('App\Reply');

        $this->post('replies/'.$reply->id.'/favorites');
        //dd(Favorite::all());
        $this->assertCount(1,$reply->favorites);
    }

    /** @test */

    public function a_signed_in_user_may_only_favorite_a_reply_once()
    {
        $this->signIn();

        $reply = create('App\Reply');

        try{
            $this->post('replies/'.$reply->id.'/favorites');
            $this->post('replies/'.$reply->id.'/favorites');
        }catch(\Exception $e){
            $this->fail('Did not expect tp insert the same record twice');
        }

        

        $this->assertCount(1,$reply->favorites);
    }
}
