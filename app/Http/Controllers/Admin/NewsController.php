<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index()
    {
        return view('admin.news.index');
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'title' => 'bail|required|unique:blogs|max:255',
            'sub_title' => 'required',
            'description' => 'required',
            'content' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $news = News::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'sub_title' => $request->sub_title,
                'description' => $request->description,
                'content' => $request->content,
                'meta_tag' => $request->meta_tag,
                'meta_description' => $request->meta_description,
            ]);

            if ($request->has('news_image')) {
                $news->clearMediaCollection('news_image');
                $news->addMedia($request->news_image)->toMediaCollection('news_image');
            }

            DB::commit();
            return redirect()->route('admin.news.index')->with('success', 'News created successfully.');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->route('admin.news.index')->with('error', $e->getMessage());
        }
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        // return $news;
        // return $request->all();
        $request->validate([
            'title' => 'bail|required|unique:news|max:255',
            'sub_title' => 'required',
            'description' => 'required',
            'content' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $news->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'sub_title' => $request->sub_title,
                'description' => $request->description,
                'content' => $request->content,
                'meta_tag' => $request->meta_tag,
                'meta_description' => $request->meta_description,
            ]);

            if ($request->has('news_image')) {
                $news->clearMediaCollection('news_image');
                $news->addMedia($request->news_image)->toMediaCollection('news_image');
            }

            DB::commit();
            return redirect()->route('admin.news.index')->with('success', 'News Updated successfully.');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->route('admin.news.index')->with('error', $e->getMessage());
        }

        return view('admin.blog.show');
    }

    public function destroy()
    {
    }
}
