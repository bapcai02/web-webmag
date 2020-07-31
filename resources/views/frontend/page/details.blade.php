@extends('frontend.index')

@section('content')
<div id="post-header" class="page-header">
    @foreach($details as $key => $value)
        <div class="background-img" style="background-image: url({{URL::to('/backend/images/post/'.$value->image)}});"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="post-meta">
                        <a class="post-category cat-2" href="category.html">JavaScript</a>
                        <span class="post-date">March 27, 2018</span>
                    </div>
                    <h1>{{ $value->name }}</h1>
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- Post content -->
            <div class="col-md-8">
                <div class="section-row sticky-container">
                    <div class="main-post">
                        @foreach($details as $key => $value)                       
                           {!! $value->content  !!}
                        @endforeach
                    </div>
                    <div class="post-shares sticky-shares">
                        <a  class="share-facebook"><i class="fa fa-facebook"></i></a>
                        <a  class="share-twitter"><i class="fa fa-twitter"></i></a>
                        <a  class="share-google-plus"><i class="fa fa-google-plus"></i></a>
                        <a  class="share-pinterest"><i class="fa fa-pinterest"></i></a>
                        <a  class="share-linkedin"><i class="fa fa-linkedin"></i></a>
                        <a ><i class="fa fa-envelope"></i></a>
                    </div>
                    
                   
                </div>
            </div>
            <!-- /Post content -->

            <!-- aside -->
            <div class="col-md-4">               
               <!-- post widget -->
                <div class="aside-widget">
                    <div class="section-title">
                        <h2>Dành Cho Bạn</h2>
                    </div>
                    @foreach($post_random as $key => $value)  
                        <div class="post post-widget">
                            <a href="{{ route('details',['id'=>$value->id]) }} " class="post-img"><img  src="{{URL::to('/backend/images/post/'.$value->image)}}" alt=""></a>
                            <div class="post-body">
                                <h3 class="post-title"><a href="{{ route('details',['id'=>$value->id]) }}">{{ $value->name }}</a></h3>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- /post widget -->

                <!-- post widget -->
                <div class="aside-widget">
                    <div class="section-title">
                        <h2>Đọc Nhiều Nhất</h2>
                    </div>
                    @foreach($post_views as $key => $value)
                        <div class="post post-thumb">
                            <a href="{{ route('details',['id'=>$value->id]) }} " class="post-img"><img  src="{{URL::to('/backend/images/post/'.$value->image)}}" alt=""></a>
                            <div class="post-body">
                                <div class="post-meta">
                                    <a class="post-category {{ $value->font }}" href="{{ route('category',['id'=>$value->id_cate]) }}">
                                        {{ $value->cate_name }}
                                    </a>
                                <span class="post-date">{{ date('d-m-Y'),strtotime($value->created_at) }}</span>
                            </div>
                                <h3 class="post-title"><a href="{{ route('details',['id'=>$value->id]) }}">{{ $value->name }}</a></h3>
                            </div>
                        </div>
                    @endforeach                 
                </div>
                <!-- /post widget -->
                
                <!-- catagories -->
                <div class="aside-widget">
                    <div class="section-title">
                        <h2>Catagories</h2>
                    </div>
                    <div class="category-widget" >
                        <ul>
                            @foreach($count_category as $key => $value)
                                <li><a href="{{ route('category',['id'=>$value->cate_id])}}" class="{{ $value->font }}">{{ $value->cate_name }}
                                   
                                        @if($value-> sum > 0)
                                            <span>{{ $value-> sum  }}</span>
                                        @else {
                                            <span>0</span>
                                        }
                                        @endif                                 
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- /catagories -->
                
                <!-- tags -->
                <div class="aside-widget">
                    <div class="tags-widget">
                        <ul>
                            @foreach($new_category as $key => $value)
                                <li><a href="{{route('items',['id'=>$value->id])}}">{{ $value->name }}</a></li>
                            @endforeach                            
                        </ul>
                    </div>
                </div>
                <!-- /tags -->
            <!-- /aside -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>

@endsection