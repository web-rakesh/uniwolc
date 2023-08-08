<?php

namespace App\Http\Livewire\Admin\Blog;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Blog as BlogModel;
use Illuminate\Support\Facades\DB;

class Blog extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchItem;
    public $confirming;
    public function render()
    {
        $blogs = BlogModel::query()

            ->when($this->searchItem, function ($query, $search) {
                $query->where('title', 'LIKE', "%{$search}%");
            })
            ->paginate(10);
        return view('livewire.admin.blog.blog', [
            'blogs' => $blogs,
        ]);
    }

    public function confirmDelete($id)
    {
        $this->confirming = $id;
    }

    public function kill($id)
    {
        try {
            //code...
            DB::beginTransaction();
            $blog = BlogModel::find($id);
            if ($blog) {
                // Replace 'media_collection_name' with the actual name of your media collection.
                $blog->clearMediaCollection('blog_image');
            }
            BlogModel::destroy($id);
            session()->flash('message', 'Education Level Deleted Successfully.');
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            session()->flash(
                'message',
                $th->getMessage()
            );
        }
    }
}
