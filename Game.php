<?php

namespace App\Plugins\Game;

/**
 * @name Game
 * @version 1.0.0
 * @package 小游戏组件
 * @author Inkedus
 * @link http://runpod.cn
 */
class Game
{
    public function handler(): void
    {
        $this->bootstrap();
    }

    public function bootstrap(): void
    {
        require_once __DIR__ . '/bootstrap.php';
    }
}