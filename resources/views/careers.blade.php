<x-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-4">Lavora con noi</h2>
                <div class="p-4 shadow bg-white rounded">
                    <p class="lead">Ciao {{ auth()->user()->name }}, invia la tua candidatura per diventare Revisore.</p>
                    <form action="{{ route('careers.submit') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary w-100">Invia richiesta</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
