@extends('base', ['title' => 'Liste des quizz'])

@section('content')

    <div class="pd-20 card-box mb-30">
        <a href="{{ route('quizzes.create') }}" class="btn btn-primary mb-3">Ajouter un quizz</a>

        <div class="pb-20">
            <table class="data-table table stripe hover nowrap">
                <thead>
                    <tr>
                        <th class="table-plus datatable-nosort">Nom</th>
                        <th>Subsection</th>
                        <th>Questions</th>
                        <th class="datatable-nosort">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($quizzes as $quizz)
                        <tr>
                            <td class="table-plus">{{ $quizz->name }}</td>
                            <td>{{ $quizz->subsection?->name ?? 'Inconnue' }}</td>
                            <td>{{ $quizz->questions->count() }}</td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                        <a class="dropdown-item" href="{{ route('quizzes.show', $quizz) }}"><i class="dw dw-eye"></i> Voir</a>
                                        <a class="dropdown-item" href="{{ route('quizzes.edit', $quizz) }}"><i class="dw dw-edit2"></i> Modifier</a>
                                        <form action="{{ route('quizzes.destroy', $quizz) }}" method="POST" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item" type="submit"><i class="dw dw-delete-3"></i> Supprimer</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4">Aucun quizz disponible.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection