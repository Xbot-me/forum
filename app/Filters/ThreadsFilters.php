<?php

namespace App\Filters;



use App\User;

class ThreadsFilters extends Filters
{
    protected $filters = ['by']; //filters array we can responds to.
  
    protected function by($username)
    {
        $user = User::where('name', $username)->firstOrFail();
        return $this->builder->where('user_id', $user->id);
    }

}