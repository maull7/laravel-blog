<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class posts extends Model
{
    use HasFactory;
    protected $fillable = [
        'author_id',
        'category_id',
        'title',
        'body',
    ];
    protected $with = ['author', 'category'];

    public function author(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
