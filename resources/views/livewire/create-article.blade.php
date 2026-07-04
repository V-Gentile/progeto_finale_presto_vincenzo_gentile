<div>
    @if (session()->has('message'))
        <div class="alert alert-success text-center">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit="store" class="p-4 shadow bg-white rounded">
        
        <div class="mb-3">
            <label for="title" class="form-label">Titolo dell'annuncio</label>
            <input type="text" class="form-control" id="title" wire:model="title">
            @error('title') <span class="text-danger small">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" rows="5" wire:model="description"></textarea>
            @error('description') <span class="text-danger small">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Prezzo (€)</label>
            <input type="number" step="0.01" class="form-control" id="price" wire:model="price">
            @error('price') <span class="text-danger small">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Categoria</label>
            <select class="form-control" id="category_id" wire:model="category_id">
                <option value="">Seleziona una categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id') <span class="text-danger small">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="temporary_images" class="form-label">Immagini</label>
            <input type="file" wire:model="temporary_images" multiple class="form-control @error('temporary_images.*') is-invalid @enderror" id="temporary_images">
            @error('temporary_images.*')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
            @error('temporary_images')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>

        @if(!empty($images))
            <div class="row mb-3">
                <div class="col-12">
                    <p class="form-label">Anteprima Immagini:</p>
                    <div class="d-flex flex-wrap gap-3">
                        @foreach($images as $key => $image)
                            <div class="img-d border rounded shadow-sm position-relative" style="width: 150px; height: 150px; background-image: url('{{ $image->temporaryUrl() }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                                
                                <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 m-1" wire:click="removeImage({{ $key }})">
                                    X
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        <button type="submit" class="btn btn-primary w-100">Crea Annuncio</button>
    </form>
</div>
