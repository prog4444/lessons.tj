<?php

namespace Database\Seeders;

use App\Models\Roles;
use App\Models\StatusTest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roles::truncate();
        $st =
            [
                [
                    'name'=>'Администратор'
                ],
                [
                    'name'=>'Модератор'
                ],
                [
                    'name'=>'Муаллима',
                ],
                [
                    'name'=>'Пользователь',
                ],
            ];
        foreach($st as $ot)
        {
            Roles::create($ot);
        }
    }
}
