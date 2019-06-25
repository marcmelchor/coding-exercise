<?php

namespace App\Http\Controllers;
use App\Job;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::orderBy('published_at', 'DESC')->paginate(5);

        return view('index', compact('jobs'));
    }

    public function show(Job $job)
    {
        return view('show', compact('job'));
    }

    public function create()
    {
        return view('create');
    }
    /*
    public function liveSearch(Request $request)
    {
        if ($request->ajax())
        {
            $output = '';
            $query = $request->get('query');

            if ($query != '')
            {
                $jobs = Job::where('title', 'like', '%'.$query.'%')->orderBy('published_at', 'DESC')->paginate(5)->get();
            } else {
                $jobs = Job::orderBy('published_at', 'DESC')->paginate(5)->get();
            }

            if ($jobs->count() > 0)
            {
                foreach($jobs as $job)
                {
                    $output .= '<div class="box">
                                  <p><b>Title:</b> '.$job->title.'</p>
                                  <p><b>Company:</b> '.$job->company->name.'</p>
                                  <a href="/job/'.$job->id.'">See details</a>
                                </div>
                                <div>
                                  {{ $jobs->links() }}
                                </div>';

                }
            } else {
                $output = '<div class="box">
                             <p><b>No Data Found</b></p>';
            }

            $data = array('jobsData'=> $output);

            echo json_encode($data);
        }
    }
    */

    public function apply(Job $job)
    {
        $job->update(['active'=> 0]);

        return redirect('/');
    }
}
