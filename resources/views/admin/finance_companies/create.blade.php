@extends('layouts.main')

@section('css')
@endsection

@section('page_title')
    Thêm công ty tài chính
@endsection

@section('title')
    Thêm công ty tài chính
@endsection

@section('buttons')
@endsection

@section('content')

    <div ng-controller="CreateFinance" ng-cloak>
        @include('admin.finance_companies.form')
    </div>
@endsection

@section('script')
    @include('admin.finance_companies.FinanceCompany')
    <script>
        app.controller('CreateFinance', function ($scope, $http) {
            $scope.loading = {};
            $scope.form = new FinanceCompany({}, {scope: $scope});

            $scope.statuses = @json(\App\Model\Admin\Order::STATUSES);
            $scope.termOptions = [6, 8, 9, 12, 15, 18];

            $scope.submit = function () {
                $scope.loading.submit = true;
                let data = $scope.form.submit_data;
                $.ajax({
                    type: 'POST',
                    url: "/admin/finance-companies",
                    headers: {
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    processData: false,
                    contentType: false,
                    data: data,
                    success: function (response) {
                        if (response.success) {
                            toastr.success(response.message);
                            {{--window.location.href = "{{ route('product_variants.index') }}";--}}
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


        });
    </script>
@endsection
