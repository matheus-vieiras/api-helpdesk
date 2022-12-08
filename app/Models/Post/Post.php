<?php

declare(strict_types=1);

namespace App\Models\Post;

use App\Models\Agents\Agents;
use App\Models\Ticket\Ticket;
use Illuminate\Database\Eloquent\Model;
use function Symfony\Component\Translation\t;

class Post extends Model
{

    protected $table = 'tickets_posts';

    protected $fillable = [
        'ticket_id',
        'owner',
        'type',
        'message',
        'responsible',
        'file',
        'agent_id'
    ];

    public $timestamps = false;

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id', 'id');
    }

    public function agents()
    {
        return $this->belongsTo(Agents::class, 'agent_id', 'id');
    }

}
