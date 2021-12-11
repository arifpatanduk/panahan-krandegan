<?php

namespace App\Http\Livewire\Admin\Article;

use App\Models\Admin\Article\Article;
use App\Models\Admin\Article\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class ArticleList extends Component
{
    use WithFileUploads;

    // existing data
    public $articles;
    public $categories;

    // collect data
    public $title;
    public $content;
    public $image;

    public $category_id;

    // condition
    public $addMode = false;

    public $manageMode = false;


    public function mount()
    {
        $this->categories = Category::all();
        $this->articles = Article::all();
    }

    public function render()
    {
        return view('livewire.admin.article.article-list');
    }

    private function resetInputFields()
    {
        $this->title = '';
        $this->content = '';
        $this->image = '';
        $this->category_id = '';
    }



    // create
    public function addArticle()
    {
        $this->addMode = true;
    }

    public function cancelAddArticle()
    {
        $this->addMode = false;
        $this->resetInputFields();
    }

    public function storeArticle()
    {
        $this->validate([
            'category_id' => 'required',
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image',
        ]);

        // store image to storage
        $image =  $this->image->storePublicly('article/image', 'local');

        // store to db
        Article::create([
            'admin_id' => Auth::user()->id,
            'article_categories_id' => $this->category_id,
            'title' => $this->title,
            'content' => $this->content,
            'image' => $image,
            'status' => '1',
        ]);

        $this->addMode = false;
        $this->emit('articleUpdated', 'Artikel berhasil ditambahkan!');

        $this->resetInputFields();
    }
}
