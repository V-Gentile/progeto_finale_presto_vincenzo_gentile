<footer class="text-center text-lg-start bg-body-tertiary text-muted">
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
        <div class="me-5 d-none d-lg-block">
            <span>Lavora con noi</span>
        </div>

        <div>
            @if(!Auth::check() || !Auth::user()->is_revisor)
                <a href="{{ route('become.revisor') }}" class="btn btn-success">Diventa revisore</a>
            @endif
        </div>
    </section>

    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © {{ date('Y') }} Copyright:
        <a class="text-reset fw-bold" href="/">Presto.it</a>
    </div>
</footer>
