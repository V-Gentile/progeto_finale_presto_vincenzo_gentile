<x-layout>
    <div class="container mt-5">
        <h1 class="mb-4">Tutti gli annunci</h1>
        <div class="row">
            @forelse($articles as $article)
                <div class="col-md-4 mb-4">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning shadow">
                        <p class="m-0">Non ci sono ancora annunci disponibili.</p>
                    </div>
                </div>
            @endforelse
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $articles->links() }}
        </div>
    </div>
</x-layout>
