<?php

namespace Database\Seeders;

use App\Models\StatusTest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StatusTest::truncate();
        $st =
        [
            [
                'status'=>'A'
            ],
            [
                'status'=>'B'
            ],
            [
                'status'=>'C',
            ],
        ];
        foreach($st as $ot)
        {
            StatusTest::create($ot);
        }
    }
}
