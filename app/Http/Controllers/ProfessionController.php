<?php

namespace App\Http\Controllers;

use App\Profession;

class ProfessionController extends Controller
{
    public function index()
    {
        return view('professions.index', [
            'professions' => Profession::withCount('profiles')->orderBy('title')->paginate(10),
        ]);
    }

    public function destroy(Profession $profession)
    {
        abort_if($profession->profiles()->exists(), 400, 'Cannot delete a profession linked to a profile');

        $profession->delete();

        return redirect()->route('profession.index');
    }
}
