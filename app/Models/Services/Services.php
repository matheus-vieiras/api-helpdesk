<?php

declare(strict_types=1);

namespace App\Models\Services;

use App\Models\Ticket\Ticket;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $table = 'services';

    protected $fillable = [
        'name',
        'description'
    ];

    public $timestamps = false;

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'service_id', 'id');
    }
}
