<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Url extends Model
{
    use HasFactory, SoftDeletes;
    //

    protected $fillable = [
        'title',
        'original_url',
        'shortened_url',
        'clicks',
        'user_id',
        'expires_at',
        'company_id',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'clicks' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
