<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
        * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([

            'title' => 'COVID-19 Pandemic',

            'body' => 'COVID-19, caused by the SARS-CoV-2 virus, emerged in late 2019 and rapidly spread worldwide, leading to a global health crisis. The pandemic has resulted in significant morbidity and mortality, overwhelming healthcare systems and prompting unprecedented public health responses. Efforts to control the spread of the virus have included widespread testing, contact tracing, quarantine measures, and the development and deployment of vaccines. The pandemic has also had profound social and economic impacts, affecting daily life, work, and education across the globe.',

            'category_id' => 1,

            'tag_id' => 1,

        ]);
    }
}
