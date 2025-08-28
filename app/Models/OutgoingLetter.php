<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\OutgoingLetter
 *
 * @property int $id
 * @property string $letter_number
 * @property string $recipient
 * @property string $subject
 * @property string|null $content
 * @property \Illuminate\Support\Carbon $sent_date
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
 * @method static \Illuminate\Database\Eloquent\Builder|OutgoingLetter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OutgoingLetter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OutgoingLetter query()
 * @method static \Illuminate\Database\Eloquent\Builder|OutgoingLetter whereAttachmentPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutgoingLetter whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutgoingLetter whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutgoingLetter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutgoingLetter whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutgoingLetter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutgoingLetter whereLetterDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutgoingLetter whereLetterNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutgoingLetter whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutgoingLetter whereRecipient($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutgoingLetter whereSentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutgoingLetter whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutgoingLetter whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutgoingLetter whereUpdatedAt($value)
 * @method static \Database\Factories\OutgoingLetterFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class OutgoingLetter extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'letter_number',
        'recipient',
        'subject',
        'content',
        'sent_date',
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
        'sent_date' => 'date',
        'letter_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the category that owns the outgoing letter.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(LetterCategory::class);
    }

    /**
     * Get the status that owns the outgoing letter.
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(LetterStatus::class);
    }

    /**
     * Get the user that created the outgoing letter.
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}