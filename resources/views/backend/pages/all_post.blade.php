@extends('backend.index')
@section('content')

<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
     
      Danh Mục Bài Viết
    </div>
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên Danh Mục</th>
            <th>Chi Tiết Danh Mục </th>
            <th>Tên Bài Viết</th>
            <th>Mô Tả</th>
            <th>Ảnh </th>
            <th>Bài Viết</th>
            <th>Lượt Xem</th>
            <th>Status</th>
            <th>ngày thêm</th>
            <th>Ngày Sửa</th>
            <th>Thao Tác</th>

            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($post as $data)
          <tr>
            <td>{{$data->id_categories}}</td>
            <td>{{$data->id_newcate}}</td>
            <td> <textarea style="width:200px;height:200px">{{$data->name}}</textarea></td>
            <td> <textarea style="width:200px;height:200px">{{$data->title}}</textarea>/td>
            @if($data->image)
            <td> <img src="{{URL::to('/backend/images/post/'.$data->image)}}" width="200px" height="200px"></td>
            @else
              <td>NULL</td>
            @endif

            <td>  <textarea style="width:400px;height:400px">{!! $data->content !!}</textarea></td>
            <td>{{$data->view}}</td>
            <td>{{$data->status}}</td>
            <td>{{$data->created_at}}</td>
            <td>{{$data->updated_at}}</td>
            <td>
              <a href="{{route('edit_post',['id'=>$data->id])}}">
              <i class="fa fa-check text-success text-active"></i>
              </a> <span>   </span>
            </td>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            {{ $post->links() }}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
</section>

@endsection