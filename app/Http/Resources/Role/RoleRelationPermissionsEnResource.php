<?php

namespace App\Http\Resources\Role;

use App\Http\Resources\Permission\PermissionEnResource;
use App\Models\RoleAndPermission\Permission;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;
use JsonSerializable;

/**
 * @property int $id
 * @property string title_en
 * @property string $slug
 * @property int $created_at
 * @property int $updated_at
 * @property Permission $permissions
 */
class RoleRelationPermissionsEnResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array|Arrayable|JsonSerializable
     */
    #[ArrayShape(['id' => "int", 'title_en' => "string", 'slug' => "string", 'created_at' => "int", 'updated_at' => "int", 'permissions' => "\Illuminate\Http\Resources\Json\AnonymousResourceCollection"])]
    public function toArray($request): array|JsonSerializable|Arrayable
    {
        return [
            'id' => $this->id,
            'title_en' => $this->title_en,
            'slug' => $this->slug,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'permissions' => PermissionEnResource::collection($this->permissions),
        ];
    }
}
