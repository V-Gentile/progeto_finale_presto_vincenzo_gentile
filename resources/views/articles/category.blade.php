<x-layout>
    <div class="container mt-5">
        <h2 class="mb-4">Annunci della categoria: {{ $category->name }}</h2>
        <div class="row">
            @foreach ($articles as $article)
                <div class="col-md-4 mb-4">
                    <x-card :article="$article" />
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
