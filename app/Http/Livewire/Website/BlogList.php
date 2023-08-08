<?php

namespace App\Http\Livewire\Website;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;

class BlogList extends Component
{
    use WithPagination;
    public $perPage = 6;

    public function render()
    {
        $blogs = Blog::latest()->paginate($this->perPage);
        return view('livewire.website.blog-list', ['blogs' => $blogs]);
    }

    public function loadMore()
    {
        $this->perPage += 6;
        // dd($this->perPage);
    }
}
