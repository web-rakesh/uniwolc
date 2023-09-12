<?php

namespace App\Http\Controllers\Website;

use App\Models\Blog;
use App\Models\City;
use App\Models\News;
use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\EducationLevel;
use App\Models\EducationPartner;
use App\Models\Admin\Testimonial;
use App\Models\University\Program;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Models\CategoriesOfEducation;
use App\Mail\EducationPartnerFormMail;
use App\Models\University\ProfileDetail;

class WebsiteController extends Controller
{
    public function index()
    {
        $testimonial['education'] = Testimonial::where('category', '3')->get();
        $testimonial['recruitment'] = Testimonial::where('category', '2')->get();
        $testimonial['student'] = Testimonial::where('category', '1')->get();

        $blogs = Blog::latest()->take(3)->get();
        return view('website.landing', compact('testimonial', 'blogs'));
    }

    public function recruitersPartner()
    {
        $testimonial['recruitment'] = Testimonial::where('category', '2')->get();
        return view('website.recruiters', compact('testimonial'));
    }
    public function schools()
    {
        $testimonial['recruitment'] = Testimonial::where('category', '2')->get();
        return view('website.recruiters', compact('testimonial'));
    }

    public function students()
    {
        $testimonial['student'] = Testimonial::where('category', '1')->get();
        return view('website.students', compact('testimonial'));
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

    public function life()
    {
        $blogs = Blog::latest()->take(6)->get();
        return view('website.life', compact('blogs'));
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

    public function ukResources()
    {
        return view('website.uk-resourse');
    }

    public function auResources()
    {
        return view('website.au-resourse');
    }

    public function uniwolcFees()
    {
        return view('website.uniwolc-fees');
    }

    public function program()
    {
        $countries = Country::all();
        $educationLevels = CategoriesOfEducation::with('educationLevels')->get();
        $programs = Program::latest()->paginate(10);
        $programCount = Program::count();
        $schoolCount = ProfileDetail::count();
        $schools = ProfileDetail::select('id', 'university_name')->latest()->get();
        return view('website.program.program', compact('programs', 'programCount', 'schoolCount', 'countries', 'educationLevels', 'schools'));
    }

    public function programList()
    {
        $programs = Program::latest()->paginate(10);
        return view('website.program.program-list', compact('programs'))->render();
    }

    public function studySearch(Request $request)
    {
        $searchTerm = strtolower($request->get('searchTerm'));
        if ($searchTerm) {
            $studyResult = Program::where('program_title', 'LIKE', '%' . $searchTerm . '%')->get();
            return view('website.program.study-search', compact('studyResult'))->render();
        }
    }

    public function studySchoolLocation(Request $request)
    {
        $searchTerm = $request->get('searchTerm');
        // dd($searchTerm);
        $schoolLocationResult = ProfileDetail::query()

            ->when($searchTerm, function ($query, $searchTerm) {
                $query->where('university_name', 'LIKE', "%{$searchTerm}%");
                $query->orWhere('location', 'LIKE', "%{$searchTerm}%");
                // dd($query->toSql());
            })
            ->latest()
            ->take(50)
            ->get();

        return view('website.program.school-location', compact('schoolLocationResult'))->render();
    }

    public function studySchoolLocationStudySearch(Request $request)
    {
        // return $request;
        $study = $request->study;
        $schoolLocation = $request->location;
        $schoolLocationResult = Program::query()

            ->when($schoolLocation, function ($query) use ($schoolLocation) {
                $query->whereHas('university', function ($query) use ($schoolLocation) {

                    $query->where('university_name', 'LIKE', "%{$schoolLocation}%");
                    // $query->orWhere('location', 'LIKE', "%{$schoolLocation}%");
                });
            })
            ->when($study, function ($query, $study) {
                $query->where('program_title', 'LIKE', "%{$study}%");
                $query->orWhere('program_level', 'LIKE', "%{$study}%");
                $query->orWhere('program_length', 'LIKE', "%{$study}%");
            })
            ->latest()
            ->paginate(10);

        return view('website.program.program-list', ['programs' => $schoolLocationResult])->render();
    }

    public function programEligibility(Request $request)
    {
        // return $request;

        $education_country = $request->education_country;
        $education_level = $request->education_level;
        $english_exam_type = $request->english_exam_type;
        $permit_visa = $request->permit_visa;
        $schoolLocationResult = Program::query()

            ->when($education_country, function ($query) use ($education_country) {
                $query->whereHas('university', function ($query) use ($education_country) {
                    $query->where('country', $education_country);
                });
            })
            ->when($permit_visa, function ($query) use ($permit_visa) {
                $query->whereHas('university', function ($query) use ($permit_visa) {
                    $query->where('permit_visa', $permit_visa);
                });
            })
            ->when($education_level, function ($query, $education_level) {
                $query->where('program_level', 'LIKE', "%{$education_level}%");
            })
            ->latest()
            ->paginate(10);

        return view('website.program.program-list', ['programs' => $schoolLocationResult])->render();
    }

    public function programSchoolProgramSearch(Request $request)
    {
        // return $request;
        $school_country = $request->school_country;
        $provinces_state = $request->provinces_state;
        $campus_city = $request->campus_city;
        $school_type = $request->school_type;
        $program_education_level = $request->program_education_level;

        $schoolLocationResult = Program::query()

            ->when($school_type, function ($query) use ($school_type) {
                $query->whereHas('university', function ($query) use ($school_type) {
                    $query->whereIn('institution_type', $school_type);
                });
            })

            ->when($school_country, function ($query) use ($school_country, $provinces_state, $campus_city) {
                $query->whereHas('university', function ($query) use ($school_country, $provinces_state, $campus_city) {
                    $query->where('country', $school_country);
                    $query->orWhere('state', $provinces_state);
                    $query->orWhere('city', $campus_city);
                });
            })
            ->when($program_education_level, function ($query, $program_education_level) {
                $query->where('program_level', 'LIKE', "%{$program_education_level}%");
            })
            ->latest()
            ->paginate(10);

        return view('website.program.program-list', ['programs' => $schoolLocationResult])->render();
    }

    public function getCountry(Request $request)
    {
        $data['states'] = State::where("country_id", $request->id_country)
            ->get(["name", "id"]);
        $data['currency'] =  get_currency($request->id_country);
        return response()->json($data);
    }

    public function getCity(Request $request)
    {
        $data['cities'] = City::where("state_id", $request->state_id)
            ->get(["name", "id"]);

        return response()->json($data);
    }
}
