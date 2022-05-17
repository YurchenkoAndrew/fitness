<?php

namespace Database\Seeders;

use App\Models\RoleAndPermission\Permission;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // 1
        Permission::query()->create([
            'title_ru' => 'Просмотр списка пользователей',
            'title_en' => 'Viewing a list of users',
            'slug' => 'viewing_a_list_of_users'
        ]);

        // 2
        Permission::query()->create([
            'title_ru' => 'Просмотр пользователя',
            'title_en' => 'User View',
            'slug' => 'user_view'
        ]);

        // 3
        Permission::query()->create([
            'title_ru' => 'Создание пользователей',
            'title_en' => 'Creating Users',
            'slug' => 'creating_users'
        ]);

        // 4
        Permission::query()->create([
            'title_ru' => 'Редактирование пользователей',
            'title_en' => 'Editing Users',
            'slug' => 'editing_users'
        ]);

        // 5
        Permission::query()->create([
            'title_ru' => 'Удаление пользователей',
            'title_en' => 'Deleting Users',
            'slug' => 'deleting_users'
        ]);

        // 6
        Permission::query()->create([
            'title_ru' => 'Просмотр списка ролей',
            'title_en' => 'Viewing the list of roles',
            'slug' => 'viewing_the_list_of_roles'
        ]);

        // 7
        Permission::query()->create([
            'title_ru' => 'Просмотр роли',
            'title_en' => 'Role View',
            'slug' => 'view_roles'
        ]);

        // 8
        Permission::query()->create([
            'title_ru' => 'Создание ролей',
            'title_en' => 'Creating roles',
            'slug' => 'creating_roles'
        ]);

        // 9
        Permission::query()->create([
            'title_ru' => 'Редактирование ролей',
            'title_en' => 'Editing roles',
            'slug' => 'editing_roles'
        ]);

        // 10
        Permission::query()->create([
            'title_ru' => 'Удаление ролей',
            'title_en' => 'Removing roles',
            'slug' => 'removing_roles'
        ]);

        // 11
        Permission::query()->create([
            'title_ru' => 'Просмотр списка разрешений',
            'title_en' => 'Viewing the list of permissions',
            'slug' => 'viewing_the_list_of_permissions'
        ]);

        // 12
        Permission::query()->create([
            'title_ru' => 'Просмотр  разрешения',
            'title_en' => 'Permission view',
            'slug' => 'permission_view'
        ]);

        // 13
        Permission::query()->create([
            'title_ru' => 'Назначение разрешений',
            'title_en' => 'Set permissions',
            'slug' => 'set_permission'
        ]);

        // 14
        Permission::query()->create([
            'title_ru' => 'Редактирование разрешений',
            'title_en' => 'Editing permissions',
            'slug' => 'editing_permissions'
        ]);

        // 15
        Permission::query()->create([
            'title_ru' => 'Удаление разрешений',
            'title_en' => 'Removing permissions',
            'slug' => 'removing_permissions'
        ]);
    }
}
