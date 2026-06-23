<x-layout>
    <div class="container mt-5 text-center min-vh-100 d-flex flex-column justify-content-center align-items-center">
        <h1 class="display-3 fw-bold">{{ __('ui.benvenuto') }}</h1>

    @if (session()->has('message'))
        <div class="alert alert-success text-center shadow rounded w-50">
            {{ session('message') }}
        </div>
    @endif

        <p class="lead mt-3 mb-5">{{ __('ui.nuno') }}</p>
        
        <a href="/annunci/crea" class="btn btn-primary btn-lg px-5 py-3 shadow">
            {{ __('ui.benvenuto') }}
        </a>

        <div class="container mt-5">
            <h2 class="text-center mb-4">{{ __('ui.novita') }}</h2>
            <div class="row">
                @forelse ($articles as $article)
                    <div class="col-md-3 mb-4">
                        <x-card :article="$article" />
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-warning shadow">
                            <p class="m-0">{{ __('ui.nonovita') }}</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-layout>
