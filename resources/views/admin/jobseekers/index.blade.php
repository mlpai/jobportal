@extends('admin.master')

@section('title','Jobseekers Details')

@section('screen','Jobseekers Info')

@section('mainSection')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{$jobseeker->links()}}
                <table id="example1" class="table  table-striped dataTable" role="grid" aria-describedby="example1_info">
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" >#</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" >Name</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" >Address</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" >Applied Jobs</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" >Saved Jobs</th>
                            <th style="width:150px" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" >Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jobseeker as $key => $item)
                            <tr role="row" class="odd">
                            <td class="sorting_1">{{++$key}}</td>
                            <td><b><a href="{{route('jobseekers.show',[$item->id])}}" >{{$item->name}}</a></b></td>
                            <td>{{ucwords(strtolower($item->JobseekerProfile->address))}}</td>
                            <td>{{$item->posts()->where('type',1)->count()}}</td>
                            <td>{{$item->posts()->where('type',0)->count()}}</td>
                            <td><User-Status  post_id='{{$item->id}}' text = '{{$item->userstatus}}' ></User-Status></td>
                            </tr>
                            @endforeach

                    </tbody>
                  </table>
                  {{$jobseeker->links()}}
            </div>
        </div>
    </div>

@endsection
