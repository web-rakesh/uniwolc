<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Testimonial;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.testimonial.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();
        $validated = $request->validate([
            'category' => 'required',
            'label' => 'required|max:255',
            'title' => 'required|max:255',
            'content' => 'required',
            'testimonial_image' => 'required'
        ]);


        try {
            //code...
            $request['slug'] = Str::slug($request->title);
            DB::beginTransaction();
            $testimonial = Testimonial::create($request->all());

            if ($request->hasFile('testimonial_image')) {
                $testimonial->addMedia($request->file('testimonial_image'))->toMediaCollection('testimonial_image');
            }

            DB::commit();
            return redirect()->route('admin.testimonial.index')->with('success', 'Testimonial created successfully');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->route('admin.testimonial.index')->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        // return $testimonial;
        return view('admin.testimonial.create', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        //
        // return $request->all();
        $validated = $request->validate([
            'category' => 'required',
            'label' => 'required|max:255',
            'title' => 'required|max:255',
            'content' => 'required',
            'testimonial_image' => 'nullable|mimes:jpeg,jpg,png,gif|max:100000'
        ]);

        try {
            //code...
            DB::beginTransaction();
            $testimonial->update($request->all());

            if ($request->hasFile('testimonial_image')) {
                $testimonial->clearMediaCollection('testimonial_image');
                $testimonial->addMedia($request->file('testimonial_image'))->toMediaCollection('testimonial_image');
            }

            DB::commit();
            return redirect()->route('admin.testimonial.index')->with('success', 'Testimonial updated successfully');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->route('admin.testimonial.index')->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        //
    }
}
