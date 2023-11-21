@extends('layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">製品一覧
        <a href="{{ url('products/create') }}" class="btn btn-primary btn-sm text-white float-right">製品の追加</a>
    </h5>
    <div class="card-body">
        @include('layouts.notification')

        <div class="table-responsive">
            @if(count($products) > 0)
                <table class="table table-bordered" id="product-dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>製品名</th>
                            <th>カテゴリー</th>
                            <th>価格</th>
                            <th>製品の写真</th>
                            <th>アクション</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->image }}</td>
                                <td>
                                    <a href="{{ url('products/'.$product->id.'/edit') }}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="編集" data-placement="bottom"><i class="fas fa-edit"></i></a>
                                    <form method="POST" action="{{ url('products/'.$product->id.'/delete') }}">
                                        @csrf 
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm dltBtn" data-id="{{ $product->id }}" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="削除"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h6 class="text-center">製品が見つかりません。新しい製品を追加してください！</h6>
            @endif
        </div>
    </div>
</div>

@endsection

@push('styles')
    <link href="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
    <style>
        div.dataTables_wrapper div.dataTables_paginate {
            display: none;
        }
    </style>
@endpush

@push('scripts')

    <!-- Page level plugins -->
    <script src="{{ asset('template/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('template/js/demo/datatables-demo.js') }}"></script>
    <script>
        $('#product-dataTable').DataTable({
            "columnDefs": [
                {
                    "orderable": false,
                    "targets": []
                }
            ]
        });

        // Sweet alert

        function deleteData(id) {

        }
    </script>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.dltBtn').click(function (e) {
                var form = $(this).closest('form');
                var dataID = $(this).data('id');
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
