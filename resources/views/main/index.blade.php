@extends('layouts.main')

@section('content')
<main id="main">

<!-- ======= Hero Slider Section ======= -->
<section id="hero-slider" class="hero-slider">
  <div class="container-md" data-aos="fade-in">
    <div class="row">
      <div class="col-12">
        <div class="swiper sliderFeaturedPosts">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <a href="single-post.html" class="img-bg d-flex align-items-end" style="background-image: url('assets/img/slider/slide-1.jpg');">
                <div class="img-bg-inner">
                  <h2>Профессиональная укладка плитки</h2>
                  <p>15 лет на рынке Украины</p>
                </div>
              </a>
            </div>

            <div class="swiper-slide">
              <a href="single-post.html" class="img-bg d-flex align-items-end" style="background-image: url('assets/img/slider/slide-9.jpg');">
                <div class="img-bg-inner">
                  <h2>Портфолио</h2>
                  <p>Взгляните на наши работы</p>
                </div>
              </a>
            </div>

            <div class="swiper-slide">
              <a href="single-post.html" class="img-bg d-flex align-items-end" style="background-image: url('assets/img/slider/slide-6.jpg');">
                <div class="img-bg-inner">
                  <h2>FAQ</h2>
                  <p>Узнайте ответы на часто задаваемые вопросы в цикле наших заметок "Коротко о главном"</p>
                  <p>(время чтения 5 минут)</p>
                </div>
              </a>
            </div>

            <div class="swiper-slide">
              <a href="single-post.html" class="img-bg d-flex align-items-end" style="background-image: url('assets/img/slider/slide-7.jpg');">
                <div class="img-bg-inner">
                  <h2>Блог</h2>
                  <p>Всё, что вам может быть интересно о укладке плитки</p>
                  <p>А так же немного из жини нашей команды</p>
                </div>
              </a>
            </div>

            <div class="swiper-slide">
              <a href="single-post.html" class="img-bg d-flex align-items-end" style="background-image: url('assets/img/slider/slide-8.jpg');">
                <div class="img-bg-inner">
                  <h2>Услуги</h2>
                  <p>Укладка плитки</p>
                  <p>Рассчёт проектов</p>
                  <p>Консультация специалиста</p>
                  <p>Замер участка</p>
                </div>
              </a>
            </div>
          </div>
          <div class="custom-swiper-button-next">
            <span class="bi-chevron-right"></span>
          </div>
          <div class="custom-swiper-button-prev">
            <span class="bi-chevron-left"></span>
          </div>

          <div class="swiper-pagination"></div>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Hero Slider Section -->

<!-- ======= Post Grid Section ======= -->
<section id="posts" class="posts">
  <div class="container" data-aos="fade-up">
    <div class="row g-5">
      <div class="col-lg-4">
        <div class="post-entry-1 lg">
          <a href="single-post.html"><img src="assets/img/post-landscape-1.jpg" alt="" class="img-fluid"></a>
          <!-- <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div> -->
          <h2><a href="single-post.html">Галерея плитки</a></h2>
          <!-- <p class="mb-4 d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero temporibus repudiandae, inventore pariatur numquam cumque possimus exercitationem? Nihil tempore odit ab minus eveniet praesentium, similique blanditiis molestiae ut saepe perspiciatis officia nemo, eos quae cumque. Accusamus fugiat architecto rerum animi atque eveniet, quo, praesentium dignissimos</p>

          <div class="d-flex align-items-center author">
            <div class="photo"><img src="assets/img/person-1.jpg" alt="" class="img-fluid"></div>
            <div class="name">
              <h3 class="m-0 p-0">Cameron Williamson</h3>
            </div>
          </div> -->
        </div>
        <div class="post-entry-1 lg">
          <a href="single-post.html"><img src="assets/img/post-landscape-1.jpg" alt="" class="img-fluid"></a>
          <!-- <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div> -->
          <h2><a href="single-post.html">Блок</a></h2>
          <!-- <p class="mb-4 d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero temporibus repudiandae, inventore pariatur numquam cumque possimus exercitationem? Nihil tempore odit ab minus eveniet praesentium, similique blanditiis molestiae ut saepe perspiciatis officia nemo, eos quae cumque. Accusamus fugiat architecto rerum animi atque eveniet, quo, praesentium dignissimos</p>

          <div class="d-flex align-items-center author">
            <div class="photo"><img src="assets/img/person-1.jpg" alt="" class="img-fluid"></div>
            <div class="name">
              <h3 class="m-0 p-0">Cameron Williamson</h3>
            </div>
          </div> -->
        </div>
      </div>

      <div class="col-lg-8">
        <div class="row g-5">
          <div class="col-lg-4 border-start custom-border">
            <div class="post-entry-1">
              <a href="single-post.html"><img src="assets/img/post-landscape-2.jpg" alt="" class="img-fluid"></a>
              <!-- <div class="post-meta"><span class="date">Sport</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div> -->
              <h2><a href="single-post.html">Борбюры</a></h2>
            </div>
            <div class="post-entry-1">
              <a href="single-post.html"><img src="assets/img/post-landscape-5.jpg" alt="" class="img-fluid"></a>
              <!-- <div class="post-meta"><span class="date">Food</span> <span class="mx-1">&bullet;</span> <span>Jul 17th '22</span></div> -->
              <h2><a href="single-post.html">Проекты</a></h2>
            </div>
            <div class="post-entry-1">
              <a href="single-post.html"><img src="assets/img/post-landscape-7.jpg" alt="" class="img-fluid"></a>
              <!-- <div class="post-meta"><span class="date">Design</span> <span class="mx-1">&bullet;</span> <span>Mar 15th '22</span></div> -->
              <h2><a href="single-post.html">Стройматериалы</a></h2>
            </div>
          </div>
          <div class="col-lg-4 border-start custom-border">
            <div class="post-entry-1">
              <a href="single-post.html"><img src="assets/img/post-landscape-3.jpg" alt="" class="img-fluid"></a>
              <!-- <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div> -->
              <h2><a href="single-post.html">Блок</a></h2>
            </div>
            <div class="post-entry-1">
              <a href="single-post.html"><img src="assets/img/post-landscape-6.jpg" alt="" class="img-fluid"></a>
              <!-- <div class="post-meta"><span class="date">Tech</span> <span class="mx-1">&bullet;</span> <span>Mar 1st '22</span></div> -->
              <h2><a href="single-post.html">Блок</a></h2>
            </div>
            <div class="post-entry-1">
              <a href="single-post.html"><img src="assets/img/post-landscape-8.jpg" alt="" class="img-fluid"></a>
              <!-- <div class="post-meta"><span class="date">Travel</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div> -->
              <h2><a href="single-post.html">Блок</a></h2>
            </div>
          </div>

          <!-- Trending Section -->
          <div class="col-lg-4">

            <div class="trending">
              <h3>Экспертное мнение</h3>
              <ul class="trending-post">
                <li>
                  <a href="single-post.html">
                    <span class="number">1</span>
                    <h3>Бетон обязателен?</h3>
                    <p>Узнайте когда под укладку необходим бетон, а когда можно обойтись подушкой щебня</p>
                    <!-- <span class="author">Jane Cooper</span> -->
                  </a>
                </li>
                <li>
                  <a href="single-post.html">
                    <span class="number">2</span>
                    <h3>Толщина</h3>
                    <p>Сегодня поговорим о том, как правильно учать нагрузу при выборе плитки</p>
                    <!-- <span class="author">Wade Warren</span> -->
                  </a>
                </li>
                <li>
                  <a href="single-post.html">
                    <span class="number">3</span>
                    <h3>Вибролитьё и пресование</h3>
                    <p>Всё, что вы хотели знать о ньюансах производства брусчатки</p>
                    <!-- <span class="author">Esther Howard</span> -->
                  </a>
                </li>
                <!-- <li>
                  <a href="single-post.html">
                    <span class="number">4</span>
                    <h3>9 Half-up/half-down Hairstyles for Long and Medium Hair</h3>
                    <span class="author">Cameron Williamson</span>
                  </a>
                </li>
                <li>
                  <a href="single-post.html">
                    <span class="number">5</span>
                    <h3>Life Insurance And Pregnancy: A Working Mom’s Guide</h3>
                    <span class="author">Jenny Wilson</span>
                  </a>
                </li> -->
              </ul>
            </div>

          </div> <!-- End Trending Section -->
        </div>
      </div>

    </div> <!-- End .row -->
  </div>
</section> <!-- End Post Grid Section -->



</main><!-- End #main -->

@endsection
