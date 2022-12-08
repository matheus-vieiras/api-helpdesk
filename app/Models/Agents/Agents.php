<?php

declare(strict_types=1);

namespace App\Models\Agents;

use App\Models\Post\Post;
use Illuminate\Database\Eloquent\Model;

class Agents extends Model
{
    protected $table = 'agents';

    protected $fillable = [
        "name",
        "department",
        "status"
        ];

    public $timestamps = false;

    public function posts()
    {
        return $this->hasMany(Post::class, 'agent_id', 'id');
    }
}


