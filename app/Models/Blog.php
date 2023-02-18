<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Artisan;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'site_id',
        'title',
        'content'
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public static function boot()
    {
        parent::boot();

        static::afterCreating(function ($model) {
            Artisan::call('send:blogs');
        });
    }

    public static function afterCreating($callback)
    {
        static::registerModelEvent('created', $callback);
    }
}
