<form method="POST" action="{{ $route }}">
    @csrf
    @if(isset($isUpdate))
        @method('PUT')
    @endif

    
    <div class="form-group">
        <label>Contenu</label>
        <textarea class="form-control" placeholder="Contenu de la question" id="content" name="content">{{ $question->content }}</textarea>
        @error('content')
            <span class="text-danger">{{ $errors->first('content') }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label>Quizz</label>
        <select class="selectpicker form-control" data-style="btn-outline-primary" data-size="3" id="quizz_id" name="quizz_id">
            <optgroup data-max-options="3">
                @foreach ($quizzes as $quizz)
                    <option value="{{ $quizz->id }}" @selected($question->quizz_id === $quizz->id)>{{ $quizz->name }}</option>
                @endforeach
            </optgroup>
        </select>
        @error('quizz_id')
            <span class="text-danger">{{ $errors->first('quizz_id') }}</span>
        @enderror
    </div>

        
    <input type="submit" value="Ajouter la question" class="btn btn-primary">
</form>
