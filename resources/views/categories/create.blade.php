@extends('layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">カテゴリーの追加
        <a href="{{ url('categories') }}" class="btn btn-danger btn-sm text-white float-right">戻る</a>
    </h5>
    <div class="card-body">
        <form method="post" action="{{ url('categories') }}">
            @csrf
            <div class="row">
                <div class="form-group col-md-12">
                    <label>カテゴリー名<span class="text-danger">*</span></label>
                    <input type="text" name="name" placeholder="カテゴリー名" value="{{ old('name') }}" class="form-control" required>
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-12">
                    <label>コンテンツ<span class="text-danger">*</span></label>
                    <textarea name="content" placeholder="カテゴリーの内容" class="form-control" required>{{ old('content') }}</textarea>
                    @error('content')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-12">
                    <label>親カテゴリー</label>
                    <select name="parent_id" class="form-control">
                        <option value="">なし</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('parent_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-12">
                    <button type="reset" class="btn btn-warning">リセット</button>
                    <button type="submit" class="btn btn-success">保存</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
