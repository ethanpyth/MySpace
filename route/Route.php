<?php

namespace Route;

class Route
{
    private $matches;
    private $path;
    private $callable;

    public function __construct($path, $callable){
        $this->path = trim($path, '/');
        $this->callable = $callable;
    }

    public function match($url): bool
    {
        $url = trim($url, '/');
        $path = preg_replace('#:(\w+)#', '([^/]+)', $this->path);
        $regex = "#^$path$#i";

        if (preg_match($regex, $url, $matches)){
            array_shift($matches);
            $this->matches = $matches;
            return true;
        }
        return false;
    }

    public function call(){
        return call_user_func_array($this->callable, $this->matches);
    }
}