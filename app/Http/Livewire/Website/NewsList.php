<?php

namespace App\Http\Livewire\Website;

use App\Models\News;
use Livewire\Component;
use Livewire\WithPagination;

class NewsList extends Component
{
    use WithPagination;
    public $perPage = 6;

    public function render()
    {
        $news = News::latest()->paginate($this->perPage);
        return view('livewire.website.news-list', ['news' => $news]);
    }

    public function loadMore()
    {
        $this->perPage += 6;
        // dd($this->perPage);
    }
}
