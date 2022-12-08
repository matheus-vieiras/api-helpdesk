<?php

declare(strict_types=1);

namespace App\Models\Category;

use App\Models\Ticket\Ticket;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'categories';

    protected $fillable = [
        'name'
    ];
    public $timestamps = false;

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'categories_id', 'id');
    }

}
