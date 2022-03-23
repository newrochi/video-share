    <!-- Knowing is not enough; we must apply. Being willing is not enough; we must do. - Leonardo da Vinci -->
    <div id="related-posts">
        @foreach ($videos as $video)
            <!-- video item -->
        <div class="related-video-item">
            <div class="thumb">
                <small class="time">{{$video->lengthHumanReadable}}</small>
                <a href="{{route('videos.show',$video->slug)}}"><img src="{{$video->thumbnail}}" alt=""></a>
            </div>
            <a href="{{route('videos.show',$video->slug)}}" class="title">{{$video->name}}</a>
            <a class="channel-name" href="#">{{$video->owner_name}}<span>
                    <i class="fa fa-check-circle"></i></span></a>
        </div>
        <!-- // video item -->
        @endforeach
    </div>
