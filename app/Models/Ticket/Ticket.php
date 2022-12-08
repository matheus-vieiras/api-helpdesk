<?php

declare(strict_types=1);

namespace App\Models\Ticket;

use App\Models\Category\Category;
use App\Models\Post\Post;
use App\Models\Services\Services;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

    protected $table = 'tickets';

    protected $fillable = [
        'owner',
        'favored',
        'client_name',
        'client_email',
        'client_phone',
        'client_subject',
        'categories_id',
        'service_id',
        'ticket_status'
    ];

    public $timestamps = false; //update_at / deleted_at

    public function posts()
    {
        return $this->hasMany(Post::class, 'ticket_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }

    public function service()
    {
        return $this->belongsTo(Services::class, 'service_id', 'id');
    }


}
