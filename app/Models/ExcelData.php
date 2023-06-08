<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\ExcelData
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $file_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 *
 * @method static \Database\Factories\ExcelDataFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ExcelData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExcelData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExcelData query()
 * @method static \Illuminate\Database\Eloquent\Builder|ExcelData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExcelData whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExcelData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExcelData whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExcelData whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExcelData whereUserId($value)
 *
 * @mixin \Eloquent
 */
class ExcelData extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'file_name',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
