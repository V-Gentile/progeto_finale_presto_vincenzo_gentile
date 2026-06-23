<nav class="navbar navbar-expand-lg bg-body-tertiary shadow sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-primary" href="/">PRESTO</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('ui.annunci') }}
                    </a>
                    <ul class="dropdown-menu shadow-sm">
                        <li><a class="dropdown-item" href="{{ route('articles.index') }}">{{ __('ui.tutannunci') }}</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/annunci/crea">{{ __('ui.crea') }}</a></li>
                    </ul>
                </li>

                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu shadow-sm">
                            @if (optional(auth()->user())->is_revisor)
                                <li>
                                    <a class="dropdown-item text-success fw-bold" href="{{ route('revisor.index') }}">{{ __('ui.revisore') }}</a>
                                </li>
                            @else
                                <li>
                                    <a class="dropdown-item" href="{{ route('careers') }}">{{ __('ui.lavora') }}</a>
                                </li>
                            @endif
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="/logout" method="POST" class="m-0">
                                    @csrf
                                    <button class="dropdown-item text-danger" type="submit">{{ __('ui.esci') }}</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="/login">{{ __('ui.accedi') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">{{ __('ui.registrati') }}</a>
                    </li>
                @endauth
            </ul>

            <div class="d-flex align-items-center gap-2 me-3 mb-2 mb-lg-0">
                <x-_locale lang="it"/>
                <x-_locale lang="uk"/>
                <x-_locale lang="es"/>
            </div>

            <form role="search" action="{{ route('article.search') }}" method="GET" class="d-flex">
                <div class="input-group">
                    <input type="search" name="query" class="form-control" placeholder="Cerca..." aria-label="search">
                    <button type="submit" class="btn btn-outline-success">
                        {{ __('ui.cerca') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</nav>
