@extends('admin.master')

@section('title','Companies Summary')

@section('screen','Company Info')

@section('mainSection')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{$company->links()}}
                <table id="example1" class="table  table-striped dataTable" role="grid" aria-describedby="example1_info">
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" >#</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" >Company</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" >Address</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" >Jobs</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" >Created</th>
                            <th style="width:150px" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" >Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($company as $key => $item)
                            <tr role="row" class="odd">
                            <td class="sorting_1">{{++$key}}</td>
                            <td><b><a href="{{route('companies.show',[$item->id])}}" >{{$item->CompanyProfile->CompanyName}}</a></b></td>
                            <td>{{ucwords(strtolower($item->CompanyProfile->CompanyAddress))}}</td>
                            <td>{{$item->Jobs()->count()}}</td>
                            <td>{{date('d-M-y',strtotime($item->created_at))}}</td>
                            <td><User-Status  post_id='{{$item->id}}' text = '{{$item->userstatus}}' ></User-Status></td>
                            </tr>
                            @endforeach

                    </tbody>
                  </table>
                  {{$company->links()}}
            </div>
        </div>
    </div>

@endsection
