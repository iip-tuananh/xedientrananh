@extends('layouts.main')

@section('css')
@endsection

@section('page_title')
Quản lý công ty tài chính
@endsection

@section('title')
    Quản lý công ty tài chính
@endsection

@section('buttons')
    @if(Auth::user()->type == App\Model\Common\User::QUAN_TRI_VIEN || Auth::user()->type == App\Model\Common\User::SUPER_ADMIN)
        <a
            href="{{ route('finance_companies.create') }}"
            class="btn btn-outline-success btn-sm"
        >
            <i class="fa fa-plus"></i> Thêm mới
        </a>
    @endif

@endsection
@section('content')
<div ng-cloak>
    <div class="row" ng-controller="Orders">
        <div class="col-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="table-list">
                    </table>
                </div>
            </div>
        </div>


    </div>



</div>
@endsection

@section('script')
{{--@include('admin.orders.Order')--}}
<script>
    let datatable = new DATATABLE('table-list', {
        ajax: {
            url: '/admin/finance-companies/searchData',
            data: function (d, context) {
                DATATABLE.mergeSearch(d, context);
            }
        },
        columns: [
            {data: 'DT_RowIndex', orderable: false, title: "STT", className: "text-center"},
            {data: 'name', title: 'Tên công ty'},
            {data: 'hotline', title: 'Hotline'},
            {data: 'status', title: 'Trạng thái', className: "text-center"},
            {data: 'updated_at', title: 'Ngày cập nhật'},
            {data: 'action', orderable: false, title: "Hành động"}
        ],
        search_columns: [
            {data: 'name', search_type: "text", placeholder: "Tên công ty"},
        ],
    }).datatable;

    createReviewCallback = (response) => {
        datatable.ajax.reload();
    }

    app.controller('Orders', function ($rootScope, $scope, $http) {
        $scope.loading = {};
        $scope.statues = @json(\App\Model\Admin\Order::STATUSES);
        $scope.form = {}

        $('#table-list').on('click', '.update-status', function () {
            event.preventDefault();
            $scope.data = datatable.row($(this).parents('tr')).data();
            console.log($scope.data);
            $scope.form.status = $scope.data.status;
            $scope.$apply();
            $('#update-status').modal('show');
        });

        $scope.submit = function () {
            $.ajax({
                type: 'POST',
                url: "{{route('orders-finance.update.status')}}",
                headers: {
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                },
                data: {
                    order_id: $scope.data.id,
                    status:  $scope.form.status
                },
                success: function(response) {
                    if (response.success) {
                        toastr.success(response.message);
                    } else {
                        toastr.warning(response.message);
                    }
                },
                error: function(e) {
                    toastr.error('Đã có lỗi xảy ra');
                },
                complete: function() {
                    $('#update-status').modal('hide');
                    datatable.ajax.reload();
                    $scope.loading.submit = false;
                    $scope.$applyAsync();
                }
            });
        }

        $(document).on('click', '.export-button', function(event) {
            event.preventDefault();
            let data = {};
            mergeSearchV2(data);
            window.location.href = $(this).attr('href') + "?" + $.param(data);
        })
    })

    app.controller('ImportExcel', function ($scope) {
        $scope.sample = "";
        $scope.note = "Import file excel được xuất từ phần mềm accesstrade";
        $scope.loading = false;
        $scope.import = function() {
            var url = "{!! route('orders.importExcel') !!}";
            var data = new FormData(document.getElementById('import-excel-form'));
            $scope.loading = true;
            $scope.errors = null;
            $scope.import_details = null;
            $.ajax({
                type: 'POST',
                url: url,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': CSRF_TOKEN
                },
                data: data,
                success: function(response) {
                    if (response.success) {
                        toastr.success(response.message);
                        $scope.import_details = response.details;
                        datatable.ajax.reload();
                        $scope.loading = false;
                        // $('#import-excel').modal('hide');
                    } else {
                        toastr.warning(response.message);
                        $scope.errors = response.errors;
                        $scope.loading = false;
                    }
                },
                error: function(error) {
                    toastr.error('Đã có lỗi xảy ra');
                },
                complete: function() {
                    $scope.loading = false;
                    $scope.$applyAsync();
                }
            });
        }

        $('#import-excel').on('hidden.bs.modal', function (e) {
            document.getElementById('import-excel-form').reset();
            $scope.errors = null;
            $scope.import_details = null;
            $scope.$applyAsync();
        })
    });
</script>
@include('partial.confirm')
@endsection
