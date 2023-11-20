@extends('admin.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Create product
      <a href="{{ url('admin/person') }}" class="btn btn-danger btn-sm text-white float-right">Trở về</a>
    </h5>
    <div class="card-body">
      <form method="post" action="{{url('admin/person')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="form-group col-md-6">
            <label>Product name<span class="text-danger">*</span></label>
            <input type="text" name="lastName" placeholder="Product name"  value="{{old('lastName')}}" class="form-control">
            @error('lastName')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
<!--   
          <div class="form-group col-md-6">
            <label>Tên<span class="text-danger">*</span></label>
            <input type="text" name="firstName" placeholder="Tên"  value="{{old('firstName')}}" class="form-control">
            @error('firstName')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div> -->
  
          <div class="form-group col-md-12">
            <label>Product ID</span></label>
            <input type="text" name="idCard" placeholder="Product ID"  value="{{old('idCard')}}" class="form-control">
            @error('idCard')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group col-md-12">
            <label>Image</span></label>
            <input type="file" name="avatar" placeholder="Image"  value="{{old('avatar')}}" class="form-control">
            @error('avatar')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

          <!-- <div class="form-group col-md-6">
            <label>Description<span class="text-danger">*</span></label>
            <input type="date" name="dateOfBirth" placeholder="Description"  value="{{old('dateOfBirth')}}" class="form-control">
            @error('dateOfBirth')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div> -->
          <div class="form-group col-md-6">
            <label>Description</label>
            <input type="email" name="email" placeholder="Description"  value="{{old('description')}}" class="form-control">
            @error('description')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group col-md-6">
            <label>Category ID<span class="text-danger">*</span></label>
            <select name="gender" class="form-control">
                <option value="male">01</option>
                <option value="female">02</option>
            </select>
            @error('gender')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group col-md-6">
            <label>Price<span class="text-danger">*</span></label>
            <input type="text" name="ethnic" placeholder="Price"  value="{{old('ethnic')}}" class="form-control">
            @error('ethnic')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group col-md-6">
            <label>Seller ID<span class="text-danger">*</span></label>
            <input type="text" name="nationality" placeholder="Seller ID"  value="{{old('nationality')}}" class="form-control">
            @error('nationality')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

          <!-- <div class="form-group col-md-6">
            <label>Email</label>
            <input type="email" name="email" placeholder="Email"  value="{{old('email')}}" class="form-control">
            @error('email')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group col-md-6">
            <label>Số điện thoại</label>
            <input type="text" name="numberPhone" placeholder="Số điện thoại"  value="{{old('numberPhone')}}" class="form-control">
            @error('numberPhone')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group col-md-12">
            <label>Quê quán<span class="text-danger">*</span></label>
            <input type="text" name="address" placeholder="Quê quán"  value="{{old('address')}}" class="form-control">
            @error('address')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group col-md-6">
            <label>Nghề nghiệp</label>
            <input type="text" name="occupation" placeholder="Nghề nghiệp"  value="{{old('occupation')}}" class="form-control">
            @error('occupation')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group col-md-6">
            <label>Trình độ học vấn</label>
            <input type="text" name="educationLevel" placeholder="Trình độ học vấn"  value="{{old('educationLevel')}}" class="form-control">
            @error('educationLevel')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          
          <div class="form-group col-md-6">
            <label>Tình trạng hôn nhân<span class="text-danger">*</span></label>
            <select name="maritalStatus" class="form-control">
                <option value="single">Độc thân</option>
                <option value="married">Đã kết hôn</option>
            </select>
            @error('martitalStatus')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group col-md-6">
            <label>Tình trạng<span class="text-danger">*</span></label>
            <select name="status" class="form-control">
                <option value="alive">Còn sống</option>
                <option value="dead">Đã mất</option>
            </select>
            @error('status')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
 -->

          <div class="form-group col-md-12">
            <button type="reset" class="btn btn-warning">Reset</button>
             <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
      </form>
    </div>
</div>

@endsection