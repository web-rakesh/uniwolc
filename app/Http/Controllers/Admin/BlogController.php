<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index()
    {
        return view('admin.blog.index');
    }

    public function create()
    {
        return view('admin.blog.create');
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
            $blog = Blog::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'sub_title' => $request->sub_title,
                'description' => $request->description,
                'content' => $request->content,
                'meta_tag' => $request->meta_tag,
                'meta_description' => $request->meta_description,
            ]);

            if ($request->has('blog_image')) {
                $blog->clearMediaCollection('blog_image');
                $blog->addMedia($request->blog_image)->toMediaCollection('blog_image');
            }

            DB::commit();
            return redirect()->route('admin.blog.index')->with('success', 'Blog created successfully.');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->route('admin.blog.index')->with('error', $e->getMessage());
        }
    }

    public function edit(Blog $blog)
    {
        // return $blog;
        return view('admin.blog.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
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
            $blog->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'sub_title' => $request->sub_title,
                'description' => $request->description,
                'content' => $request->content,
                'meta_tag' => $request->meta_tag,
                'meta_description' => $request->meta_description,
            ]);

            if ($request->has('blog_image')) {
                $blog->clearMediaCollection('blog_image');
                $blog->addMedia($request->blog_image)->toMediaCollection('blog_image');
            }

            DB::commit();
            return redirect()->route('admin.blog.index')->with('success', 'Blog Updated successfully.');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->route('admin.blog.index')->with('error', $e->getMessage());
        }

        return view('admin.blog.show');
    }

    public function destroy()
    {
        return view('admin.blog.destroy');
    }
}
