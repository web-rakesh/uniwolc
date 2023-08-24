<?php

namespace App\Http\Controllers\Website;

use App\Models\Blog;
use App\Models\News;
use Illuminate\Http\Request;
use App\Models\EducationPartner;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\EducationPartnerFormMail;
use App\Models\Admin\Testimonial;

class WebsiteController extends Controller
{
    public function index()
    {
        $testimonial['education'] = Testimonial::where('category', '3')->get();
        $testimonial['recruitment'] = Testimonial::where('category', '2')->get();
        $testimonial['student'] = Testimonial::where('category', '1')->get();
        return view('website.landing', compact('testimonial'));
    }

    public function recruitersPartner()
    {
        $testimonial['recruitment'] = Testimonial::where('category', '2')->get();
        return view('website.recruiters', compact('testimonial'));
    }

    public function about()
    {
        return view('website.about');
    }

    public function contact()
    {
        return view('website.contact');
    }

    public function services()
    {
        return view('website.services');
    }

    public function portfolio()
    {
        return view('website.portfolio');
    }

    public function blog()
    {
        return view('website.blog');
    }

    public function blogDetails($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        $recentBlogs = Blog::latest()->whereNot('slug', $slug)->take(3)->get();
        return view('website.blog-details', compact('blog', 'recentBlogs'));
    }

    public function news()
    {
        return view('website.news');
    }

    public function newsDetails($slug)
    {
        $news = News::where('slug', $slug)->first();
        $recentNews = News::latest()->whereNot('slug', $slug)->take(3)->get();
        return view('website.news-details', compact('news', 'recentNews'));
    }

    public function elements()
    {
        return view('website.elements');
    }

    public function educationPartner()
    {
        $testimonial['education'] = Testimonial::where('category', '3')->get();
        $countries = DB::table('countries')->get();
        return view('website.education-partners', compact('countries', 'testimonial'));
    }

    public function educationPartnerStore(Request $request)
    {

        // Validate the incoming data
        $request->validate([
            'country' => 'required|string|max:25',
            'school_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required| email:rfc,dns|max:255',
            'phone_number' => 'required|max:15',
            'contact_title' => 'required|string|max:255',
            'is_apply' => 'required',
            'refer_name' => 'required|string|max:255',
            'refer_email' => 'required|email|max:255',
            'comment' => 'string|max:255',
            'agree' => 'required',
        ]);

        // Create a new education partner

        try {
            //code...
            DB::beginTransaction();
            $request['name'] = $request->first_name . ' ' . $request->last_name;
            $partnerData = EducationPartner::create($request->all());
            Mail::to($partnerData->email)->send(new EducationPartnerFormMail($partnerData));
            DB::commit();
            return response()->json(['message' => 'Form submitted successfully']);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return response()->json(['message' => $th->getMessage()], 201);
        }

        return $request;
    }
}
