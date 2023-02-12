@extends('layouts.main')

@section('content')
<main id="main" class="blog-main">
    <header class="container blog-header">
        <h1 class="blog-h1">Блог</h1>
    </header>
    <!-- ======= Post Grid Section ======= -->
    <section id="posts" class="posts">
        <div class="container" data-aos="fade-up">
            <div class="row g-5">

                <!-- Если в коллекции не 0 объектов, выводим нулевой пост (крайний левый пост) -->
                @if($posts->count())

                    <div class="col-lg-4">
                        <div class="post-entry-1 lg">
                            <a href="single-post.html"><img src="{{'storage/'. $posts[0]->preview_image }}" alt="" class="img-fluid"></a>
                            <div class="post-meta"><span class="date">{{$posts[0]->category->title}}</span> <span class="mx-1">&bullet;</span>
                                <span>{{$posts[0]->created_at}}</span></div>
                            <h2><a href="single-post.html">{{$posts[0]->title}}</a></h2>
                            <p class="mb-4 d-block">{{$posts[0]->content}}</p>

                            <div class="d-flex align-items-center author">
                                <div class="photo"><img src="assets/img/person-1.jpg" alt="" class="img-fluid"></div>
                                <div class="name">
                                    <h3 class="m-0 p-0">Cameron Williamson</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                
                @endif
                
           


                <div class="col-lg-8">
                    <div class="row g-5">
                    
                        <!-- В дизайне три столбца постов, первый выводится выше и пропускается, затем каждые три поста добавляется контейнер и перебирается вручную счётчик-->
                        @php($posts->couner = 0)

                        @foreach ($posts as $post)
                            @if($posts->couner == 1)
                                <!-- Перед первым постом открывается первый контейнер -->
                                <div class="col-lg-4 border-start custom-border">
                            @endif

                            @if($posts->couner == 4)
                                <!-- Перед четвёртым постом закрывается первый контейнер, открывается второй-->
                                </div>
                                <div class="col-lg-4 border-start custom-border">
                            @endif

                            <!-- Нулевой пост пропускается -->
                            @if($posts->couner != 0)
                                    <div class="post-entry-1">
                                        <div class="post-entry-1__preview-container">
                                            <a href="single-post.html">
                                                <img src="{{ 'storage/'. $post->preview_image }}" alt="" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="post-meta"><span class="date">{{ $post->category->title }}</span> <span
                                                class="mx-1">&bullet;</span> <span>{{ $post->created_at }}</span></div>
                                        <h2><a href="single-post.html">{{ $post->title }}</a></h2>
                                    </div>
                            @endif

                            @if($posts->couner == 6)
                                <!-- перед 6 постом закрывается второй контейнер-->
                                </div>
                            @endif

                            @php($posts->couner++)
                        @endforeach
                        <!-- <div class="col-lg-4 border-start custom-border">
                            <div class="post-entry-1">
                                <a href="single-post.html"><img src="assets/img/post-landscape-2.jpg" alt=""
                                        class="img-fluid"></a>
                                <div class="post-meta"><span class="date">Sport</span> <span
                                        class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                <h2><a href="single-post.html">Let’s Get Back to Work, New York</a></h2>
                            </div>
                            <div class="post-entry-1">
                                <a href="single-post.html"><img src="assets/img/post-landscape-5.jpg" alt=""
                                        class="img-fluid"></a>
                                <div class="post-meta"><span class="date">Food</span> <span class="mx-1">&bullet;</span>
                                    <span>Jul 17th '22</span></div>
                                <h2><a href="single-post.html">How to Avoid Distraction and Stay Focused During Video
                                        Calls?</a></h2>
                            </div>
                            <div class="post-entry-1">
                                <a href="single-post.html"><img src="assets/img/post-landscape-7.jpg" alt=""
                                        class="img-fluid"></a>
                                <div class="post-meta"><span class="date">Design</span> <span
                                        class="mx-1">&bullet;</span> <span>Mar 15th '22</span></div>
                                <h2><a href="single-post.html">Why Craigslist Tampa Is One of The Most Interesting
                                        Places On the Web?</a></h2>
                            </div>
                        </div>

                        <div class="col-lg-4 border-start custom-border">
                            <div class="post-entry-1">
                                <a href="single-post.html"><img src="assets/img/post-landscape-3.jpg" alt=""
                                        class="img-fluid"></a>
                                <div class="post-meta"><span class="date">Business</span> <span
                                        class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                <h2><a href="single-post.html">6 Easy Steps To Create Your Own Cute Merch For
                                        Instagram</a></h2>
                            </div>
                            <div class="post-entry-1">
                                <a href="single-post.html"><img src="assets/img/post-landscape-6.jpg" alt=""
                                        class="img-fluid"></a>
                                <div class="post-meta"><span class="date">Tech</span> <span class="mx-1">&bullet;</span>
                                    <span>Mar 1st '22</span></div>
                                <h2><a href="single-post.html">10 Life-Changing Hacks Every Working Mom Should Know</a>
                                </h2>
                            </div>
                            <div class="post-entry-1">
                                <a href="single-post.html"><img src="assets/img/post-landscape-8.jpg" alt=""
                                        class="img-fluid"></a>
                                <div class="post-meta"><span class="date">Travel</span> <span
                                        class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                <h2><a href="single-post.html">5 Great Startup Tips for Female Founders</a></h2>
                            </div>
                        </div> -->

                        <!-- Trending Section -->
                        <div class="col-lg-4">

                            <div class="trending">
                                <h3>Популярное</h3>
                                <ul class="trending-post">
                                    @php ($counter = 1)

                                    @foreach ($likedPosts as $post)
                                        <li>
                                            <a href="single-post.html">
                                                <div class="trending-post__preview-container">
                                                    <img class="img-fluid trending-post__preview" src="{{ 'storage/'. $post->preview_image }}" alt="">
                                                </div>
                                                
                                                <span class="number">{{$counter}}</span>
                                                <h3>{{ $post->title }}</h3>
                                                <span class="author">Автор</span>
                                            </a>
                                        </li>

                                        @php ($counter++)
                                    @endforeach
                                </ul>
                            </div>

                        </div> <!-- End Trending Section -->
                    </div>
                </div>

            </div> <!-- End .row -->

            <div class="row">
                {{ $posts->links() }}
            </div>
        </div>
    </section> <!-- End Post Grid Section -->


</main><!-- End #main -->

@endsection
