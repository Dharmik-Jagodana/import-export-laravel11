@extends($adminTheme)

@section('title','Product')

@section('content')
<main id="main" class="main">

    <div class="row mb-3">
        <div class="col-md-6">
            <form action="{{ route('products.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success"><i class="fa fa-file"></i> Import User Data</button>
            </form>
        </div>
    </div>
    {{-- Page Title --}}
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="pagetitle mb-0 pt-1">
                <h1>Product List</h1>
            </div>
        </div>
        <div class="col-md-6 text-end">
            <a class="btn btn-warning float-end" href="{{ route('products.export') }}"><i class="fa fa-download"></i> Export User Data</a>
        </div>
    </div>

    {{-- Table --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body mt-4">
                    <table class="table table-bordered datatable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>User Name</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Detalis</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('script')
<script>
    $(function () {
        var table = $('.datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('product.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {data: 'user_id', name: 'user_id'},
                {data: 'name', name: 'name'},
                {data: 'price', name: 'price'},
                {data: 'stock', name: 'stock'},
                {data: 'deatils', name: 'deatils'},
                {data: 'created_at', name: 'created_at'},
            ]
        });
    });
</script>
@endsection