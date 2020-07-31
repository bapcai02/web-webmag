@extends('frontend.index')

@section('content')
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <!-- post -->
                    <div class="col-md-12">
                        @foreach($get_one_items as $key => $value)
                            <div class="post post-thumb">
                                <a href="{{ route('details',['id'=>$value->id]) }} " class="post-img"><img width="250px" height="250px" src="{{URL::to('/backend/images/post/'.$value->image)}}" alt=""></a>
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
                    <!-- /post -->
                                
                    <!-- post -->
                    @foreach($get_items as $key => $value)
                        <div class="col-md-6">
                            <div class="post post-thumb">
                                <a href="{{ route('details',['id'=>$value->id]) }} " class="post-img"><img width="250px" height="250px" src="{{URL::to('/backend/images/post/'.$value->image)}}" alt=""></a>
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
                    @endforeach  
                    <div style = "margin-left:40%;margin-top:10%">{{ $get_items->links() }}</div> 
                    <!-- /post -->
                </div>
            </div>
            
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
        <!-- /row -->
    </div>
    <!-- /container -->
</div>



@endsection