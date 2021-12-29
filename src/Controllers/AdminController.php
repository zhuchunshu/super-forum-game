<?php

namespace App\Plugins\Game\src\Controllers;

use App\Middleware\AdminMiddleware;
use App\Model\AdminOption;
use App\Plugins\Game\src\Model\GameChishenme;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;
use Hyperf\HttpServer\Annotation\Middleware;
use Hyperf\HttpServer\Annotation\PostMapping;

#[Controller(prefix:"/admin/game")]
#[Middleware(AdminMiddleware::class)]
class AdminController
{
    #[GetMapping(path:"")]
    public function index(){
        return view("Game::admin");
    }
    #[PostMapping(path:"init")]
    public function init(){
        // 初始化吃什么
        if(get_options_nocache("game_chishenme_init",0)===0){
            $arr = explode(" ","馄饨 拉面 烩面 热干面 刀削面 油泼面 炸酱面 炒面 重庆小面 米线 酸辣粉 土豆粉 螺狮粉 凉皮儿 麻辣烫 肉夹馍 羊肉汤 炒饭 盖浇饭 卤肉饭 烤肉饭 黄焖鸡米饭 驴肉火烧 川菜 麻辣香锅 火锅 酸菜鱼 烤串 披萨 烤鸭 汉堡 炸鸡 寿司 蟹黄包 煎饼果子 生煎 炒年糕 鳗鱼饭 水煮肉 鸭血粉丝汤 剁椒鱼头 海鲜豆腐汤 干煸四季豆 炸鸡排 羊肉泡馍 酸汤肥牛 烤鱼 瓦罐汤 酸菜鱼 片儿川 螺蛳粉 毛血旺 牛肉面 手抓饭 辣椒炒肉 猪肚鸡 小鸡炖蘑菇 孜然牛肉 糖醋小排 孜然羊肉 烤地瓜 黄焖鸡 春卷 牛腩粉 咖喱猪扒饭 拔丝地瓜 照烧鸡排饭 披萨 牛肉炒饭 拌饭 桂林米粉 云吞面 青团 钵钵鸡 泡菜炒饭 炭烧墨鱼仔 炙子烤肉 腊八粥 寿喜锅 西冷牛排 炸猪排 虾饺 蘸水面 肉酱面 咖喱蛋包饭 水煎包 糖醋里脊 麻辣米线 香椿鸡蛋 豚骨拉面");
            $arr = array_unique($arr);
            foreach ($arr as $value){
                GameChishenme::query()->create([
                    "name" => $value
                ]);
            }

            AdminOption::query()->create([
                "name" => "game_chishenme_init",
                "value" => 1,
            ]);
        }
        return Json_Api(200,true,['msg' => '初始化完成!']);
    }
}