<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CompanyProfile
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $address
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $website
 * @property string|null $logo_path
 * @property string|null $vision
 * @property string|null $mission
 * @property string|null $history
 * @property array|null $social_media
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyProfile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyProfile query()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyProfile whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyProfile whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyProfile whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyProfile whereHistory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyProfile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyProfile whereLogoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyProfile whereMission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyProfile whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyProfile wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyProfile whereSocialMedia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyProfile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyProfile whereVision($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyProfile whereWebsite($value)
 * @method static \Database\Factories\CompanyProfileFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class CompanyProfile extends Model
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
        'address',
        'phone',
        'email',
        'website',
        'logo_path',
        'vision',
        'mission',
        'history',
        'social_media',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'social_media' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}