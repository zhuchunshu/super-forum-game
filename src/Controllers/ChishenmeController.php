<?php

namespace App\Plugins\Game\src\Controllers;

use App\Plugins\Game\src\Model\GameChishenme;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;
use Hyperf\HttpServer\Annotation\PostMapping;

#[Controller(prefix:"/games/chishenme")]
class ChishenmeController
{
    #[GetMapping(path:"")]
    public function index(){
        return view("Game::chishenme.index");
    }

    #[PostMapping("list")]
    public function list(){
        $all = GameChishenme::query(true)->get();
        $data = [];
        foreach ($all as $value){
            $data[]=$value->name;
        }
        return Json_Api(200,true,$data);
    }

    #[GetMapping(path:"addFood")]
    public function addFood(){
        return view("Game::chishenme.addFood");
    }

    #[PostMapping(path:"addFood")]
    public function addFood_Submit(){
        if(!request()->input("name")){
            return Json_Api(401,false,['msg' => '请求参数不足,缺少:name']);
        }
        $arr = explode("\n",request()->input("name"));
        foreach ($arr as $name){
            if(!GameChishenme::query()->where("name",$name)->exists()){
                GameChishenme::query()->create([
                    "name" => $name,
                    "user_id" => auth()->id()
                ]);
            }
        }
        return Json_Api(200,true,['msg' => '添加成功!']);
    }
}