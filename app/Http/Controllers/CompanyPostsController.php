<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\PostedJob;
use App\Company;
class CompanyPostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index(Request $request)
    {
        $update = [
            'change' => false,
            'id'    =>  '',
        ];
        $request->session()->forget('formpart1');
        $request->session()->forget('formpart2');
        $request->session()->forget('formpart3');

        // $posts = Company::findorfail(Auth::user()->id)->Jobs()->paginate(5);
        $posts = PostedJob::where('company_id',Auth::user()->id)->paginate(5);
        // dd($posts()->where("id","96")->get());
        $request->session()->put('updateRequest',$update);
        return view('company.createPost',['posts'=>$posts]);
    }

    //custom resolver for ids

    public static function getPinCode($value = '141016')
    {
        if(is_numeric($value))
        {
            $url = 'https://api.postalpincode.in/pincode/'.$value;
        } else {
            $url = 'https://api.postalpincode.in/postoffice/'.$value;
        }

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch,CURLOPT_URL,$url);

        $output = json_decode(curl_exec($ch));
        curl_close($ch);

        if($output[0]->Status != 'Error')
            {$opt = $output[0]->PostOffice[0];
                return $opt->District.', '.$opt->State;
            }
        return $value;




    }

    public static function getJobType($value)
    {
        switch($value)
        {
            case  1 :
                return 'Full Time';
            break;
            case 2:
                return 'Part Time';
            break;
            default:
                return 'Both';
            break;
        }
    }

    public static function getSalaryType($value)
    {
        switch($value)
        {
            case  1 :
                return 'Monthly';
            break;
            case 2:
                return 'Annual';
            break;
            default:
                return '';
            break;
        }
    }

    public static function getCompanyType($value)
    {
        switch($value)
        {
            case  1 :
                return 'IT/ITes';
            break;
            case 2:
                return 'Accounts';
            break;
            default:
                return '';
            break;
        }
    }


    public function formpart1()
    {
        return view('company.createPostForm');
    }


    public function formpart1Post(Request $request)
    {
        $dd = $request->validate([
            'JobTitle' => 'required',
            'Location' => 'required',
            ]);
        $request->session()->put('formpart1',$dd);
        return redirect()->route('formpart2');
    }

    public function formpart2Post(Request $request)
    {
       //dd($request->all());
      $data =  $request->validate([
        'JobType' => 'required|integer',
        'salaryFrom' => 'required|numeric',
        'salaryTo'  =>  'required|numeric',
        'salarytime' => 'required|numeric',
        'Positions' => 'required|numeric',
       ]);

       $request->session()->put('formpart2',$data);
        return redirect()->route('formpart3');
    }

    public function formpart3Post(Request $request)
    {
       //dd($request->all());
      $data =  $request->validate([
        'IndustryType' => 'required',
        'JobSummary' => 'required',
        'responsibility'  =>  'required',
        'skills' => 'required',
       ]);
       $request->session()->put('formpart3',$data);
    //dd($data);
        return redirect()->route('review');
    }


    public function store(Request $request)
    {
        $data1 = $request->session()->get('formpart1');
        $data2 = $request->session()->get('formpart2');
        $data3 = $request->session()->get('formpart3');
        $new = array_merge($data1,$data2,$data3);
        //dd($new);
        Company::findorfail(Auth::user()->id)->Jobs()->create($new);
        $request->session()->forget('formpart1');
        $request->session()->forget('formpart2');
        $request->session()->forget('formpart3');
        return redirect()->route('postjob')->with('Success','Job post created !');
    }


    public function show($id, Request $request)
    {
        $update = [
            'change' => true,
            'id'    =>  $id,
        ];

        $post = PostedJob::findorfail($id);
        $form1 = [
            'JobTitle' => $post->JobTitle,
            'Location' => $post->Location,
        ];
        $form2 = [
            'JobType' =>    $post->JobType['id'],
            'salaryFrom' => $post->salaryFrom,
            'salaryTo'  =>  $post->salaryTo,
            'salarytime' => $post->salarytime,
            'Positions' => $post->Positions,
        ];
        $form3 = [
            'IndustryType' => $post->IndustryType,
            'JobSummary' => $post->JobSummary,
            'responsibility'  =>  $post->responsibility,
            'skills' => $post->skills,
        ];
        $request->session()->put('formpart1',$form1);
        $request->session()->put('formpart2',$form2);
        $request->session()->put('formpart3',$form3);
        $request->session()->put('updateRequest',$update);

        return view('company.showSingle',$post);
    }


    public function changeStatus(Request $request)
    {
        $status = $request->text == 'Open' ? 1 : 0;
        //dd(Company::findorfail(Auth::user()->id)->id);
        $row = PostedJob::Where('company_id',Company::findorfail(Auth::user()->id)->id)->findorfail($request->id);

        $row->job_status = $status;

         $row->save();

         return ['Success'=>'Status Changed Successfully!'];
    }


    public function update(Request $request)
    {
        $id = $request->session()->get('updateRequest')['id'];

        $getField = PostedJob::findorfail($id);

        $data1 = $request->session()->get('formpart1');
        $data2 = $request->session()->get('formpart2');
        $data3 = $request->session()->get('formpart3');
        $new = array_merge($data1,$data2,$data3);
        //dd($new);
        $getField->update($new);

        $request->session()->forget('formpart1');
        $request->session()->forget('formpart2');
        $request->session()->forget('formpart3');
        $request->session()->forget('updateRequest');

        return redirect()->route('postjob')->with('Success','Updated Successfully !');
    }

    //----------show jobseeker who applied for jobs

    public function showJobseekers(PostedJob $job)
    {
        if($job->company_id != Auth::user()->id)
        {return redirect()->route('postjob');}

        $jobseekers = $job->jobseekers()->where('type',1)->paginate(6);

        return view('company.candidatesAppliedForJobs',['jobseekers' => $jobseekers]);
    }

    public function destroy($id)
    {
        //
    }
}
