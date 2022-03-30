<?php

namespace Database\Seeders;

use App\Models\RoleAndPermission\Permissions;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permissions::query()->create([
            'title_ru' => 'Просмотр списка',
            'title_en' => 'List view',
            'slug' => 'list_view'
        ]);
        Permissions::query()->create([
            'title_ru' => 'Просмотр',
            'title_en' => 'View',
            'slug' => 'view'
        ]);
        Permissions::query()->create([
            'title_ru' => 'Создание',
            'title_en' => 'Creation',
            'slug' => 'creation'
        ]);
        Permissions::query()->create([
            'title_ru' => 'Редактирование',
            'title_en' => 'Editing',
            'slug' => 'editing'
        ]);
        Permissions::query()->create([
            'title_ru' => 'Удаление',
            'title_en' => 'Deleting',
            'slug' => 'deleting'
        ]);
    }
}
