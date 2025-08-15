@extends('layouts.main')

@section('css')
    <link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css"
          rel="stylesheet"/>
@endsection

@section('page_title')
    Quản lý serial sản phẩm {{ $product ? $product->name : '' }}
@endsection

@section('title')
    Quản lý serial sản phẩm {{ $product ? $product->name : '' }}
@endsection

@section('buttons')
    @if(Auth::user()->type == App\Model\Common\User::QUAN_TRI_VIEN || Auth::user()->type == App\Model\Common\User::SUPER_ADMIN)
        <a
            href="{{ route('product_variants.create') }}?product-id={{ request()->get('product-id') }}"
            class="btn btn-outline-success btn-sm"
        >
            <i class="fa fa-plus"></i> Thêm mới
        </a>
        {{-- <a href="javascript:void(0)" target="_blank" data-href="{{ route('Product.exportExcel') }}" class="btn btn-info export-button btn-sm"><i class="fas fa-file-excel"></i> Xuất file excel</a>
        <a href="javascript:void(0)" target="_blank" data-href="{{ route('Product.exportPDF') }}" class="btn btn-warning export-button btn-sm"><i class="far fa-file-pdf"></i> Xuất file pdf</a> --}}
    @endif

@endsection

@section('content')
    <div>
        <div class="row" ng-controller="Product">
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

    <style>
        .badge-xl {
            font-size: 0.7rem;      /* chữ to hơn */
            padding: 0.5em 1em;     /* padding dày hơn */
        }

        .btn-sm.toggle-default {
            font-size: 0.75rem;      /* giảm size chữ */
            padding: 0.2rem 0.4rem;  /* giảm padding */
        }

        .badge-status{display:inline-flex;align-items:center;gap:.4rem;padding:.35rem .6rem;border-radius:999px;font-weight:600}
        .badge-dot{width:.5rem;height:.5rem;border-radius:50%;display:inline-block;background:currentColor;opacity:.9}

        /* màu mềm */
        .badge-soft-success{color:#198754;background:rgba(25,135,84,.12);border:1px solid rgba(25,135,84,.22)}
        .badge-soft-danger{color:#dc3545;background:rgba(220,53,69,.12);border:1px solid rgba(220,53,69,.22)}

    </style>

    @include('common.units.createUnit')
@endsection

@section('script')
    <script type="text/javascript"
            src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>

    @include('admin.products.Product')
    <script>
        const params = new URLSearchParams(window.location.search);
        const productId = params.get('product-id');

        let datatable = new DATATABLE('table-list', {
            pageLength: 30,
            ajax: {
                url: '/admin/product-variants/searchData',
                data: function (d, context) {
                    DATATABLE.mergeSearch(d, context);
                    d.product_id = productId;
                }
            },
            columns: [
                {data: 'DT_RowIndex', orderable: false, title: "STT", className: "text-center"},
                {
                    data: 'sku',
                    title: 'Biến thể',
                    className: 'text-start',
                    render: function(sku, type, row) {
                        if (type === 'display') {
                            return `
        <div class="d-flex align-items-center">
          <img src="${row.image ? row.image.path :  ''}"
               alt="${row.name}"
               style="width:60px; height:60px; object-fit:cover; border-radius:4px; margin-right:8px;">
          <div>
            <div class="fw-semibold">${row.name}</div>
            <div class="text-muted" style="font-size:0.9em;">${sku}</div>
          </div>
        </div>`;
                        }
                        return sku;
                    }
                },
                {data: 'product_id', title: 'Sản phẩm'},
                {
                    data: 'is_default',
                    title: 'Mặc định',
                    className: 'text-center',
                    render: function(data, type, row) {
                        if (type === 'display') {
                            const btnClass = data == 1
                                ? 'btn-success'
                                : 'btn-secondary';
                            const text = data == 1
                                ? 'Mặc định'
                                : 'Không';
                            return `
                                <button
                                  class="btn btn-sm toggle-default ${btnClass} px-2 py-1"
                                  data-id="${row.id}"
                                  data-default="${data}">
                                  ${text}
                                </button>`;
                        }
                        return data;
                    }
                },
                {
                    data: 'status',
                    title: 'Trạng thái',
                    className: 'text-center',
                    render: function (data, type, row) {
                        const v = (data === 1 || data === '1' || data === true) ? 1 : 0;

                        if (type === 'display') {
                            return v === 1
                                ? '<span class="badge badge-soft-success badge-status"><span class="badge-dot"></span>Còn hàng</span>'
                                : '<span class="badge badge-soft-danger badge-status"><span class="badge-dot"></span>Hết hàng</span>';
                        }
                        return v;
                    }
                },
                {data: 'updated_at', title: 'Ngày cập nhật', className: "text-center"},
                {data: 'action', orderable: false, title: "Hành động", className: "text-center"}
            ],
            search_columns: [
                {data: 'keyword', search_type: "text", placeholder: "Tên hoặc mã biến thể"},
                {
                    data: 'is_default', search_type: "select", placeholder: "Đặt làm mặc định",
                    column_data: [{id: 1, name: "Mặc định"}, {id: 0, name: "Không"}]
                },
            ],
        }).datatable;

        app.controller('Product', function ($scope, $rootScope, $http) {
            $scope.units = @json(App\Model\Common\Unit::all());
            $scope.categories = @json(App\Model\Common\ProductCategory::all());
            $scope.categorieSpeicals = @json(\App\Model\Admin\CategorySpecial::getForSelectForProduct());
            $scope.loading = {};
            $scope.arrayInclude = arrayInclude;
            $scope.productId = params.get('product-id');

            $rootScope.$on("createdProductCategory", function (event, data) {
                $scope.formEdit.all_categories.push(data);
                $scope.formEdit.product_category_id = data.id;
                $scope.$applyAsync();
            });

            // Show hàng hóa
            $('#table-list').on('click', '.show-product', function () {
                $scope.data = datatable.row($(this).parents('tr')).data();
                $scope.formEdit = new Product($scope.data, {scope: $scope});
                $scope.$apply();
                $('#show-modal').modal('show');
            });

            // Sửa hàng hóa
            $('#table-list').on('click', '.edit', function () {
                $scope.data = datatable.row($(this).parents('tr')).data();
                $scope.formEdit = new Product($scope.data, {scope: $scope});

                createUnitCallback = (response) => {
                    $scope.formEdit.all_units.push(response);
                    $scope.formEdit.unit_id = response.id;
                }

                $scope.errors = null;
                $scope.$apply();
                $('#edit-modal').modal('show');
            });

            // Submit mode mới
            $scope.submit = function () {
                $scope.loading.submit = false;
                $.ajax({
                    type: 'POST',
                    url: "/uptek/products/" + $scope.formEdit.id + "/update",
                    headers: {
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    processData: false,
                    contentType: false,
                    data: $scope.formEdit.submit_data,
                    success: function (response) {
                        if (response.success) {
                            $('#edit-modal').modal('hide');
                            toastr.success(response.message);
                            if (datatable.datatable) datatable.ajax.reload();
                            $scope.errors = null;
                        } else {
                            toastr.warning(response.message);
                            $scope.errors = response.errors;
                        }
                    },
                    error: function (e) {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function () {
                        $scope.loading.submit = false;
                        $scope.$applyAsync();
                    }
                });
            }

            $('#table-list').on('click', '.add-category-special', function () {
                event.preventDefault();
                $scope.data = datatable.row($(this).parents('tr')).data();
                $.ajax({
                    type: 'GET',
                    url: "/admin/products/" + $scope.data.id + "/getData",
                    headers: {
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    data: $scope.data.id,

                    success: function (response) {
                        if (response.success) {
                            $scope.product = response.data;
                            console.log($scope.product);
                        } else {
                            toastr.warning(response.message);
                        }
                        $scope.$applyAsync();
                    },
                    error: function (e) {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function () {
                        $scope.loading.submit = false;
                        $scope.$applyAsync();
                    }
                });

                $('#add-to-category-special').modal('show');
            })

            $('#table-list').on('click', '.toggle-default', function() {
                const $btn = $(this);
                const id = $btn.data('id');
                const current = parseInt($btn.data('default'), 10);
                const nextValue = current === 1 ? 0 : 1;

                $.ajax({
                    url: `/admin/product-variants/${id}/toggle-default`,
                    type: 'POST',
                    data: {
                        _token: CSRF_TOKEN,
                        is_default: nextValue
                    },
                    success: function(response) {
                        if (response.success) {
                            // Reload lại table hoặc chỉ cập nhật cell
                            datatable.ajax.reload(null, false);
                        } else {
                            alert('Cập nhật thất bại');
                        }
                    },
                    error: function() {
                        alert('Có lỗi xảy ra, vui lòng thử lại');
                    }
                });
            });

            $scope.submit = function () {
                let url = "/admin/products/add-category-special";
                $scope.loading.submit = true;
                console.log($scope.product.category_special_ids);
                $.ajax({
                    type: "POST",
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    data: {
                        product_id: $scope.product.id,
                        category_special_ids: $scope.product.category_special_ids
                    },
                    success: function (response) {
                        if (response.success) {
                            $('#add-to-category-special').modal('hide');
                            toastr.success(response.message);
                            datatable.ajax.reload();
                        } else {
                            $scope.errors = response.errors;
                            toastr.warning(response.message);
                        }
                    },
                    error: function () {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function () {
                        $scope.loading.submit = false;
                        $scope.$applyAsync();
                    },
                });
            }

        })

        function removeProductArr() {
            var product_remove_ids = [];
            var rows_selected = datatable.column(0).checkboxes.selected();

            $.each(rows_selected, function (index, rowId) {
                product_remove_ids.push(rowId);
            });

            if(product_remove_ids.length == 0) {
                toastr.warning("Chưa có sản phẩm nào được chọn");
                return;
            }

            var product_ids = product_remove_ids.join(',');
            swal({
                title: "Xác nhận xóa!",
                text: "Bạn chắc chắn muốn xóa "+product_remove_ids.length+" sản phẩm",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Xác nhận",
                cancelButtonText: "Hủy",
                closeOnConfirm: false
            }, function(isConfirm) {
                if (isConfirm) {
                    window.location.href = "{{route('product_variants.delete.multi')}}?product_ids="+product_ids;
                }
            })
        }

        $(document).on('click', '.export-button', function (event) {
            event.preventDefault();
            let data = {};
            mergeSearch(data, datatable.context[0]);
            window.location.href = $(this).data('href') + "?" + $.param(data);
        })

    </script>
    @include('partial.confirm')
@endsection
