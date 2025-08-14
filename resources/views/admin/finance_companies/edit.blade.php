@extends('layouts.main')

@section('css')

@endsection

@section('title')
    Cập nhật công ty tài chính
@endsection

@section('page_title')
    Cập nhật công ty tài chính
@endsection

@section('content')
    <div ng-controller="EditFinance" ng-cloak>
        @include('admin.finance_companies.form')
    </div>
@endsection

@section('script')
    @include('admin.finance_companies.FinanceCompany')

    <script>
        app.controller('EditFinance', function ($scope, $http) {
            $scope.arrayInclude = arrayInclude;
            $scope.edit = true;
            $scope.statuses = @json(\App\Model\Admin\Order::STATUSES);
            $scope.loading = {};

            $scope.termOptions = [6, 8, 9, 12, 15, 18];
            $scope.form = new FinanceCompany(@json($object), {scope: $scope});

            // $scope.form.packages = ($scope.form.packages || []).map(function(p){
            //     p.term_months    = +p.term_months || null;
            //     p.down_pct_min   = p.down_pct_min   != null ? parseFloat(p.down_pct_min)   : null;
            //     p.down_pct_max   = p.down_pct_max   != null ? parseFloat(p.down_pct_max)   : null;
            //     p.interest_monthly = p.interest_monthly != null ? parseFloat(p.interest_monthly) : null;
            //
            //     return p;
            // });

            $scope.submit = function () {
                $scope.loading.submit = true;
                let data = $scope.form.submit_data;

                $.ajax({
                    type: 'POST',
                    url: "/admin/finance-companies/" + "{{ $object->id }}" + "/update",
                    headers: {
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    processData: false,
                    contentType: false,
                    data: data,
                    success: function (response) {
                        if (response.success) {
                            toastr.success(response.message);
                            {{--window.location.href = "{{ route('product_variants.index') }}?product-id={{ $object->product_id }}";--}}
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
