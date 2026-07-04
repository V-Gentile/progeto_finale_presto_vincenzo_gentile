<?php

namespace App\Models;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;
use App\Models\Image;

class Article extends Model
{
    use Searchable;

    protected $fillable = ['title', 'description', 'price', 'category_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function toSearchableArray(): array
    {
        return [
            'id' =>$this->id,
            'title' =>$this->title,
            'description' =>$this->description,
            'category' =>$this->category
        ];
    }

    public function setAccepted($value)
    {
        $this->is_accepted = $value;
        $this->save();
        return true;

    }

    public static function toBeRevisedCount()
    {
        return Article::where('is_accepted', null)->count();
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }
}
