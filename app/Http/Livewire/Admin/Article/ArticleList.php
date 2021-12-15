<?php

namespace App\Http\Livewire\Admin\Article;

use App\Models\Admin\Article\Article;
use App\Models\Admin\Article\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;

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

    public $new_image;

    public $category_id;


    // image property
    public $x;
    public $y;
    public $width;
    public $height;


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


        // convert double to int
        $width = (int) round($this->width);
        $height = (int) round($this->height);
        $x = (int) round($this->x);
        $y = (int) round($this->y);

        $croppedImage = Image::make($this->image->getRealPath());
        $croppedImage->crop($width, $height, $x, $y);
        $croppedImage->save();

        // store image to storage
        $directory = 'public/article/image';
        $filename =  time() . '_' . Auth::user()->id  . '_' . $this->image->getClientOriginalName();
        $path = $directory . $filename;
        $image = Storage::disk('local')->put($path, $croppedImage, 'public');
        $image = Storage::disk('local')->url($path);

        // $image =  $croppedImage->storePublicly('public/article/image', 'local');
        // $image = Storage::disk('local')->url($image);

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


    // manage 
    public function manageArticle($article_id)
    {
        $this->manageMode = $article_id;

        $article = Article::find($article_id);

        $this->title = $article->title;
        $this->content = $article->content;
        $this->image = $article->image;
        $this->category_id = $article->article_categories_id;
    }

    public function cancelManageArticle()
    {
        $this->manageMode = false;
        $this->resetInputFields();
    }

    public function updateArticle($article_id)
    {
        $this->validate([
            'category_id' => 'required',
            'title' => 'required',
            'content' => 'required',
        ]);

        if ($this->new_image) {
            // dd($this->new_image);
            $this->validate([
                'new_image' => 'required|image'
            ]);

            // update image to storage
            $image =  $this->new_image->storePublicly('public/article/image', 'local');
            $image = Storage::disk('local')->url($image);

            // delete old image
            Storage::disk('local')->delete($this->image);
        }


        // update to db
        $article = Article::find($article_id);
        $article->title = $this->title;
        $article->content = $this->content;
        $article->image = $image;
        $article->article_categories_id = $this->category_id;
        $article->save();

        $this->manageMode = false;
        $this->emit('articleUpdated', 'Artikel berhasil diupdate!');

        $this->resetInputFields();
    }


    // delete


    public function deleteArticle()
    {
        # code...
    }
}
