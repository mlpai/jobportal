@component('mail::message')
# Dear {{$jobseeker->name}},

There is a new opening for the job {{$job->JobTitle}}.

@component('mail::button', ['url' => route('firstJob',[$job->id,str_slug($job->JobTitle)])])
View Job Summary
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
