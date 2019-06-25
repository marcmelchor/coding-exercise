<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Job;
use App\Company;

class JobController extends Controller
{
    public function index()
    {
        return view('index');
    }

    function liveSearch(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $jobs = Job::where('title', 'like', '%'.$query.'%')
                             ->orderBy('published_at', 'DESC')
                             ->paginate(5);

            } else {
                $jobs = Job::orderBy('published_at', 'DESC')->paginate(5);
            }

            if($jobs->count() > 0)
            {
                foreach($jobs as $job)
                {
                    $output .= '<div class="box">
                                  <p><b>Title:</b> '.$job->title.'</p>
                                  <p><b>Company:</b> '.$job->company->name.'</p>
                                  <a href="/job/'.$job->id.'">See details</a>
                                </div>';

                }
                $output .= '<div style="margin-bottom: 1em">
                             '.$jobs->links().'
                            </div>';
            } else {
                $output = '<p><b>No Data Found</b></p>';
            }

            $data = array('table_jobs'=> $output);

            echo json_encode($data);
        }
    }

    public function show(Job $job)
    {
        return view('show', compact('job'));
    }

    public function create()
    {
        $companies = Company::all();

        return view('create', compact('companies'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title'=> ['required', 'max:50'],
            'description' => ['required'],
            'company_id'=> ['required'],
            'location'=> ['required']
        ]);

        Job::create($attributes);

        return redirect('/');
    }

    public function apply(Job $job)
    {
        $job->update(['active'=> 0]);

        return redirect('/');
    }
}
