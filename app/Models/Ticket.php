<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;
    protected $table = 'tickets';
    protected $fillable = [
        'group_name',
        'category_id',
        'status',
        'details',
        'handled_by',
        'sender',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function handledBy()
    {
        return $this->belongsTo(User::class, 'handled_by');
    }
}
