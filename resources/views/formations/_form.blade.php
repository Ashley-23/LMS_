<form method="POST" action="{{ $route }}">
    @csrf
    @if(isset($isUpdate))
        @method('PUT')
    @endif
    <div class="form-group">
        <label>Nom </label>
        <input class="form-control" type="text" value="{{ $formation->name }}" placeholder="Anglais pour débutants" id="name" name="name">
        @error('name')
            <span class="text-danger">{{ $errors->first('name') }}</span>
        @enderror

    </div>

    <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" placeholder="Description de la formation" id="description" name="description">{{ $formation->description }}</textarea>
        @error('description')
            <span class="text-danger">{{ $errors->first('description') }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label>Niveau</label>
        <select class="selectpicker form-control" data-style="btn-outline-primary" data-size="3" id="level" name="level">
            <optgroup data-max-options="3">
                @foreach ($levels as $level)
                    <option value="{{ $level->value }}" @selected($formation?->level?->value === $level->value)>{{ $level->displayName() }}</option>
                @endforeach
            </optgroup>
        </select>
        @error('level')
            <span class="text-danger">{{ $errors->first('level') }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label>Durée (Heure) </label>
        <input class="form-control" type="number" value="{{ $formation->duration }}" placeholder="Durée de la formation en heures" id="duration" name="duration" min="1">
        @error('duration')
            <span class="text-danger">{{ $errors->first('duration') }}</span>
        @enderror
    </div>


    <input type="submit" value="{{(isset($isUpdate) && $isUpdate) ? 'Modifier' : 'Ajouter'}} la formation" class="btn btn-primary">
</form>
