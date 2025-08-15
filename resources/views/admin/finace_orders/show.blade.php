@extends('layouts.main')

@section('css')
@endsection

@section('page_title')
    Chi tiết đơn trả góp
@endsection

@section('title')
    Chi tiết đơn trả góp
@endsection

@section('buttons')
@endsection

@section('content')

<div ng-controller="Order" ng-cloak>
    <style>
        /* Key–Value grid gọn gàng */
        .kv-cols{
            display:grid;
            grid-template-columns:repeat(2,minmax(0,1fr));
            gap:12px 24px;
        }
        .kv{
            display:flex;
            justify-content:space-between;
            align-items:flex-start;
            gap:12px;
            padding:10px 12px;
            background:#f8f9fa;          /* nhạt, dễ đọc trên nền trắng */
            border:1px solid #eef1f4;
            border-radius:8px;
        }
        .kv .k{
            color:#6b7280;
            font-weight:600;
            min-width:140px;              /* giúp cột “nhãn” thẳng hàng */
        }
        .kv .v{
            font-weight:500;
            text-align:right;
            word-break:break-word;
            max-width:100%;
        }
        .card-header h6{margin:0;font-weight:700;}
        @media (max-width: 767px){
            .kv-cols{ grid-template-columns:1fr; }
            .kv .v{ text-align:left; }
        }

    </style>
    <div class="row">
        <div class="col-md-12">
            <!-- CARD: Thông tin khách hàng -->
            <div class="card">
                <div class="card-header"><h6>Thông tin khách hàng</h6></div>
                <div class="card-body">
                    <div class="kv-cols">
                        <div class="kv">
                            <span class="k">Khách hàng</span>
                            <span class="v"><% (form.customer_name) %></span>
                        </div>
                        <div class="kv">
                            <span class="k">Email</span>
                            <span class="v"><% form.email %></span>
                        </div>
                        <div class="kv">
                            <span class="k">SĐT</span>
                            <span class="v"><% form.phone %></span>
                        </div>
                        <div class="kv">
                            <span class="k">Địa chỉ</span>
                            <span class="v"><% form.address %></span>
                        </div>
                        <div class="kv">
                            <span class="k">CCCD</span>
                            <span class="v"><% form.cccd %></span>
                        </div>
                        <div class="kv">
                            <span class="k">Ngày sinh</span>
                            <span class="v"><% form.dob | date:'dd/MM/yyyy' %></span><!-- đổi theo tên field của bạn -->
                        </div>
                        <div class="kv">
                            <span class="k">Trạng thái</span>
                            <span class="v"><% getStatus(form.status) %></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CARD: Thông tin trả góp -->
            <div class="card mt-3">
                <div class="card-header"><h6>Thông tin trả góp</h6></div>
                <div class="card-body">
                    <div class="kv-cols">
                        <div class="kv">
                            <span class="k">Công ty tài chính</span>
                            <span class="v"><% form.company_name %></span>
                        </div>
                        <div class="kv">
                            <span class="k">Số tháng</span>
                            <span class="v"><% form.sothangtragop %> tháng</span>
                        </div>
                        <div class="kv">
                            <span class="k">% trả trước</span>
                            <span class="v"><% form.sophantramtratruoc | number:0 %>%</span>
                        </div>
                        <div class="kv">
                            <span class="k">Tiền trả trước</span>
                            <span class="v"><% form.sotientratruoc | number:0 %> đ</span>
                        </div>
                        <div class="kv">
                            <span class="k">Góp mỗi tháng</span>
                            <span class="v"><% form.sotiengopmoithang | number:0 %> đ</span><!-- hoặc form.monthly -->
                        </div>
                        <div class="kv">
                            <span class="k">Tổng phải trả</span>
                            <span class="v"><% form.tongtien | number:0 %> đ</span><!-- hoặc form.totalWithDown -->
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Chi tiết đơn hàng</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <table class="table table-bordered table-hover table-responsive">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên hàng hóa</th>
                                <th>Phân loại</th>
                                <th>Giá tiền</th>
                                <th>Số lượng đặt mua</th>
                                <th>Thành tiền</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="detail in form.details track by $index">
                                <td class="text-center"><% $index + 1 %></td>
                                <td class="text-center"><% detail.product.name %></td>
                                <td class="text-center">
                                    <% detail.variant.name %>
                                </td>
                                <td class="text-center"><% detail.product.price | number %></td>
                                <td class="text-center"><% detail.quantity | number %></td>
                                <td class="text-right"><% (detail.quantity * detail.price) | number %></td>

                            </tr>
                            <tr>
                                <td colspan="5" class="text-right"><b>Tổng thành tiền: </b></td>
                                <td class="text-right"><b><% form.total_after_discount | number %></b></td>
                            </tr>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <hr>

    <div class="text-right">
        <a href="{{ route('orders-finance.index') }}" class="btn btn-danger btn-cons">
            <i class="fa fa-remove"></i> Quay lại
        </a>
    </div>
</div>
@endsection

@section('script')
    @include('admin.finace_orders.Order')

    <script>
        app.controller('Order', function ($scope, $http) {
            $scope.form = new Order(@json($order), {scope: $scope});
            $scope.statuses = @json(\App\Model\Admin\FinanceOrder::STATUSES);


            $scope.getTotal = function(){
                var sum = 0;
                angular.forEach($scope.form.details, function(detail){
                    var price = detail.price;
                    sum += detail.quantity * price;
                });
                return sum;

            };

            $scope.form.total_after_discount = $scope.getTotal();

            $scope.getStatus = function (status) {
                let obj = $scope.statuses.find(val => val.id == status);
                return obj.name;
            }

        });
    </script>
@endsection
