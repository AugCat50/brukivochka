@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование поста</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-6">
                    <div class="card card-default p-3">
                        <form action="{{ route('admin.post.update', $post->id) }}"
                            method="POST" class="" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group w-25">
                                <label>Название поста</label>
                                <input type="text" class="form-control" name="title" placeholder="Введите имя поста"
                                    value="{{ $post->title }}">
                                @error('title')
                                    <div class="text-danger">Это поле должно быть заполнено</div>
                                @enderror
                            </div>

                            <!-- select category -->
                            <div class="form-group w-25">
                                <label>Категория</label>
                                <select class="form-control" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == old('category_id', $post->category_id) ? 'selected' : '' }}>
                                            {{ $category->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Тэги</label>
                                    <div class="select2-purple">
                                        <!-- В name обязательно массив, чтобы получать массив значений, а не только последнее выбранное -->
                                        <select class="select2" name="tag_ids[]" multiple="multiple"
                                            data-placeholder="Select a State" data-dropdown-css-class="select2-purple"
                                            style="width: 100%;">
                                            @foreach($tags as $tag)
                                                <!-- Получить массив id из коллекции тегов, ищем в нём вовпадение с tag->id, если есть возвращаем selected -->

                                                <option value="{{ $tag->id }}"
                                                    {{ is_array(old( 'tag_ids', $post->tags->pluck('id')->toArray()) ) && in_array( $tag->id, old('tag_ids', $post->tags->pluck('id')->toArray()) ) ? 'selected' : '' }}>
                                                    {{ $tag->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>

                            <div class="form-group w-25">
                                <label for="exampleInputFile">Изображение превью</label>

                                <div class="row">
                                    <img class="w-50 mb-3"
                                        src="{{ asset( 'storage/'.$post->preview_image ) }}"
                                        alt="Изображение превью">
                                </div>

                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="preview_image">
                                        <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузить</span>
                                    </div>
                                </div>

                                @error('preview_image')
                                    <div class="text-danger">
                                        <p>{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group w-25">
                                <label for="exampleInputFile">Главное изображение поста</label>

                                <div class="row">
                                    <img class="w-50 mb-3"
                                        src="{{ asset( 'storage/'.$post->main_image ) }}"
                                        alt="Главное изображение поста">
                                </div>

                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="main_image">
                                        <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузить</span>
                                    </div>
                                </div>

                                @error('main_image')
                                    <div class="text-danger">
                                        <p>{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputFile">Текст поста</label>
                                <textarea id="summernote" name="content">{{ old('content', $post->content) }}</textarea>
                                @error('content')
                                <div class="text-danger">
                                    <p>{{ $message }}</p>
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Обновить">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
