@extends('layouts.main')

@section('content')
<main id="main" class="blog-main">
    <header class="container blog-header">
        <h1 class="blog-h1">Блог</h1>
    </header>
    <!-- ======= Post Grid Section ======= -->
    <section id="posts" class="posts">
        <div class="container" data-aos="fade-up">
            <div class="row g-5 posts__row">

                <!-- Если в коллекции не 0 объектов, выводим нулевой пост (крайний левый пост) -->
                @if($posts->count())
                    <div class="col-lg-4">
                        <div class="post-entry-1 lg">
                            <a href="{{ route('blog.post.show', $posts[0]->id) }}"><img src="{{'storage/'. $posts[0]->preview_image }}" alt="" class="img-fluid"></a>
                            <div class="post-meta">
                                <span class="date">{{$posts[0]->category->title}}</span>
                                <span class="mx-1">&bullet;</span>
                                <span>{{$posts[0]->created_at}}</span>
                            </div>
                            <div class="blog__like-container">
                                <h2 class="blog__post-prev-h2">
                                    <a href="{{ route('blog.post.show', $posts[0]->id) }}">{{$posts[0]->title}}</a>
                                </h2>
                                @auth()
                                    <form class="like" action="{{ route('blog.post.like.store', $posts[0]->id) }}" method="post">
                                        @csrf
                                        <span>{{ $posts[0]->liked_users_count }}</span>
                                        <button type="submit" class="border-0 bg-transparent">
                                            @if(auth()->user()->likedPosts->contains($posts[0]->id))
                                                <i class="icon fas fa-heart"></i>
                                            @else
                                                <i class="icon far fa-heart"></i>
                                            @endif
                                        </button>
                                    </form>
                                @endauth
                                @guest
                                    <div>
                                        <span>{{ $posts[0]->liked_users_count }}</span>
                                        <i class="icon far fa-heart"></i>
                                    </div>
                                @endguest
                            </div>

                            
                            <!-- <div> 
                                <form action="#">
                                    <button type="submit" class="border-0 bg-transparent">
                                        <i class="far fa-heart"></i>
                                    </button>
                                </form>
                            </div> -->

                            {!! $posts[0]->content !!}
                            <div class="d-flex align-items-center author">
                                <div class="photo"><img src="assets/img/person-1.jpg" alt="" class="img-fluid"></div>
                                <div class="name">
                                    <h3 class="m-0 p-0">Автор</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                
                
                
           


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
                                            <a href="{{ route('blog.post.show', $post->id) }}">
                                                <img src="{{ 'storage/'. $post->preview_image }}" alt="" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="post-meta">
                                            <span class="date">{{ $post->category->title }} </span>
                                            <span class="mx-1">&bullet; </span>
                                            <span>{{ $post->created_at }}</span>
                                        </div>

                                        <div class="blog__like-container">
                                            <h2 class="blog__post-prev-h2"><a href="single-post.html">{{ $post->title }}</a></h2>
                                            @auth()
                                            <form class="like" action="{{ route('blog.post.like.store', $post->id) }}" method="post">
                                                @csrf
                                                <span>{{ $post->liked_users_count }}</span>
                                                <button type="submit" class="border-0 bg-transparent">
                                                    @if(auth()->user()->likedPosts->contains($post->id))
                                                        <i class="icon fas fa-heart"></i>
                                                    @else
                                                        <i class="icon far fa-heart"></i>
                                                    @endif
                                                </button>
                                            </form>
                                            @endauth
                                            @guest
                                                <div>
                                                    <span>{{ $post->liked_users_count }}</span>
                                                    <i class="icon far fa-heart"></i>
                                                </div>
                                            @endguest
                                        </div>
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
                                                @if($post->preview_image)
                                                <div class="trending-post__preview-container">
                                                    <img class="img-fluid trending-post__preview" src="{{ 'storage/'. $post->preview_image }}" alt="">
                                                </div>
                                                @endif
                                                
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

                <div class="row">
                    {{ $posts->links() }}
                </div>

                @else
                <h2 class="posts__row__no-posts">Постов пока нет</h2>
                @endif
            </div> <!-- End .row -->


        </div>
    </section> <!-- End Post Grid Section -->


</main><!-- End #main -->

@endsection
