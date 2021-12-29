<?php
// 后台菜单
menu()->add(801,[
    'url' => '/admin/game',
    'name' => '游戏设置',
    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-gamepad" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <rect x="2" y="6" width="20" height="12" rx="2"></rect>
   <path d="M6 12h4m-2 -2v4"></path>
   <line x1="15" y1="11" x2="15" y2="11.01"></line>
   <line x1="18" y1="13" x2="18" y2="13.01"></line>
</svg>',
]);

// 主菜单
Itf()->add("menu",801,[
    "name" => "小游戏",
    "url" => "/games",
    "icon" => '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-gamepad" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <rect x="2" y="6" width="20" height="12" rx="2"></rect>
   <path d="M6 12h4m-2 -2v4"></path>
   <line x1="15" y1="11" x2="15" y2="11.01"></line>
   <line x1="18" y1="13" x2="18" y2="13.01"></line>
</svg>',
]);

Itf()->add("menu",802,[
    "name" => "吃什么",
    "url" => "/games/chishenme",
    "icon" => '',
    'parent_id' => 801
]);



// 用户组权限
Authority()->add("game_chishenme_create","Game-->[吃什么]-->添加食材");
Authority()->add("game_chishenme_delete","Game-->[吃什么]-->删除自己的食材");
Authority()->add("admin_game_chishenme_delete","Game-->[吃什么]-->删除所有食材");
