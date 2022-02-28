<?php

namespace App\Models\RoleAndPermission;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permissions extends Model
{
    use HasFactory;

    protected $fillable = ['title_ru', 'title_en'];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }
}
