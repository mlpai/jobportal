@extends('company.adminlte')

@section('screen','Jobs Posted')

@section('mainSection')

    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Recents Jobs Posted by You </h3>

          <div class="card-tools">
            <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
              <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

              <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive no-padding">
          <table class="table table-hover">

            <tbody>
            @if($posts->count() > 0)

            <tr>
              <th>#</th>
              <th>Job Title</th>
              <th>Location</th>
              <th>Created</th>
              <th>Candidates</th>
              <th>Views</th>
              <th>Status</th>
            </tr>
                @foreach ($posts as $key=>$post)
                <tr>
                    <td>{{$posts->firstItem()+$key}}</td>
                    <td><a data-toggle="tooltip" title="Edit this post" href="{{Route('showpost').'/'.$post->id.'/'.str_slug($post->JobTitle)}}" >{{$post->JobTitle}}</a></td>
                    <td>{{$post->Location}}</td>
                    <td>{{date('d M Y',strtotime($post->created_at))}}</td>
                <td>@if($post->jobseekers()->where('type',1)->count() > 0) <a href="{{route('candidates',$post->id)}}/{{str_slug($post->JobTitle)}}"> {{$post->jobseekers()->where('type',1)->count()}} Candidated </a> @else 0 Candidate @endif</td>
                    <td>{{$post->views}}</td>
                    <td>
                    <job-status post_id='{{$post->id}}' text = '{{$post->job_status}}' ></job-status>
                    </td>
                </tr>
                @endforeach
            <tr>
            <th colspan="6">{{$posts->links()}}</th>
            <th><a class="btn btn-primary btn-block" href="{{Route('formpart1')}}"><i class="fas fa-plus"></i> Create Post</a></button></th>
            </tr>
            @else
                <tr> <th class="text-center"> <big> No Job Created Yet </big> <a class="btn btn-primary btn-block" href="{{Route('formpart1')}}"><i class="fas fa-plus"></i> Create Post</a></button></th>
                </tr>
            @endif
          </tbody></table>
        </div>
        <!-- /.card-body -->
      </div>

@endsection


                    @push('scripts')
                        @if (Session::has('Success'))
                        <script>
                            swal.fire({
                                title: '{{Session('Success')}}',
                                type: 'Success',
                                confirmButtonText: 'OK'
                                });
                        </script>
                        @endif
                    @endpush
