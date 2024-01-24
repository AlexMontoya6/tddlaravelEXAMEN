<?php

use App\{Profession, Skill, Team};
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    private function fetchRelations()
    {
        $this->professions = Profession::all();
        $this->skills = Skill::all();
        $this->teams = Team::all();
    }
    public function run()
    {

        $this->fetchRelations();

        Profession::create([
            'title' => 'Desarrollador Back-End'
        ]);
        Profession::create([
            'title' => 'Desarrollador Front-End'
        ]);
        Profession::create([
            'title' => 'Diseñador web'
        ]);

        foreach (range(1, 98) as $i) {
            $this->createRandomProfession();
        }

        factory(Profession::class, 97)->create();
    }

    private function createRandomProfession()
    {
        $profession = factory(Profession::class)->create();

        $numSkills = $this->skills->count();
        $profession->skills()->attach($this->skills->random(rand(0, $numSkills)));
    }
}
