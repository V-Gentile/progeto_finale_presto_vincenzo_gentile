<x-layout>
    <div class="container mt-5 text-center min-vh-100 d-flex flex-column justify-content-center align-items-center">
        <h1 class="display-3 fw-bold">{{ __('ui.benvenuto') }}</h1>

    @if (session()->has('errorMessage'))
        <div class="alert alert-danger text-center shadow rounded w-50">
            {{ session('errorMessage') }}
        </div>
    @endif

        <p class="lead mt-3 mb-5">{{ __('ui.nuno') }}</p>
        
        <a href="{{ route('article.create') }}" class="btn btn-primary btn-lg px-5 py-3 shadow">
            {{ __('ui.crea') }}
        </a>
            <div class="row justify-content-center align-items-center py-5">
                @forelse ($articles as $article)
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <x-card :article="$article" />
                    </div>
                @empty
                    <div class="col-12">
                        <h3 class="text-center">
                            {{ __('ui.nonovita') }}
                        </h3>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-layout>
