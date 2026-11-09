@extends('admin.layouts.layout')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Новая статья</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Статьи</a></li>
                        <li class="breadcrumb-item active">Новая статья</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Создание статьи</h3>
                </div>

                <form role="form" method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="title">Название</label>
                            <input type="text" name="title" id="title"
                                   class="form-control @error('title') is-invalid @enderror"
                                   placeholder="Название" value="{{ old('title') }}">
                        </div>

                        <div class="form-group">
                            <label for="description">Цитата</label>
                            <textarea name="description" id="description" rows="5"
                                      class="form-control @error('description') is-invalid @enderror"
                                      placeholder="Цитата">{{ old('description') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="content">Контент</label>
                            <textarea name="content" id="content" rows="7"
                                      class="form-control @error('content') is-invalid @enderror"
                                      placeholder="Контент">{{ old('content') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="category_id">Категория</label>
                            <select name="category_id" id="category_id"
                                    class="form-control @error('category_id') is-invalid @enderror">
                                @foreach ($categories as $k => $v)
                                    <option value="{{ $k }}">{{ $v }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tags">Теги</label>
                            <select name="tags[]" id="tags" class="select2" multiple="multiple"
                                    data-placeholder="Выбор тегов" style="width: 100%;">
                                @foreach ($tags as $k => $v)
                                    <option value="{{ $k }}">{{ $v }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="thumbnail">Изображение</label>
                            <input type="file" name="thumbnail" id="thumbnail" class="form-control-file">
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection