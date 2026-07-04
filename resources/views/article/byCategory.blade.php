<x-layout>
    <div class="container">
        <div class="row py-5 justify-content-center align-items-center text-center">
            <div class="col-12 pt-5">
                <!-- Stampa sicura del nome della categoria separata dalla traduzione statica -->
                <h1 class="display-2"> {{ __('ui.articolixcat') }} <span class="fst-italic fw-bold">{{ $category->name }}</span></h1>
            </div>
        </div>
        <div class="row justify-content-center align-items-center py-5">
            @forelse ($articles as $article)
                <div class="col-12 col-md-3">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12 text-center">
                    <h3>
                        {{ __('ui.nonovita') }}
                    </h3>
                    @auth
                        <!-- Nomenclatura della rotta corretta -->
                        <a class="btn btn-dark my-5" href="{{ route('article.create') }}">Pubblica un articolo</a>
                    @endauth
                </div>
            @endforelse
        </div>
    </div>
</x-layout>
