<?php

namespace App\Models\RoleAndPermission;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['title_ru', 'title_en', 'user_id'];

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permissions::class);
    }
}
