<?php

namespace App\Http\Livewire\Admin\News;

use App\Models\News;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class NewsList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchItem;

    public $confirming;

    public function render()
    {
        $news = News::query()

            ->when($this->searchItem, function ($query, $search) {
                $query->where('title', 'LIKE', "%{$search}%");
            })
            ->paginate(10);
        return view('livewire.admin.news.news-list', [
            'news' => $news,
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
            News::destroy($id);

            $news = News::find($id);
            if ($news) {
                // Replace 'media_collection_name' with the actual name of your media collection.
                $news->clearMediaCollection('news_image');
            }
            News::destroy($id);

            session()->flash('message', 'Education Level Deleted Successfully.');
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();

            dd($th->getMessage());
            session()->flash(
                'message',
                $th->getMessage()
            );
        }
    }
}
