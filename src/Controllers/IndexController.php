<?php

namespace App\Plugins\Game\src\Controllers;

use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;

#[Controller(prefix:"/games")]
class IndexController
{
    ##[GetMapping(path:"")]
    public function index(){

    }
}