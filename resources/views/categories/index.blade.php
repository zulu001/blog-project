@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>Categories</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard fa-fw"></i>Home</a></li>
        <li class="active">Categories</li>
    </ol>
</section>
<section class="content container-fluid">
    @if (session('status'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ session('status') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-7">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">All Categories</h3>
                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Posts</th>
                            <th></th>
                        </tr>
                        @foreach($categories as $category)
                        <tr>
                            <td><a href="{{ route('categories.edit', $category->id) }}">{{ $category->name }}</a></td>
                            <td>{{ $category->description }}</td>
                            <td>{{ $category->posts->count() }}</td>
                            <td>
                                <a href="#" class="btn btn-xs btn-default">View</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <div class="col-md-5">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Add New Category</h3>
                </div>
                <div class="box-body">
                    <form method="POST" role="form" action="{{ route('categories.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="control-label">Name</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter Category Name">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('parent_id') ? ' has-error' : '' }}">
                            <label for="parent_id" class="control-label">Parent</label>
                            {{ Form::select('parent_id', $parents, null, ["class" => "form-control", "placeholder" => "None"]) }}
                        </div>
                        <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                            <label for="slug" class="control-label">Slug</label>
                            <input id="slug" type="text" class="form-control" name="slug" value="{{ old('slug') }}" placeholder="Enter Category Slug">
                            @if ($errors->has('slug'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('slug') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('Description') ? ' has-error' : '' }}">
                            <label for="description" class="control-label">Description</label>
                            <textarea id="description" class="form-control" rows="3" placeholder="Enter Category Description" name="description" value="{{ old('description') }}"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add New Category</button>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</section>
@endsection