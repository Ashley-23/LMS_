<form method="POST" action="{{ $route }}">
    @csrf
    @if(isset($isUpdate))
        @method('PUT')
    @endif

    <div class="form-group">
        <label>Nom</label>
        <input class="form-control" type="text" value="{{ $quizz->name ?? '' }}" placeholder="Quizz sur PHP" id="name" name="name">
        @error('name')
            <span class="text-danger">{{ $errors->first('name') }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label>Subsection</label>
        <select class="selectpicker form-control" id="subsection_id" name="subsection_id">
            @foreach($subsections as $subsection)
                <option value="{{ $subsection->id }}" @selected(($quizz?->subsection_id ?? old('subsection_id')) == $subsection->id)>{{ $subsection->name }}</option>
            @endforeach
        </select>
        @error('subsection_id')
            <span class="text-danger">{{ $errors->first('subsection_id') }}</span>
        @enderror
    </div>

    <input type="submit" value="{{ isset($isUpdate) ? 'Modifier le quizz' : 'Ajouter le quizz' }}" class="btn btn-primary">
</form>