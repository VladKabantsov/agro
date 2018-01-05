@extends('layouts.master')

@section('content')
    <table class="table table-bordered table-striped" id="users-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
@endsection

@push('scripts')
<script>
    $(function () {
        $('#users-table').DataTable({
            serverSide: false,
            processing: true,
            ajax: '/array-data',
               "columns": [
                    {data: "id" },
                    {data: "name" },
                    {data: "email" },
                    {data: "created_at" },
                    {data: "updated_at" },
                    {data: 'action', orderable: false, searchable: false},
                ]
        });
    });
    $('#users-table tbody').on( 'click', 'button', function () {
        //var data = table.row( $(this).parents('tr') ).data();
        var data = table.row(0).data();
        alert( data );
    } );
</script>
@endpush

