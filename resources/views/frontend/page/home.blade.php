@extends('frontend.index')

@section('content')

<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">	
            <!-- post -->
            @foreach($new_post as $key => $value)
                <div class="col-md-6">
                    <div class="post post-thumb">
                        <a href="{{ route('details',['id'=>$value->id]) }} " class="post-img"><img width="350px" height="350px" src="{{URL::to('/backend/images/post/'.$value->image)}}" alt=""></a>
                        <div class="post-body">
                            <div class="post-meta">
                                    <a class="post-category {{ $value->font }}" href="{{ route('category',['id'=>$value->id_cate]) }}">
                                        {{ $value->cate_name }}
                                    </a>
                                <span class="post-date">{{ date('d-m-Y'),strtotime($value->created_at) }}</span>
                                <span class="post-date" > <i class="fa fa-eye">{{ $value->view }}</i> </span>
                            </div>
                            <h3 class="post-title"><a href="{{ route('details',['id'=>$value->id]) }}">{{ $value->name }}</a></h3>
                        </div>
                    </div>
                </div>
            @endforeach      
            <!-- /post -->
        </div>
        <!-- /row -->

        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>Mới Nhất</h2>
                </div>
            </div>
            @foreach($new_post_recent as $key => $value)                           
                <!-- post -->     
                <div class="col-md-4">
                    <div class="post">
                        <a href="{{ route('details',['id'=>$value->id]) }} " class="post-img"><img height="250px" src="{{URL::to('/backend/images/post/'.$value->image)}}" alt=""></a>
                        <div class="post-body">
                            <div class="post-meta">
                                    <a class="post-category {{ $value->font }}" href="{{ route('category',['id'=>$value->id_cate]) }}">
                                        {{ $value->cate_name }}
                                    </a>
                                    <span class="post-date">{{ date('d-m-Y'),strtotime($value->created_at) }}</span>
                                    <span class="post-date" > <i class="fa fa-eye">{{ $value->view }}</i> </span>
                            </div>
                            <h3 class="post-title"><a href="{{ route('details',['id'=>$value->id]) }}">{{ $value->name }}</a></h3>
                        </div>
                    </div>
                </div>
                
                <!-- /post -->
            @endforeach
            <div class="clearfix visible-md visible-lg"></div>
        </div>
    </div>
    <!-- /container -->
</div>
<!-- /section -->

<!-- section -->
<div class="section section-grey">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h2>Được Xem Nhiều</h2>
                </div>
            </div>
            
            @foreach($new_post_most_read as $key => $value)              
                <!-- post -->
                <div class="col-md-4">
                    <div class="post">
                        <a href="{{ route('details',['id'=>$value->id]) }} " class="post-img"><img style="height:250px"  src="{{URL::to('/backend/images/post/'.$value->image)}}" alt=""></a>
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
                </div>
                
                <!-- /post -->
            @endforeach
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2>Tâm Sự Coder</h2>
                        </div>
                    </div>
                    <!-- post -->
                    @foreach($new_post_talk as $key => $value)
                                 
                        <div class="col-md-12">
                            <div class="post post-row">
                                <div class="post">
                                    <a href="{{ route('details',['id'=>$value->id]) }} " class="post-img"><img style="height:250px"  src="{{URL::to('/backend/images/post/'.$value->image)}}" alt=""></a>
                                    <div class="post-body">
                                        <div class="post-meta">
                                                <a class="post-category {{ $value->font }}" href="{{ route('category',['id'=>$value->id_cate]) }}">
                                                    {{ $value->cate_name }}
                                                </a>
                                                <span class="post-date">{{ date('d-m-Y'),strtotime($value->created_at) }}</span>
                                        </div>
                                        <h3 class="post-title"><a href="{{ route('details',['id'=>$value->id]) }}">{{ $value->name }}</a></h3>
                                        <b class="post-title">{{ $value->title }}...</a></b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- /post -->
               </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2>Lập Trình</h2>
                        </div>
                    </div>
                    <!-- post -->
                    @foreach($new_post_dev as $key => $value)
                                 
                        <div class="col-md-12">
                            <div class="post post-row">
                                <div class="post">
                                    <a href="{{ route('details',['id'=>$value->id]) }} " class="post-img"><img style="height:250px"  src="{{URL::to('/backend/images/post/'.$value->image)}}" alt=""></a>
                                    <div class="post-body">
                                        <div class="post-meta">
                                                <a class="post-category {{ $value->font }}" href="{{ route('category',['id'=>$value->id_cate]) }}">
                                                    {{ $value->cate_name }}
                                                </a>
                                                <span class="post-date">{{ date('d-m-Y'),strtotime($value->created_at) }}</span>
                                        </div>
                                        <h3 class="post-title"><a href="{{ route('details',['id'=>$value->id]) }}">{{ $value->name }}</a></h3>
                                        <b class="post-title">{{ $value->title }}...</a></b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- /post -->
               </div>
            </div>
            
        </div>
        <!-- /row -->
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2>Công Nghệ</h2>
                        </div>
                    </div>
                    <!-- post -->
                    @foreach($new_post_tech as $key => $value)
                                 
                        <div class="col-md-12">
                            <div class="post post-row">
                                <div class="post">
                                    <a href="{{ route('details',['id'=>$value->id]) }} " class="post-img"><img style="height:250px"  src="{{URL::to('/backend/images/post/'.$value->image)}}" alt=""></a>
                                    <div class="post-body">
                                        <div class="post-meta">
                                                <a class="post-category {{ $value->font }}" href="{{ route('category',['id'=>$value->id_cate]) }}">
                                                    {{ $value->cate_name }}
                                                </a>
                                                <span class="post-date">{{ date('d-m-Y'),strtotime($value->created_at) }}</span>
                                        </div>
                                        <h3 class="post-title"><a href="{{ route('details',['id'=>$value->id]) }}">{{ $value->name }}</a></h3>
                                        <b class="post-title">{{ $value->title }}...</a></b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- /post -->
               </div>
            </div>
            <div class="col-md-4"  >
                
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
                                <li><a href="{{ route('items',['id'=>$value->id])}}">{{ $value->name }}</a></li>
                            @endforeach                            
                        </ul>
                    </div>
                </div>
                <!-- /tags -->
 
            </div>
        </div>
    </div>
    <!-- /container -->
</div>

@endsection