@extends('layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">製品の追加
        <a href="{{ url('products') }}" class="btn btn-danger btn-sm text-white float-right">戻る</a>
    </h5>
    <div class="card-body">
        <form method="post" action="{{ url('products') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-md-12">
                    <label>製品名<span class="text-danger">*</span></label>
                    <input type="text" name="name" placeholder="製品名" value="{{ old('name') }}" class="form-control" required>
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-12">
                    <label>製品説明<span class="text-danger">*</span></label>
                    <textarea name="description" placeholder="製品説明" class="form-control" required>{{ old('description') }}</textarea>
                    @error('description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-12">
                    <label>カテゴリー<span class="text-danger">*</span></label>
                    <select name="category_id" class="form-control">
                        <option value="">なし</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-12">
                    <label>価格<span class="text-danger">*</span></label>
                    <input type="number" name="price" placeholder="価格" value="{{ old('price') }}" class="form-control" required>
                    @error('price')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-12">
                    <label>製品の写真</label>
                    <input type="file" name="image" class="form-control-file">
                    @error('image')
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
