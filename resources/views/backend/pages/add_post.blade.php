@extends('backend.index')
@section('content')
<section id="main-content">
	<section class="wrapper">
	<div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm Bài Viết
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form action="{{route('save_post')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="cate">Danh mục</label>
                                        <select name ='category' class="form-control input-sm m-bot15">
                                            @foreach($category as $key => $value)
                                                <option value="{{$value->id}}">{{$value->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="cate"> Chi Tiết Danh mục</label>
                                        <select name ='new_cate' class="form-control input-sm m-bot15" required>
                                            @foreach($newcate as $key => $value)
                                                <option value="{{$value->id}}">{{$value->name}}</option >
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tên Bài Viết</label>
                                        <input type="text" class="form-control" name="name" placeholder="nhập tên" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Mô Tả Bài Viết</label>
                                        <input type="text" class="form-control" name="title" placeholder="nhập mô tả" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="img">Hình Ảnh</label>
                                        <input type="file" name = "image" accept="image/png,image/jpg,image/web,image/jpeg,image/gif" >
                                    </div>
                                    <div class="form-group">
                                        <select name ='status' class="form-control input-sm m-bot15">
                                            <option value="1">Ản</option>
                                            <option value="2">Hiện</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                       <textarea class="ckeditor" name="posts"  required ></textarea>
                                    </div>
                                    <script type="text/javascript">
                                        var editor = CKEDITOR.replace('posts',{
                                            language:'vi',
                                            filebrowserImageBrowseUrl: './ckfinder/ckfinder.html?Type=Images',
                                            filebrowserFlashBrowseUrl: './ckfinder/ckfinder.html?Type=Flash',
                                            filebrowserImageUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                            filebrowserFlashUploadUrl: './public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                        });
                                       
                                    </script>                               
                                    <button type="submit" class="btn btn-info">Thêm</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
        </div>
    </div>
	</section>
</section>

@endsection