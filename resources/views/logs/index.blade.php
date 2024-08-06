@extends('adminlte::page')

@section('title', 'Logs')

@section('content_header')
    <h1><span class="badge badge-primary">Logs</span>Administracion</h1>
@stop

@section('content')
<div class="container">

    @if ($currentPage < $totalPages)
    <button class="btn btn-outline-primary" id="load-more" data-page="{{ $currentPage + 1 }}">Cargar más</button>
    @endif

    <div class="log-content">
        <pre>{{ $logs }}</pre>
    </div>

    <script>
        document.getElementById('load-more')?.addEventListener('click', function() {
            const button = this;
            const nextPage = button.getAttribute('data-page');

            fetch(`{{ route('0auths') }}?page=${nextPage}`)
                .then(response => response.text())
                .then(data => {
                    document.querySelector('.log-content').innerHTML += data;
                    button.setAttribute('data-page', parseInt(nextPage) + 1);
                    if (parseInt(nextPage) >= {{ $totalPages }}) {
                        button.style.display = 'none';
                    }
                });
        });
    </script>
</div>
@stop
