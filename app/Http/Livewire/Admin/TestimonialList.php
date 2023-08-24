<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Admin\Testimonial;
use Illuminate\Support\Facades\DB;

class TestimonialList extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchItem, $category;
    public $confirming;


    public function render()
    {
        $testimonials = Testimonial::query()

            ->when($this->searchItem, function ($query, $search) {
                $query->where('title', 'LIKE', "%{$search}%");
            })
            ->when($this->category, function ($query, $category) {
                $query->where('category', $category);
            })

            ->paginate(10);
        return view('livewire.admin.testimonial-list', [
            'testimonials' => $testimonials,
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
            Testimonial::destroy($id);

            $news = Testimonial::find($id);
            if ($news) {
                // Replace 'media_collection_name' with the actual name of your media collection.
                $news->clearMediaCollection('testimonial_image');
            }
            Testimonial::destroy($id);

            session()->flash('message', 'Testimonial Deleted Successfully.');
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
