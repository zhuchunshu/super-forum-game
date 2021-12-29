<?php

declare (strict_types=1);
namespace App\Plugins\Game\src\Model;

use App\Model\Model;
use Carbon\Carbon;

/**
 * @property int $id 
 * @property string $name 
 * @property string $user_id 
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class GameChishenme extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'game_chishenme';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','name','user_id','created_at','updated_at'];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}