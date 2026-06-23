<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateArticle extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $price;
    public $category_id;
    public $images=[];
    public $temporary_images=[];


    public function store()
    {
        $this->validate([
            'title' => 'required|min:2|max:100',
            'description' => 'required|min:3|max:3000',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required',
        ]);

        $article = Article::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category_id,
            'user_id' => Auth::id(),
        ]);

        if (count($this->images) > 0) {
            foreach ($this->images as $image) {
                $article->images()->create(['path' => $image->store('images', 'public')]);
            }
        }

        session()->flash('message', 'Annuncio inserito con successo!');
        $this->cleanForm();
        
        return redirect()->route('articles.index');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.create-article', compact('categories'));
    }

    public function updatedTemporaryImages()
    {
        if ($this->validate([
            'temporary_images.*'=> 'image|max:1024',
            'temporary_images.'=> 'max:6'
        ]))
        foreach ($this->temporary_images as $image) {
            $this->images[] = $image;
        }
    }

    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }

    protected function cleanForm()
    {
        $this->title = '';
        $this->description = '';
        $this->category_id = '';
        $this->price = '';
        $this->images = [];
    }
}
