<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\LetterCategory
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\IncomingLetter> $incomingLetters
 * @property-read int|null $incoming_letters_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OutgoingLetter> $outgoingLetters
 * @property-read int|null $outgoing_letters_count
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|LetterCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LetterCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LetterCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|LetterCategory whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LetterCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LetterCategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LetterCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LetterCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LetterCategory whereUpdatedAt($value)
 * @method static \Database\Factories\LetterCategoryFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class LetterCategory extends Model
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
        'code',
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
     * Get the incoming letters for the category.
     */
    public function incomingLetters(): HasMany
    {
        return $this->hasMany(IncomingLetter::class, 'category_id');
    }

    /**
     * Get the outgoing letters for the category.
     */
    public function outgoingLetters(): HasMany
    {
        return $this->hasMany(OutgoingLetter::class, 'category_id');
    }
}