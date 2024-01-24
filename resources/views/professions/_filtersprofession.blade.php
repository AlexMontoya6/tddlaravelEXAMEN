<form method="get" action="{{ route('users.index') }}">
    <div class="row row-filters">
        <div class="col-12">
        </div>
    </div>
    <div class="row row-filters">
        <div class="col-12">
        </div>
    </div>
    <div class="row row-filters">
        <div class="col-md-6">
            <div class="form-inline form-search">
                <div class="input-group">
                    <input type="search" name="search" value="{{ request('search') }}"
                        class="form-control form-control-sm" placeholder="Buscar...">
                </div>
                <div class="btn-group drop-skills">
                    <button type="button" class="btn btn-sm btn-secondary dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Habilidades
                    </button>
                    <div class="drop-menu skills-list">
                        @foreach ($skills as $skill)
                            <div class="form-group form-check">
                                <input name="skills[]" type="checkbox" class="form-check-input"
                                    id="skill_{{ $skill->id }}" value="{{ $skill->id }}"
                                    {{ $checkedSkills->contains($skill->id) ? 'checked' : '' }}>
                                <label class="form-check-label"
                                    for="skill_{{ $skill->id }}">{{ $skill->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>


    </div>
</form>
