<html>
<head>

</head>
 <body>

    <div>
            <p align=center style='text-align:center;line-height:115%'><b
            style='font-weight:normal'><u><span style='font-size:18.0pt;
            line-height:115%;font-family:"Arial Black",sans-serif'>RESUME</span></u></b></p>

            @if($jobseeker->jobseekerProfile->profile_photo != null)

                <img height="100"  style="position:absolute; right:15%;" border="2" src='{{asset('images/profiles/').'/'.$jobseeker->jobseekerProfile->profile_photo}}' />

            @endif


            <p style='line-height:115%'><b style='font-weight:
            normal'><span style='font-size:16.0pt;line-height:115%'></span></b></p>

            <p><u><span style='font-size:14.0pt;font-family:Algerian;
            font-weight:bold'>{{$jobseeker->name}} </span></u><u><span style='font-size:18.0pt;
            font-family:SimSun;font-family:"Times New Roman";font-family:
            SimSun;font-weight:bold'></span></u></p>

            <p style='line-height:115%'><span style='font-weight:
            bold'>{{ucwords(str_replace(',',', ',(str_replace(', ',',',strtolower($jobseeker->JobseekerProfile->address)))))}}</span></p>

            <p style='margin-bottom:2.0pt;line-height:115%;background:white'><b><span
            style='color:black;'>Mobile +91</span></b><span
            style='color:black;font-weight:bold'> {{substr_replace($jobseeker->jobseekerProfile->mobile,'-',5,0)}}</span><span
            style='font-weight:bold'></span></p>

            <p style='margin-bottom:2.0pt;line-height:115%;background:white'><b><span
                style='color:black;'>Email </span></b><span
                style='color:black;font-weight:bold'> {{strtolower($jobseeker->email)}}</span><span
                style='font-weight:bold'></span></p>

            <p align=center style='text-align:center'><b></b></p>

            <p style=''><b style='font-weight:
            normal'><u><span style='font-family:Algerian'>Career Objective</span></u></b></p>

            <p style='text-align:justify'></p>

            <p style='text-align:justify;line-height:115%'>Aim to be
            associated with an esteemed and progressive organization that gives me the
            scope to apply my knowledge and engineering skills that dynamically works
            towards the growth of the organization.</p>

            <p style='text-align:justify;line-height:115%'></p>

            <p style='text-align:justify'><b style='font-weight:
            normal'><u><span style='font-family:Algerian'>Educational Qualification</span></u></b></p>

            <p style='text-align:justify'><b style='font-weight:
            normal'></b></p>

            <table border=1 cellspacing=0 cellpadding=0 width=624
            style='width:467.75pt;border-collapse:collapse;border:none;border:
            solid black .5pt;mso-padding-alt:0in 5.4pt 0in 5.4pt'>
            <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:31.75pt'>
            <td width=208 style='width:155.9pt;border:solid black 1.0pt;border:
            solid black .5pt;padding:0in 5.4pt 0in 5.4pt;height:31.75pt'>
            <p align=center style='text-align:center;line-height:115%'><b>Qualification</b></p>
            </td>
            <td width=208 style='width:155.9pt;border:solid black 1.0pt;border-left:none;
            mso-border-left-alt:solid black .5pt;border:solid black .5pt;
            padding:0in 5.4pt 0in 5.4pt;height:31.75pt'>
            <p align=center style='text-align:center;line-height:115%'><b>Board/
            University</b></p>
            </td>
            <td width=208 style='width:155.95pt;border:solid black 1.0pt;border-left:
            none;mso-border-left-alt:solid black .5pt;border:solid black .5pt;
            padding:0in 5.4pt 0in 5.4pt;height:31.75pt'>
            <p align=center style='text-align:center;line-height:115%'><b>Year
            of Passing</b></p>
            </td>
            </tr>
            <tr style='mso-yfti-irow:1;height:31.75pt'>
            <td width=208 style='width:155.9pt;border:solid black 1.0pt;border-top:none;
            mso-border-top-alt:solid black .5pt;border:solid black .5pt;
            padding:0in 5.4pt 0in 5.4pt;height:31.75pt'>
            <p align=center style='text-align:center;line-height:115%'><b>{{$jobseeker->jobseekerEducation->qualification}}</b></p>
            </td>
            <td width=208 style='width:155.9pt;border-top:none;border-left:none;
            border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;mso-border-top-alt:
            solid black .5pt;mso-border-left-alt:solid black .5pt;border:solid black .5pt;
            padding:0in 5.4pt 0in 5.4pt;height:31.75pt'>
            <p align=center style='text-align:center;line-height:115%'>{{$jobseeker->jobseekerEducation->university}}</p>
            </td>
            <td width=208 style='width:155.95pt;border-top:none;border-left:none;
            border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;mso-border-top-alt:
            solid black .5pt;mso-border-left-alt:solid black .5pt;border:solid black .5pt;
            padding:0in 5.4pt 0in 5.4pt;height:31.75pt'>
            <p align=center style='text-align:center;line-height:115%'>{{date('Y',strtotime($jobseeker->jobseekerEducation->year))}}</p>
            </td>
            </tr>

            </table>



            <p style='text-align:justify'><b style='font-weight:
            normal'><u><span style='font-family:Algerian'>Knowledge &amp; skills </span></u></b></p>

            @foreach ($jobseeker->keyskills as $item)
                <li style="padding-left:20px">{{$item->keyskill}}</li>
            @endforeach

            <p style='text-align:justify'><b style='font-weight:
            normal'><u><span style='font-family:Algerian'>Experience</span></u></b></p>

            <ol>
            @foreach($jobseeker->jobseekerExperience->where('currently_working',1) as $job)
            <li >
                Currently working as a <i>{{$job->job_role}}</i> at <b>
                {{$job->company_name}} </b> {{($job->experience_year == null || $job->experience_year < 1) ? "" : '( '.$job->experience_year." Year"}} {{($job->experience_month == null || $job->experience_month < 1) ? "" : $job->experience_month." Months )"}}
                <span onclick="handler({{$job->id}})" style="cursor:pointer" class="fas fa-trash-alt red-ico float-right "></span>
            </li>
            @endforeach
            @foreach($jobseeker->jobseekerExperience->where('currently_working',0) as $job)
                <li >
                   Works as <i>{{$job->job_role}}</i> at <b>
                    {{$job->company_name}} </b> {{($job->experience_year == null || $job->experience_year < 1) ? "" : '( '.$job->experience_year." Year"}} {{($job->experience_month == null || $job->experience_month < 1) ? "" : $job->experience_month." Months )"}}
                    <span onclick="handler({{$job->id}})" style="cursor:pointer" class="fas fa-trash-alt red-ico float-right "></span>
                </li>
            @endforeach
            </ol>
            <p style=''><b style='font-weight:
                normal'><u><span style='font-family:Algerian'>Declaration</span></u></b></p>

                <p style='text-align:justify'></p>

                <p style='text-align:justify;line-height:115%'>I, hereby declare that all the information given by me is true and best to my knowledge.</p>
                <br/>
                <br/>
            <p><b>Date</b> :</span><span style='mso-tab-count:1'>  </span><span
            style='font-family:"Calibri",sans-serif;font-family:"Times New Roman"'>{{date('d-M-Y')}}</span></p>


            <p style='text-align:justify;line-height:115%;tab-stops:2.5in 3.0in'><span
        ><b>Place :</b></span><b> _____________ <span style='mso-tab-count:1'>                              </span><span
            style='mso-tab-count:4'>                                                </span><span
            style='text-transform:uppercase'>({{$jobseeker->name}})</span></b><span style='font-family:
            Algerian'></span></p>

    </div>

    </body>

    </html>
