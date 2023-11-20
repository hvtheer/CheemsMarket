@extends('admin.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Create Category
      <a href="{{ url('admin/household') }}" class="btn btn-danger btn-sm text-white float-right">Trở về</a>
    </h5>
    <div class="card-body">
      <form method="post" action="{{url('admin/household')}}">
        @csrf
        <div class="row">
          <div class="col-md-12 mb-3">
              <label>Product</label>
              <input type="text" name="product" value="{{old('product')}}" class="form-control" />
              @error('product') <small class="text-danger">{{ $message }}</small>@enderror
          </div>
          <div class="col-md-12">
              <h4>Add product</h4>
          </div>
          <table class="table table-bordered" id="table">
            <thead>
              <tr>
                <th>Product ID</th>
                <th>Parent ID</th>
                <th>Name</th>
                <th>Content</th>
              </tr>
            </thead>
            <tbody id="tbody">
              <tr>
                <td>
                  <select name="personId[]" class="form-control" required>
                    <option value="">Choose</option>
                    @foreach ($people as $person)
                    <option value="{{$person->id}}">{{$person->id.' '.$person->name}}</option>
                    @endforeach
                  </select>
                </td>
                <td>
                  <select name="relationship[]" class="form-control" required>
                    <option value="Áo sơ mi">Áo sơ mi</option>
                    <option value="Quần dài">Quần dài</option>
                    <option value="Bikini">Bikini</option>
                    <option value="Chăn">Chăn</option>
                    <option value="Gối">Gối</option>
                    <option value="Gấu bông">Gấu bông</option>
                    <option value="Sách">Sách</option>
                    <option value="Truyện">Truyện</option>
                    <option value="Máy tính">Máy tính</option>
                    <option value="Laptop">Laptop</option>
                    <option value="Điện thoại">Điện thoại</option>
                    <option value="Nồi">Nồi</option>
                    <option value="Đĩa">Đĩa</option>
                    <option value="Bao cao su">Bao cao su</option>
                  </select>
                </td>
                <!-- <td>
                  <select name="isOwner[]" class="form-control">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </td> -->
                <td>
                  <button type="button" name="add" id="add" class="btn btn-success">Create</button>
                </td>
              </tr>
            </tbody>
          </table>

        
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
          
        <div class="form-group col-md-12">
          <button type="reset" class="btn btn-warning">Khôi phục</button>
           <button type="submit" class="btn btn-success">Lưu trữ</button>
        </div>
        </div>
      </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
  // Add member dynamically
  const addMemberButton = document.getElementById('add');
  const membersContainer = document.getElementById('tbody');
  const memberTemplate = `
  <td>
  <select name="personId[]" class="form-control">
    <option value="">Chọn đi</option>
    @foreach ($people as $person)
    <option value="{{$person->id}}">{{$person->id}}</option>
    @endforeach
  </select>
  </td>
  <td>
    <select name="relationship[]" class="form-control" required>
                    <option value="Chủ hộ">Chủ hộ</option>
                    <option value="Vợ (chồng)">Vợ (chồng)</option>
                    <option value="Cha đẻ, mẹ đ">Cha đẻ, mẹ đẻ</option>
                    <option value="Cha nuôi, mẹ nuôi">Cha nuôi, mẹ nuôi</option>
                    <option value="Con đẻ">Con đẻ</option>
                    <option value="Con nuôi">Con nuôi</option>
                    <option value="Ông nội, bà nội">Ông nội, bà nội</option>
                    <option value="Ông ngoại, bà ngoại">Ông ngoại, bà ngoại</option>
                    <option value="Anh ruột; chị ruột; em ruột; cháu ruột">Anh ruột; chị ruột; em ruột; cháu ruột</option>
                    <option value="Cụ nội, cụ ngoại">Cụ nội, cụ ngoại</option>
                    <option value="Bác ruột, chú ruột, cậu ruột, cô ruột, dì ruột, chắt ruột">Bác ruột, chú ruột, cậu ruột, cô ruột, dì ruột, chắt ruột</option>
                    <option value="Người giám hộ">Người giám hộ</option>
                    <option value="Người ở nhờ; ở mượn; ở thuê">Người ở nhờ; ở mượn; ở thuê</option>
                    <option value="Người cùng ở nhờ; cùng ở thuê; cùng ở mượn">Người cùng ở nhờ; cùng ở thuê; cùng ở mượn</option>
                  </select>
  </td>
  <td>
                  <select name="isOwner[]" class="form-control">
                    <option value="0">Sai</option>
                    <option value="1">Đúng</option>
                  </select>
                </td>
  <td>
    <button type="button" name="remove" class="btn btn-danger remove">Bỏ</button>
  </td>

`;


  addMemberButton.addEventListener('click', function () {
      const memberWrapper = document.createElement('tr');
      memberWrapper.innerHTML = memberTemplate;
      membersContainer.appendChild(memberWrapper);

      const removeButtons = document.getElementsByClassName('remove');
      for (let i = 0; i < removeButtons.length; i++) {
          const removeButton = removeButtons[i];
          removeButton.addEventListener('click', function () {
              memberWrapper.remove();
          });
      }
  });



</script>
@endpush
