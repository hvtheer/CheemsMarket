@extends('layouts.master')

@section('main-content')

 <div class="card shadow mb-4">
     <div class="row">
         <div class="col-md-12">
            @include('layouts.notification')
         </div>
     </div>
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary float-left">カテゴリ一覧</h6>
      <a href="{{url('categories/create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom"><i class="fas fa-plus"></i>カテゴリーの追加</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        @if(count($categories)>0)
        <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>名前</th>
              <th>コンテンツ</th>
              <th>親カテゴリー</th>
              <th>アクション</th>
            </tr>
          </thead>
          <tbody>
            @foreach($categories as $category)   
                <tr>
                  <td>{{$category->id}}</td>
                  <td>{{$category->name}}</td>
                  <td>{{$category->content}}</td>
                  <td>{{ $category->parentCategory ? $category->parentCategory->name : '' }}</td>
                  <td>
                    <a href="{{url('categories/'.$category->id.'/edit')}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="編集" data-placement="bottom"><i class="fas fa-edit"></i></a>
                    <form method="POST" action="{{url('categories/'.$category->id.'/delete')}}">
                      @csrf 
                      @method('delete')
                      <button class="btn btn-danger btn-sm dltBtn" data-id={{$category->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="削除"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
                  </td>
                </tr>  
            @endforeach
          </tbody>
        </table>
        {{-- <span style="float:right">{{$categories->links()}}</span> --}}
        @else
          <h6 class="text-center">カテゴリが見つかりません。新しいカテゴリを追加してください！</h6>
        @endif
      </div>
    </div>
</div>
@endsection

@push('styles')
  <link href="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <style>
      div.dataTables_wrapper div.dataTables_paginate{
          display: none;
      }
  </style>
@endpush

@push('scripts')

  <!-- Page level plugins -->
  <script src="{{asset('template/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('template/js/demo/datatables-demo.js')}}"></script>
  <script>
      
      $('#banner-dataTable').DataTable( {
            "columnDefs":[
                {
                    "orderable":false,
                    "targets":[]
                }
            ]
        } );

        // Sweet alert

        function deleteData(id){
            
        }
  </script>
  <script>
      $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
          $('.dltBtn').click(function(e){
            var form=$(this).closest('form');
              var dataID=$(this).data('id');
              // alert(dataID);
              e.preventDefault();
              swal({
                    title: "本当に削除しますか？",
                    text: "削除するとデータは元に戻りません！",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                       form.submit();
                    } else {
                        swal("データは安全です!");
                    }
                });
          })
      })
  </script>
@endpush
