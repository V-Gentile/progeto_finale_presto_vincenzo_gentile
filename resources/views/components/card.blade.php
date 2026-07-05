<div class="card mx-auto h-100 shadow text-center">
    <img src="{{$article->images->isNotEmpty() ? $article->images->first()->getUrl(800, 800) : 'https://picsum.photos/800'}}" class="card-img-top bg-light" style="aspect-ratio: 1/1; object-fit: cover;" alt="Immagine dell'articolo {{ $article->title }}">
    <div class="card-body d-flex flex-column">
        <h4 class="card-title">{{ $article->title }}</h4>
        <h6 class="card-subtitle text-body-secondary mb-auto">{{ $article->price }} €</h6>
        <div class="d-flex flex-column gap-2 mt-5">
            <a href="{{ route('article.show', compact('article')) }}" class="btn btn-primary w-100">Dettaglio</a>
            <a href="{{ route('byCategory', ['category' => $article->category]) }}" class="btn btn-outline-info w-100">{{ $article->category->name }}</a>
        </div>
    </div>
</div>
