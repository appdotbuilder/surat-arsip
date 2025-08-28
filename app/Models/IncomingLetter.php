<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\IncomingLetter
 *
 * @property int $id
 * @property string $letter_number
 * @property string $sender
 * @property string $subject
 * @property string|null $content
 * @property \Illuminate\Support\Carbon $received_date
 * @property \Illuminate\Support\Carbon $letter_date
 * @property string|null $attachment_path
 * @property int $category_id
 * @property int $status_id
 * @property int $created_by
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\LetterCategory $category
 * @property-read \App\Models\User $creator
 * @property-read \App\Models\LetterStatus $status
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingLetter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingLetter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingLetter query()
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingLetter whereAttachmentPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingLetter whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingLetter whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingLetter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingLetter whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingLetter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingLetter whereLetterDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingLetter whereLetterNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingLetter whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingLetter whereReceivedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingLetter whereSender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingLetter whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingLetter whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingLetter whereUpdatedAt($value)
 * @method static \Database\Factories\IncomingLetterFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class IncomingLetter extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'letter_number',
        'sender',
        'subject',
        'content',
        'received_date',
        'letter_date',
        'attachment_path',
        'category_id',
        'status_id',
        'created_by',
        'notes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'received_date' => 'date',
        'letter_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the category that owns the incoming letter.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(LetterCategory::class);
    }

    /**
     * Get the status that owns the incoming letter.
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(LetterStatus::class);
    }

    /**
     * Get the user that created the incoming letter.
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}