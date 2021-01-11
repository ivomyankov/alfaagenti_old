<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Imoti;

class ImotiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<51;$i++){
            Imoti::create([
                'title' => 'Имот '.$i,
                'text' => "text $i",
                'price' => $i,
                'agent_id' => 1,
            ]);
        }
        
    }
}