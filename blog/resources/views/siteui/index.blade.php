@include('siteui.includes.header')

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    @include('siteui.includes.headerarea')
    <!-- ##### Header Area End ##### -->



    <!-- ##### Hero Area Start ##### -->
    <div class="hero-area">
        <!-- Hero Post Slides -->
        <div class="hero-post-slides owl-carousel">

            <!-- Single Slide -->
            <div class="single-slide">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Single Blog Post Area -->
                        <div class="col-12 col-md-6">
                            <div  class="single-blog-post style-1" data-animation="fadeInUpBig" data-delay="100ms" data-duration="1000ms">
                                <!-- Blog Thumbnail -->
                                <div class="blog-thumbnail bg-overlay">
                                    <a href="#"><img  src="{{URL::asset($first_post->photo)}}" {{$first_post->photo}}></a>
                                </div>

                                <!-- Blog Content -->
                                <div class="blog-content">
                                    <span class="post-date">{{$first_post->created_at->diffForhumans() }}</span>
                                    <a href="{{route('siteui.post.show',['slug'=> $first_post->slug])}}" class="post-title">{{$first_post->title}}</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <!-- Single Blog Post Area -->
                            <div class="single-blog-post style-1 mb-30" data-animation="fadeInUpBig" data-delay="300ms" data-duration="1000ms">
                                <!-- Blog Thumbnail -->
                                <div class="blog-thumbnail bg-overlay">
                                    <a href="#"><img src="{{URL::asset($second_post->photo)}}" {{$second_post->photo}}></a>
                                </div>

                                <!-- Blog Content -->
                                <div class="blog-content">
                                    <span class="post-date">{{$second_post->created_at->diffForhumans() }}</span>
                                    <a href="{{route('siteui.post.show',['slug'=> $second_post->slug])}}" class="post-title">{{$second_post->title}}</a>
                                </div>
                            </div>
                            <!-- Single Blog Post Area -->
                            <div class="single-blog-post style-1" data-animation="fadeInUpBig" data-delay="500ms" data-duration="1000ms">
                                <!-- Blog Thumbnail -->
                                <div class="blog-thumbnail bg-overlay">
                                    <a href="#"><img src="{{URL::asset($third_post->photo)}}" {{$third_post->photo}}></a>
                                </div>

                                <!-- Blog Content -->
                                <div class="blog-content">
                                    <span class="post-date">{{$third_post->created_at->diffForhumans() }}</span>
                                    <a href="{{route('siteui.post.show',['slug'=> $third_post->slug])}}" class="post-title">{{$third_post->title}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
    <!-- ##### Hero Area End ##### -->





    <!-- ##### Top News Area Start ##### -->
    <div class="top-news-area section-padding-100">
        <div class="container">
            <div class="row">

                @foreach ($posts as $item)
                      <!-- Single News Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-blog-post style-2 mb-5">
                        <!-- Blog Thumbnail -->
                        <div class="blog-thumbnail">
                            <a href="#"><img src="{{URL::asset($item->photo)}}" alt="{{$item->photo}}"></a>
                        </div>

                        <!-- Blog Content -->
                        <div class="blog-content">
                            <span class="post-date">{{$item->created_at->diffForhumans() }}</span>
                            <a href="{{route('siteui.post.show',['slug'=> $item->slug])}}" class="post-title">{{$item->title}}</a>
                            <a href="{{route('siteui.post.show',['slug'=> $item->slug])}}" class="post-author">By {{$item->user->name}}</a>
                        </div>
                    </div>
                </div>
                @endforeach




            </div>
        </div>
    </div>
    <!-- ##### Top News Area End ##### -->

    <div class="top-news-area section-padding-100">
        <div class="container">
            <div class="row">

                @foreach ($tags as $item)
                      <!-- Single News Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-blog-post style-2 mb-5">
                        <!-- Blog Thumbnail -->
                        <div  >
                            <a href="#"><img src="ui/img/core-img/diamond.png" alt="diamond"></a>
                        </div>

                        <!-- Blog Content -->
                        <div class="blog-content">
                            <a href="{{route('siteui.tag',['id'=>$item->id])}}" class="post-title">{{$item->tag}}</a>
                        </div>
                    </div>
                </div>
                @endforeach




            </div>
        </div>
    </div>
    <!-- ##### Footer Area Start ##### -->
    @include('siteui.includes.footer')
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->

</body>

</html>
