@extends('admin/layouts/layout')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Статьи</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Новая статья</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                            title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>

            <form action="{{route('posts.store')}}" role="form" method="post">
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label for="title_post">Название</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                               id="title_post" placeholder="Название">
                    </div>

                    <div class="form-group">
                        <label for="description">Цитата</label>
                        <textarea id="description" class="form-control" name="description" rows="3"
                                  placeholder="Цитата ..."></textarea>
                    </div>

                    <div class="form-group">
                        <label for="content">Контент</label>
                        <textarea id="content" class="form-control" name="content" rows="5"
                                  placeholder="Контент ..."></textarea>
                    </div>


                    <div class="form-group">
                        <label for="category_id">Категория</label>
                        <select id="category_id" name="category_id" class="form-control">

                            @foreach($categories as $k => $v)
                                <option value="{{$k}}">{{$v}}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tags">Теги</label>
                        <select name="tags[]" id="tags" class="select2" multiple="multiple"
                                data-placeholder="Выбор тегов" style="width: 100%;">

                            @foreach($tags as $k => $v)
                                <option value="{{$k}}">{{$v}}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="thumbnail">Изображение</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="thumbnail" class="custom-file-input" id="thumbnail">
                                <label class="custom-file-label" for="thumbnail">Выбрать файл</label>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Добавить статью</button>
                </div>
                <!-- /.card-footer-->
            </form>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
