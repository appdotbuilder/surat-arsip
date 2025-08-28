<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\LetterStatus
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string $color
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\IncomingLetter> $incomingLetters
 * @property-read int|null $incoming_letters_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OutgoingLetter> $outgoingLetters
 * @property-read int|null $outgoing_letters_count
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|LetterStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LetterStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LetterStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|LetterStatus whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LetterStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LetterStatus whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LetterStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LetterStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LetterStatus whereUpdatedAt($value)
 * @method static \Database\Factories\LetterStatusFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class LetterStatus extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'description',
        'color',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the incoming letters for the status.
     */
    public function incomingLetters(): HasMany
    {
        return $this->hasMany(IncomingLetter::class, 'status_id');
    }

    /**
     * Get the outgoing letters for the status.
     */
    public function outgoingLetters(): HasMany
    {
        return $this->hasMany(OutgoingLetter::class, 'status_id');
    }
}