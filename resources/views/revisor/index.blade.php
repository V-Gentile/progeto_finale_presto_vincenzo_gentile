<x-layout>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center mb-4">
                <h1>Dashboard Revisore</h1>
                
                @if(session('last_article_id'))
                    <form action="{{ route('revisor.undo', session('last_article_id')) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-warning fw-bold shadow">Annulla ultima azione</button>
                    </form>
                @endif
            </div>
        </div>

        @if($article_to_check)
            <div class="row bg-white shadow rounded p-4">
                
                <div class="col-12 col-md-4 mb-4">
                    <h2 class="mb-3">{{ $article_to_check->title }}</h2>
                    <h3>Autore: {{ $article_to_check->user->name }}</h3>
                    <h4 class="text-primary mb-3">{{ $article_to_check->price }} €</h4>
                    <p><strong>Categoria:</strong> {{ $article_to_check->category->name }}</p>
                    <hr>
                    <p class="text-break">{{ $article_to_check->description }}</p>
                </div>

                <!-- Immagini -->
                <div class="col-12 col-md-5 mb-4">
                    <div class="row g-3">
                        @if ($article_to_check->images->count())
                            @foreach ($article_to_check->images as $key => $image)
                                <div class="col-12 mb-3">
                                    <div class="card shadow-sm">
                                        <img src="{{ $image->getUrl(800, 800) }}" class="card-img-top" alt="Immagine {{ $key + 1 }} dell'articolo '{{ $article_to_check->title }}'">
                                        <div class="card-body">
                                            <h5 class="card-title mb-3 fw-bold">Ratings</h5>
                                            <div class="row justify-content-center mb-2">
                                                <div class="col-2">
                                                    <div class="text-center mx-auto {{ $image->adult }}"></div>
                                                </div>
                                                <div class="col-10">Adult</div>
                                            </div>
                                            <div class="row justify-content-center mb-2">
                                                <div class="col-2">
                                                    <div class="text-center mx-auto {{ $image->violence }}"></div>
                                                </div>
                                                <div class="col-10">Violence</div>
                                            </div>
                                            <div class="row justify-content-center mb-2">
                                                <div class="col-2">
                                                    <div class="text-center mx-auto {{ $image->spoof }}"></div>
                                                </div>
                                                <div class="col-10">Spoof</div>
                                            </div>
                                            <div class="row justify-content-center mb-2">
                                                <div class="col-2">
                                                    <div class="text-center mx-auto {{ $image->racy }}"></div>
                                                </div>
                                                <div class="col-10">Racy</div>
                                            </div>
                                            <div class="row justify-content-center mb-3">
                                                <div class="col-2">
                                                    <div class="text-center mx-auto {{ $image->medical }}"></div>
                                                </div>
                                                <div class="col-10">Medical</div>
                                            </div>
                                            <hr>
                                            <h5 class="card-title mb-3 fw-bold">Labels</h5>
                                            @if ($image->labels)
                                                @foreach ($image->labels as $label)
                                                    <span class="badge bg-secondary mb-1">#{{ $label }}</span>
                                                @endforeach
                                            @else
                                                <p class="fst-italic text-muted">No Labels</p>
                                            @endif
                                            
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            @for ($i = 0; $i < 6; $i++)
                                <div class="col-6 col-md-4 mb-4 text-center">
                                    <img src="https://picsum.photos/800" alt="immagine segnaposto" class="img-fluid rounded shadow">
                                </div>
                            @endfor
                        @endif
                    </div>
                </div>
                <!-- Bottoni -->
                <div class="col-12 col-md-3 h-100">
                    <div class="d-flex flex-column justify-content-center align-items-center gap-3 position-sticky" style="top: 2rem;">
                        
                        <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST" class="w-100">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success btn-lg w-100 fw-bold shadow-sm">
                                <i class="bi bi-check-circle me-1"></i> Accetta
                            </button>
                        </form>
                        
                        <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST" class="w-100">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-danger btn-lg w-100 fw-bold shadow-sm">
                                <i class="bi bi-x-circle me-1"></i> Rifiuta
                            </button>
                        </form>
                        
                    </div>
                </div>
                @if (session()->has('message'))
                    <div class="row justify-content-center mt-3">
                        <div class="col-5 alert alert-success text-center shadow rounded">
                            {{ session('message') }}
                        </div>
                    </div>
                @endif

            </div>
        @else
            <div class="row">
                <div class="col-12 mt-5 text-center">
                    <h3 class="text-muted">Nessun annuncio da revisionare.</h3>
                    <p>Hai completato tutto il lavoro!</p>
                </div>
            </div>
        @endif
    </div>
</x-layout>
