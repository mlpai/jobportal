@component('mail::message')
# Dear {{$jobseeker->name}},

You have applied for {{$post->JobTitle}} that was posted at {{date('d-m-Y h:m:s A',strtotime($post->created_at))}} by {{$post->company->name}}

@component('mail::button', ['url' => route('dashboard')])
    View Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
