<?php

namespace App\Http\Livewire\Admin\Article;

use App\Models\Admin\Article\Article;
use App\Models\Admin\Article\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class ArticleList extends Component
{
    use WithFileUploads;

    // existing data
    public $article;
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
    public $deleteMode = false;


    public function mount()
    {
        $this->categories = Category::all();
        // $this->articles = Article::orderBy('id', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.admin.article.article-list', [
            'articles' => Article::latest()->paginate(10)
        ]);
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
            'title' => 'required|unique:articles',
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

        $slug = Str::slug($this->title);

        // store to db
        Article::create([
            'admin_id' => Auth::user()->id,
            'article_categories_id' => $this->category_id,
            'title' => $this->title,
            'content' => $this->content,
            'image' => $image,
            'status' => '1',
            'slug' => $slug,
        ]);

        $this->addMode = false;
        $this->emit('articleUpdated', 'Artikel berhasil ditambahkan!');

        $this->resetInputFields();
    }


    // manage 
    public function manageArticle($article_id)
    {
        $this->manageMode = $article_id;

        $this->article = Article::find($article_id);

        $this->title = $this->article->title;
        $this->content = $this->article->content;
        $this->image = $this->article->image;
        $this->category_id = $this->article->article_categories_id;
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

        $image = $this->image;

        if ($this->new_image) {
            // dd($this->new_image);
            $this->validate([
                'new_image' => 'required|image'
            ]);


            // convert double to int
            $width = (int) round($this->width);
            $height = (int) round($this->height);
            $x = (int) round($this->x);
            $y = (int) round($this->y);

            $croppedImage = Image::make($this->new_image->getRealPath());
            $croppedImage->crop($width, $height, $x, $y);
            $croppedImage->save();

            // update image to storage
            $directory = 'public/article/image';
            $filename =  time() . '_' . Auth::user()->id  . '_' . $this->new_image->getClientOriginalName();
            $path = $directory . $filename;
            $image = Storage::disk('local')->put($path, $croppedImage, 'public');
            $image = Storage::disk('local')->url($path);

            // delete old image
            Storage::disk('local')->delete($this->image);
        }

        $slug = Str::slug($this->title);

        // update to db
        $article = Article::find($article_id);
        $article->title = $this->title;
        $article->slug = $slug;
        $article->content = $this->content;
        $article->image = $image;
        $article->article_categories_id = $this->category_id;
        $article->save();

        $this->manageMode = false;
        $this->emit('articleUpdated', 'Artikel berhasil diupdate!');

        $this->resetInputFields();
    }


    // delete
    public function deleteArticle($article_id)
    {
        $this->deleteMode = $article_id;
    }

    public function cancelDeleteArticle($article_id)
    {
        $this->deleteMode = false;
    }

    public function destroyArticle($article_id)
    {
        $this->article->delete();
        $this->emit('articleUpdated', 'Artikel berhasil dihapus!');
    }
}
