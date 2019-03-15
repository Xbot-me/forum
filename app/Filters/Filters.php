<?php

namespace App\Filters;

use Symfony\Component\HttpFoundation\Request;
abstract class Filters
{
    protected $request;
    protected $builder;

    protected $filters = [ ];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply($builder)
    {
        $this->builder = $builder;
        if(!$username = $this->request->by) return $builder;

        return $this->by($username);
     
    }
}