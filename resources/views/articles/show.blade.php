<x-layout>
    <div class="container mt-5 mb-5">
        <div class="row bg-white shadow-sm rounded-4 p-4 p-md-5">
            
            <div class="col-12 col-md-6 mb-3">
                @if ($article->images->count() > 0)
                    <div id="carouselExample" class="carousel slide">
                        <div class="carousel-inner">
                            @foreach ($article->images as $key => $image)
                                <div class="carousel-item @if($loop->first) active @endif">
                                    <img src="{{ Storage::url($image->path) }}" class="d-block w-100 rounded shadow" alt="Immagine {{ $key + 1 }} dell'articolo {{ $article->title }}">
                                </div>
                            @endforeach
                        </div>
                        @if ($article->images->count() > 1)
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        @endif
                    </div>
                @else
                    <img src="https://picsum.photos/300" alt="Nessuna foto inserita dall'utente">
                @endif
            </div>

            <div class="col-12 col-md-6 d-flex flex-column justify-content-center px-md-4">
                
                <div class="mb-3">
                    <a href="{{ route('articles.byCategory', $article->category_id) }}" class="badge bg-info text-dark text-decoration-none fs-6 py-2 px-3">
                        {{ $article->category->name }}
                    </a>
                </div>

                <h1 class="display-5 fw-bold mb-3">{{ $article->title }}</h1>
                
                <h2 class="text-success fw-bolder mb-4 display-6">{{ $article->price }} €</h2>
                
                <h5 class="text-muted border-bottom pb-2 mb-3">Descrizione dell'annuncio</h5>
                <p class="lead mb-4" style="font-size: 1.1rem; line-height: 1.6;">
                    {{ $article->description }}
                </p>

                <div class="mt-auto d-flex flex-column flex-md-row gap-2">
                    <a href="{{ route('articles.index') }}" class="btn btn-outline-dark btn-lg">
                        &larr; Torna agli annunci
                    </a>
                </div>

            </div>
            
        </div>
    </div>
</x-layout>
