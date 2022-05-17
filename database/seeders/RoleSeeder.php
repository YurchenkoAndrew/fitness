<?php

namespace Database\Seeders;

use App\Models\RoleAndPermission\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Role::query()->create([
            'title_ru' => 'Супер администратор',
            'title_en' => 'Super administrator',
            'slug' => 'super_administrator'
        ]);
        Role::query()->create([
            'title_ru' => 'Администратор',
            'title_en' => 'Administrator',
            'slug' => 'administrator'
        ]);
        Role::query()->create([
            'title_ru' => 'Модератор',
            'title_en' => 'Moderator',
            'slug' => 'moderator'
        ]);
        Role::query()->create([
            'title_ru' => 'Преподаватель',
            'title_en' => 'Teacher',
            'slug' => 'teacher'
        ]);
        Role::query()->create([
            'title_ru' => 'Пользователь',
            'title_en' => 'User',
            'slug' => 'user'
        ]);
    }
}
