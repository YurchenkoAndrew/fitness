<?php

namespace App\Models\RoleAndPermission;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *
 * @property int $id
 * @property string $title_ru
 * @property string $title_en
 * @property string $slug
 */
class Role extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['title_ru', 'title_en', 'slug'];

    /**
     * @return BelongsToMany
     */
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permissions::class, 'permission_role', 'role_id', 'permission_id');
    }

    /**
     * @return HasMany
     */
    public function user(): HasMany
    {
        return $this->hasMany(User::class, 'id', 'role_id');
    }
}
