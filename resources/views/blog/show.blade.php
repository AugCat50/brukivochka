@extends('layouts.main')

@section('content')
<main id="main">

    <section class="single-post-content">
        <div class="container">
            <div class="row">
                <div class="col-md-9 post-content" data-aos="fade-up">

                    <!-- ======= Single Post Content ======= -->
                    <div class="single-post">
                        <div class="post-meta">
                            <span class="date">{{ $post->category->title }}</span>
                            <span class="mx-1">&bullet; </span>
                            <span>{{ $date->isoFormat('MMM Do \'YY') }}, </span>
                            <span>{{ $date->format('H:i') }}</span>
                        </div>
                        <div class="blog__like-container">
                            <h1 class="mb-5">{{ $post->title }}</h1>
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
                        </div>

                        <p><span class="firstcharacter">В</span>ступительный абзац. Превью текст</p>
                        <p>Sunt reprehenderit, hic vel optio odit est dolore, distinctio iure itaque enim pariatur
                            ducimus. Rerum soluta, perspiciatis voluptatum cupiditate praesentium repellendus quas
                            expedita exercitationem tempora aliquam quaerat in eligendi adipisci harum non omnis
                            reprehenderit quidem beatae modi. Ea fugiat enim libero, ipsam dicta explicabo nihil,
                            tempore, nulla repellendus eos necessitatibus eligendi corporis cum? Eaque harum, eligendi
                            itaque numquam aliquam soluta.</p>

                        <figure class="my-4">
                            <img src="{{ asset('storage/' . $post->main_image) }}" alt="" class="img-fluid">
                            <figcaption>Текстовое описание главной картинки, подпись под ней</figcaption>
                        </figure>

                        {!! $post->content !!}

                        <!-- <figure class="my-4">
                            <img src="assets/img/post-landscape-5.jpg" alt="" class="img-fluid">
                            <figcaption>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, odit?
                            </figcaption>
                        </figure> -->

                    </div><!-- End Single Post Content -->

                    <div class="post__share-block">
                        <h5>Поделиться</h5>
                        <div>
                            <a href="#" class="mx-2"><span class="bi-facebook"></span></a>
                            <a href="#" class="mx-2"><span class="bi-twitter"></span></a>
                            <a href="#" class="mx-2"><span class="bi-instagram"></span></a>
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

                    <!-- ======= Comments ======= -->
                    <div class="comments">
                        <h5 class="comment-title py-4">{{ $post->comments->count() }} Комментария</h5>

                        @foreach ($post->comments as $comment)
                            <div class="comment d-flex mb-4">
                                <div class="flex-shrink-0">
                                    <div class="avatar avatar-sm rounded-circle">
                                        <img class="avatar-img" src="{{ asset('assets/img/person-5.jpg') }}" alt="avatar" class="img-fluid">
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-2 ms-sm-3">
                                    <div class="comment-meta d-flex align-items-baseline">
                                        <h6 class="me-2">{{ $comment->user->name }}</h6>
                                        <span class="text-muted">{{ $comment->dateAsCarbon->diffForHumans() }}</span>
                                    </div>
                                    <div class="comment-body">
                                        {{ $comment->message }}
                                    </div>

                                    <!-- <div class="comment-replies bg-light p-3 mt-3 rounded">
                                        <h6 class="comment-replies-title mb-4 text-muted text-uppercase">2 replies</h6>

                                        <div class="reply d-flex mb-4">
                                            <div class="flex-shrink-0">
                                                <div class="avatar avatar-sm rounded-circle">
                                                    <img class="avatar-img" src="assets/img/person-4.jpg" alt="" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-2 ms-sm-3">
                                                <div class="reply-meta d-flex align-items-baseline">
                                                    <h6 class="mb-0 me-2">Brandon Smith</h6>
                                                    <span class="text-muted">2d</span>
                                                </div>
                                                <div class="reply-body">
                                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="reply d-flex">
                                            <div class="flex-shrink-0">
                                                <div class="avatar avatar-sm rounded-circle">
                                                    <img class="avatar-img" src="assets/img/person-3.jpg" alt="" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-2 ms-sm-3">
                                                <div class="reply-meta d-flex align-items-baseline">
                                                    <h6 class="mb-0 me-2">James Parsons</h6>
                                                    <span class="text-muted">1d</span>
                                                </div>
                                                <div class="reply-body">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio
                                                    dolore sed eos sapiente, praesentium.
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        @endforeach

                        <!-- <div class="comment d-flex">
                            <div class="flex-shrink-0">
                                <div class="avatar avatar-sm rounded-circle">
                                    <img class="avatar-img" src="assets/img/person-2.jpg" alt="" class="img-fluid">
                                </div>
                            </div>
                            <div class="flex-shrink-1 ms-2 ms-sm-3">
                                <div class="comment-meta d-flex">
                                    <h6 class="me-2">Santiago Roberts</h6>
                                    <span class="text-muted">4d</span>
                                </div>
                                <div class="comment-body">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto laborum in corrupti
                                    dolorum, quas delectus nobis porro accusantium molestias sequi.
                                </div>
                            </div>
                        </div> -->
                    </div><!-- End Comments -->

                    <!-- ======= Comments Form ======= -->
                    <!-- Только для авторизованных -->
                    @auth
                    <div class="row justify-content-center mt-5">
                        <div class="col-lg-12">
                            <h5 class="comment-title">Оставить комментарий</h5>
                            <div class="row">
                                <form action="{{ route('blog.post.comment.store', $post->id) }}" method="post">
                                    @csrf
                                    <!-- <div class="col-lg-6 mb-3">
                                        <label for="comment-name">Имя</label>
                                        <input type="text" class="form-control" id="comment-name" placeholder="Enter your name">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="comment-email">Email</label>
                                        <input type="text" class="form-control" id="comment-email" placeholder="Enter your email">
                                    </div> -->
                                    <div class="col-12 mb-3">
                                        <label for="comment-message">Комментарий</label>
                                        <textarea name="message" class="form-control" id="comment-message" placeholder="Ваш текст" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <input type="submit" class="btn btn-primary" value="Отправить">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- End Comments Form -->
                    @endauth

                    <!-- Заготовка для гостей -->
                    @guest
                    @endguest
                </div>

                <div class="col-md-3">
                    <!-- ======= Sidebar ======= -->
                    <div class="aside-block">

                        <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
                            @if ($relatedPosts->count())
                            <li class="nav-item" role="presentation">
                                <button class="nav-link  active" id="pills-trending-tab" data-bs-toggle="pill" data-bs-target="#pills-trending" type="button" role="tab" aria-controls="pills-trending" aria-selected="false">Схожие</button>
                            </li>
                            @endif
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-popular-tab" data-bs-toggle="pill" data-bs-target="#pills-popular" type="button" role="tab" aria-controls="pills-popular" aria-selected="true">Тренд</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-latest-tab" data-bs-toggle="pill" data-bs-target="#pills-latest" type="button" role="tab" aria-controls="pills-latest" aria-selected="false">Последние</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="pills-tabContent">

                            <!-- схожие -->
                            @if ($relatedPosts->count())
                            <div class="tab-pane fade show active" id="pills-trending" role="tabpanel" aria-labelledby="pills-trending-tab">
                                @foreach ($relatedPosts as $relatedPost)
                                    <div class="post-entry-1 border-bottom">
                                        <div class="post-meta">
                                            <span class="date">{{ $relatedPost->category->title }} </span>
                                            <span class="mx-1">&bullet; </span>
                                            <span>{{ $relatedPost->dateAsCarbon->isoFormat('MMM Do \'YY') }}</span>
                                        </div>
                                        <h2 class="mb-2"><a href="#">{{ $relatedPost->title }}</a></h2>
                                        <img class="pills-tabContent__img" src="{{ asset('storage/'. $relatedPost->preview_image) }}" alt="Превью">
                                        <span class="author mb-3 d-block">Jenny Wilson</span>
                                    </div>
                                @endforeach
                            </div>
                            @endif
                            <!-- End Trending -->

                            <!-- Popular тренд -->
                            <div class="tab-pane fade" id="pills-popular" role="tabpanel" aria-labelledby="pills-popular-tab">
                                <div class="post-entry-1 border-bottom">
                                    <div class="post-meta"><span class="date">Sport</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                    <h2 class="mb-2"><a href="#">Популярное</a></h2>
                                    <span class="author mb-3 d-block">Jenny Wilson</span>
                                </div>

                                <div class="post-entry-1 border-bottom">
                                    <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                    <h2 class="mb-2"><a href="#">17 Pictures of Medium Length Hair in Layers That Will
                                            Inspire Your New Haircut</a></h2>
                                    <span class="author mb-3 d-block">Jenny Wilson</span>
                                </div>

                                <div class="post-entry-1 border-bottom">
                                    <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                    <h2 class="mb-2"><a href="#">9 Half-up/half-down Hairstyles for Long and Medium
                                            Hair</a></h2>
                                    <span class="author mb-3 d-block">Jenny Wilson</span>
                                </div>

                                <div class="post-entry-1 border-bottom">
                                    <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                    <h2 class="mb-2"><a href="#">Life Insurance And Pregnancy: A Working Mom’s Guide</a>
                                    </h2>
                                    <span class="author mb-3 d-block">Jenny Wilson</span>
                                </div>

                                <div class="post-entry-1 border-bottom">
                                    <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                    <h2 class="mb-2"><a href="#">The Best Homemade Masks for Face (keep the Pimples
                                            Away)</a></h2>
                                    <span class="author mb-3 d-block">Jenny Wilson</span>
                                </div>

                                <div class="post-entry-1 border-bottom">
                                    <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                    <h2 class="mb-2"><a href="#">10 Life-Changing Hacks Every Working Mom Should
                                            Know</a></h2>
                                    <span class="author mb-3 d-block">Jenny Wilson</span>
                                </div>
                            </div> <!-- End Popular -->

                            <!-- Latest -->
                            <div class="tab-pane fade" id="pills-latest" role="tabpanel" aria-labelledby="pills-latest-tab">
                                <div class="post-entry-1 border-bottom">
                                    <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                    <h2 class="mb-2"><a href="#">Последние</a>
                                    </h2>
                                    <span class="author mb-3 d-block">Jenny Wilson</span>
                                </div>

                                <div class="post-entry-1 border-bottom">
                                    <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                    <h2 class="mb-2"><a href="#">The Best Homemade Masks for Face (keep the Pimples
                                            Away)</a></h2>
                                    <span class="author mb-3 d-block">Jenny Wilson</span>
                                </div>

                                <div class="post-entry-1 border-bottom">
                                    <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                    <h2 class="mb-2"><a href="#">10 Life-Changing Hacks Every Working Mom Should
                                            Know</a></h2>
                                    <span class="author mb-3 d-block">Jenny Wilson</span>
                                </div>

                                <div class="post-entry-1 border-bottom">
                                    <div class="post-meta"><span class="date">Sport</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                    <h2 class="mb-2"><a href="#">How to Avoid Distraction and Stay Focused During Video
                                            Calls?</a></h2>
                                    <span class="author mb-3 d-block">Jenny Wilson</span>
                                </div>

                                <div class="post-entry-1 border-bottom">
                                    <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                    <h2 class="mb-2"><a href="#">17 Pictures of Medium Length Hair in Layers That Will
                                            Inspire Your New Haircut</a></h2>
                                    <span class="author mb-3 d-block">Jenny Wilson</span>
                                </div>

                                <div class="post-entry-1 border-bottom">
                                    <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                    <h2 class="mb-2"><a href="#">9 Half-up/half-down Hairstyles for Long and Medium
                                            Hair</a></h2>
                                    <span class="author mb-3 d-block">Jenny Wilson</span>
                                </div>

                            </div> <!-- End Latest -->

                        </div>
                    </div>

                    <div class="aside-block">
                        <h3 class="aside-title">Video</h3>
                        <div class="video-post">
                            <a href="https://www.youtube.com/watch?v=AiFfDjmd0jU" class="glightbox link-video">
                                <span class="bi-play-fill"></span>
                                <img src="assets/img/post-landscape-5.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div><!-- End Video -->

                    <div class="aside-block">
                        <h3 class="aside-title">Categories</h3>
                        <ul class="aside-links list-unstyled">
                            <li><a href="category.html"><i class="bi bi-chevron-right"></i> Business</a></li>
                            <li><a href="category.html"><i class="bi bi-chevron-right"></i> Culture</a></li>
                            <li><a href="category.html"><i class="bi bi-chevron-right"></i> Sport</a></li>
                            <li><a href="category.html"><i class="bi bi-chevron-right"></i> Food</a></li>
                            <li><a href="category.html"><i class="bi bi-chevron-right"></i> Politics</a></li>
                            <li><a href="category.html"><i class="bi bi-chevron-right"></i> Celebrity</a></li>
                            <li><a href="category.html"><i class="bi bi-chevron-right"></i> Startups</a></li>
                            <li><a href="category.html"><i class="bi bi-chevron-right"></i> Travel</a></li>
                        </ul>
                    </div><!-- End Categories -->

                    <div class="aside-block">
                        <h3 class="aside-title">Tags</h3>
                        <ul class="aside-tags list-unstyled">
                            <li><a href="category.html">Business</a></li>
                            <li><a href="category.html">Culture</a></li>
                            <li><a href="category.html">Sport</a></li>
                            <li><a href="category.html">Food</a></li>
                            <li><a href="category.html">Politics</a></li>
                            <li><a href="category.html">Celebrity</a></li>
                            <li><a href="category.html">Startups</a></li>
                            <li><a href="category.html">Travel</a></li>
                        </ul>
                    </div><!-- End Tags -->

                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->
@endsection