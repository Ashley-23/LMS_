@php
    if (session()->has('success')) {
        $message = session()->get('success');
        $type = 'success';
    } elseif (session()->has('error')) {
        $message = session()->get('error');
        $type = 'error';
    } elseif (session()->has('warning')) {
        $message = session()->get('warning');
        $type = 'warning';
    } elseif (session()->has('info')) {
        $message = session()->get('info');
        $type = 'info';
    } else {
        $message = null;
        $type = null;
    }
@endphp
@if($message)
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <div class="text-left">
            @if(session()->has('success'))
                <strong>Super !</strong> {{ $message }}
            @endif
            @if(session()->has('error'))
                <strong>Oups !</strong> {{ $message }}
            @endif
            @if(session()->has('warning'))
                <strong>Attention !</strong> {{ $message }}
            @endif
            @if(session()->has('info'))
                <strong>Ok !</strong> {{ $message }}
            @endif
        </div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
