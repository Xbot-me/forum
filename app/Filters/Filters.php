<?php

namespace App\Filters;

use Symfony\Component\HttpFoundation\Request;
abstract class Filters
{
    protected $request, $builder;
     

    protected $filters = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply($builder)
    {
        $this->builder = $builder;

        

        foreach($this->sFilters() as $filter => $value)
        {
            if(method_exists($this,$filter)){
                $this->$filter($value);
            }
            
        }        
       

        return $this->builder;
     
    }
    public function sFilters()
    {
        $filters = array_intersect(array_keys($this->request->all()), $this->filters);
        return $this->request->only($filters);
        //return $this->request->intersect($this->filters);
    }

}