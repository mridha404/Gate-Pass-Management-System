<?php


// Database/Seeders/DesignationsTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Designation;

class DesignationsTableSeeder extends Seeder
{
    public function run()
    {
        $designations = ['Vice Chancellor', 'Sr. Executive', 'Executive', 'Treasurer', 'Executive Director', 'Coordinator (American Corner)', 'Registrar', 'Assistant Registrar', 'Controller', 'Deputy Director', 'Project Director','Site Engineer','Assistant Director','Professor','Lecturer','Associate Professor','Jr. Executive'];

        foreach ($designations as $designation) {
            Designation::create(['name' => $designation]);
        }
    }
}
