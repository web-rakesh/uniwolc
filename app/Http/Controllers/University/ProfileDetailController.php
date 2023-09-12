<?php

namespace App\Http\Controllers\University;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\University\ProfileDetail;
use App\Http\Requests\StoreProfileDetailRequest;
use App\Http\Requests\UpdateProfileDetailRequest;

class ProfileDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profileDetail = ProfileDetail::where('user_id', Auth::user()->id)->first();
        $countries = DB::table('countries')->get();
        return view('university.profile', compact('profileDetail', 'countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfileDetailRequest $request)
    {
        // return $request->all();

        try {
            //code...
            $request['user_id'] = Auth::user()->id;
            $request['slug'] = Str::slug($request->university_name);
            // return $request->all();
            DB::beginTransaction();

            $universityProfile =  ProfileDetail::updateOrCreate(
                [
                    'user_id' => Auth::user()->id,

                ],
                $request->all()
            );

            if ($request->has('university_picture')) {
                $universityProfile->clearMediaCollection('university-picture');
                foreach ($request->university_picture as $image) {
                    $universityProfile->addMedia($image)->toMediaCollection('university-picture');
                }
            }
            if (!auth()->user()->profile_is_updated) {
                User::where('id', auth()->user()->id)->update([
                    'profile_is_updated' => 1
                ]);
            }

            DB::commit();

            return redirect()->back()->with('success', 'Profile updated successfully.');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            // return $th->getMessage();
            return redirect()->back()->with('error', 'Something went wrong. Please try again later.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ProfileDetail $profileDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProfileDetail $profileDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileDetailRequest $request, ProfileDetail $profileDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProfileDetail $profileDetail)
    {
        //
    }
}
