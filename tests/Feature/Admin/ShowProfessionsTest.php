<?php

namespace Tests\Feature\Admin;

use App\Profession;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowProfessionsTest extends TestCase
{
    use RefreshDatabase;

    public function test_shows_profession_list()
    {
        factory(Profession::class)->create(['title' => 'Diseñador']);
        factory(Profession::class)->create(['title' => 'Programador']);
        factory(Profession::class)->create(['title' => 'Administrador']);

        $this->get('profesiones')
            ->assertStatus(200)
            ->assertSeeInOrder([
                'Administrador',
                'Diseñador',
                'Programador',
            ]);
    }
    public function test_profession_pagination()
    {
        $professions = factory(Profession::class, 15)->create();

        $this->get('profesiones')
            ->assertStatus(200)
            ->assertDontSee($professions[11]->title);
    }

    public function test_shows_default_message_if_no_professions()
    {
        $this->get('profesiones')
            ->assertStatus(200)
            ->assertSeeText('No hay profesiones registradas.');

    }

    public function test_professions_are_sorted_by_name()
    {
        factory(Profession::class)->create([
            'title' => 'C',
        ]);
        factory(Profession::class)->create([
            'title' => 'A',
        ]);
        factory(Profession::class)->create([
            'title' => 'B',
        ]);

        $this->get('profesiones')
            ->assertStatus(200)
            ->assertSeeInOrder([
                'A',
                'B',
                'C'
            ]);
    }
}
