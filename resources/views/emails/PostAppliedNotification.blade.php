@component('mail::message')
# Dear {{$post->company->name}},

{{$jobseeker->name}} looking for the {{$post->JobTitle}} that you have posted at {{date('d-m-Y h:m:s A',strtotime($post->created_at))}}

@component('mail::button', ['url' => route('jobseekerpdf',sha1("#$^*^&%ASKj54".$jobseeker->id."$^*^&%A@SKj54"))])
    Download {{$jobseeker->name}} Profile
@endcomponent

@component('mail::button', ['url' => route('dashboard')])
View Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
