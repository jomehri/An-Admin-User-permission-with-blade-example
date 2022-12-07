<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

abstract class BaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * @return void
     */
    public abstract function run(): void;
}
