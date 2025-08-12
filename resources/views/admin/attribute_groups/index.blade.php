@extends('layouts.main')

@section('css')
    <link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css"
          rel="stylesheet"/>
@endsection

@section('page_title')
Quản lý nhóm thuộc tính
@endsection

@section('title')
    Quản lý nhóm thuộc tính
@endsection

@section('buttons')
<a href="javascript:void(0)" class="btn btn-outline-success" data-toggle="modal" data-target="#create-status" class="btn btn-info" ng-click="errors = null"><i class="fa fa-plus"></i> Thêm mới</a>
@endsection
@section('content')
<div ng-cloak>
    <div class="row" ng-controller="Statues">
        <div class="col-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="table-list">
                    </table>
                </div>
            </div>
        </div>

        {{-- Form tạo mới --}}
        @include('admin.attribute_groups.create')
        @include('admin.attribute_groups.edit')

    </div>

    <style>
        .order-chip{
            display:inline-flex;
            align-items:center;
            justify-content:center;
            min-width:2rem;      /* giữ số không nhảy */
            height:2rem;
            padding:0 .5rem;
            border-radius:999px; /* pill */
            background:#f6f8fa;
            border:1px solid #e5e7eb;
            color:#0f172a;
            font-weight:600;
            font-variant-numeric: tabular-nums;
            box-shadow:0 1px 0 rgba(0,0,0,.04);
        }

    </style>
</div>
@endsection

@section('script')

    <script type="text/javascript"
            src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>

@include('admin.attribute_groups.AttributeGroup')
<script>
    let datatable = new DATATABLE('table-list', {
        ajax: {
            url: '{!! route('attributeGroups.searchData') !!}',
            data: function (d, context) {
                DATATABLE.mergeSearch(d, context);
            }
        },
        columns: [
            {data: 'DT_RowIndex', orderable: false, title: "STT", className: "text-center"},
            {data: 'name', title: 'Tên nhóm'},
            {
                data: 'sort_order',
                title: 'Thứ tự hiển thị',
                className: 'text-center',
                render: function (data, type) {
                    const val = parseInt(data, 10) || 0;
                    if (type === 'sort' || type === 'type') return val;
                    return `<span class="order-chip" aria-label="Thứ tự ${val}">${String(val).padStart(2,'0')}</span>`;
                }
            },
            {data: 'updated_at', title: 'Ngày cập nhật', className: "text-center"},
            {data: 'updated_by', title: 'Người cập nhật', className: "text-center"},
            {data: 'action', orderable: false, title: "Hành động"}
        ],
        search_columns: [
            {data: 'name', search_type: "text", placeholder: "Tên nhóm"},
        ],
    }).datatable;

    createReviewCallback = (response) => {
        datatable.ajax.reload();
    }

    app.controller('Statues', function ($rootScope, $scope, $http) {
        $scope.loading = {};
        $scope.form = {}

        $('#table-list').on('click', '.edit', function () {
            $scope.data = datatable.row($(this).parents('tr')).data();

            $.ajax({
                type: 'GET',
                url: "/admin/attribute-groups/" + $scope.data.id + "/getDataForEdit",
                headers: {
                    'X-CSRF-TOKEN': CSRF_TOKEN
                },
                data: $scope.data.id,

                success: function(response) {
                    if (response.success) {

                        $scope.booking = response.data;

                        $rootScope.$emit("editStatus", $scope.booking);
                    } else {
                        toastr.warning(response.message);
                        $scope.errors = response.errors;
                    }
                },
                error: function(e) {
                    toastr.error('Đã có lỗi xảy ra');
                },
                complete: function() {
                    $scope.loading.submit = false;
                    $scope.$applyAsync();
                }
            });
            $scope.errors = null;
            $scope.$apply();
            $('#edit-status').modal('show');
        });

    })



</script>
@include('partial.confirm')
@endsection
