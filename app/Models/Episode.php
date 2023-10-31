<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Episode extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['number'];
    protected $casts = ['watched' => 'boolean'];

    public function season()
    {
        return $this->belongsTo(Season::class);
    }

    public function scopeWatched(Builder $query)
    {
        $query->where('watched', true);
    }

    /**
     * Accessor e Mutator
     */
    /*protected function watched(): Attribute
    {
        return new Attribute(
            set: fn ($watched) => (bool) $watched,
            get: fn ($watched) => (bool) $watched
        );
    }*/
}
