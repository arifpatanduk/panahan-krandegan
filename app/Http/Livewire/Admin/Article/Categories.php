<?php

namespace App\Http\Livewire\Admin\Article;

use App\Models\Admin\Article\Article;
use App\Models\Admin\Article\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Categories extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    // existing data
    public $category_id_used;

    // collect data
    public $name;
    public $new_name;

    // condition
    public $addMode = false;
    public $editMode = false;


    public function mount()
    {
        $this->category_id_used = Article::pluck('article_categories_id')->toArray();
    }

    public function render()
    {
        return view('livewire.admin.article.categories', [
            'categories' => Category::latest()->paginate(10)
        ]);
    }


    private function resetInputFields($mode)
    {
        switch ($mode) {
            case 'add':
                $this->name = '';
                break;

            case 'edit':
                $this->new_name = '';
                break;
        }
    }



    // create
    public function addCategory()
    {
        $this->addMode = true;
    }

    public function cancelAddCategory()
    {
        $this->addMode = false;
        $this->resetInputFields('add');
    }

    public function storeCategory()
    {
        $this->validate([
            'name' => 'required'
        ]);

        Category::create([
            'name' => $this->name
        ]);

        $this->emit('categoryUpdated'); // refresh
        $this->resetInputFields('add');
    }


    // update
    public function editCategory($category_id)
    {
        $this->editMode = $category_id;

        $category = Category::find($category_id);
        $this->new_name = $category->name;
    }

    public function cancelEditCategory($category_id)
    {
        $this->editMode = false;
        $this->resetInputFields('edit');
    }

    public function updateCategory($category_id)
    {
        $this->validate([
            'new_name' => 'required'
        ]);

        $category = Category::find($category_id);
        $category->name = $this->new_name;
        $category->save();

        $this->editMode = false;
        $this->emit('categoryUpdated'); // refresh
        $this->resetInputFields('edit');
    }



    // delete
    public function deleteCategory($category_id)
    {
        // check if category is used
        if (in_array($category_id, $this->category_id_used)) {
            $this->emit('cantDeleteCategory');
        } else {
            Category::destroy($category_id);
            $this->emit('categoryUpdated'); // refresh
        }
    }
}
