<x-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-4">Accedi</h2>
                <form action="/login" method="POST" class="p-4 shadow bg-white rounded">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Indirizzo Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100 mb-3">Accedi</button>
                    
                    <div class="text-center">
                        <span class="small">Non sei ancora registrato?</span>
                        <a href="/register" class="small text-decoration-none">Crea un account qui</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
