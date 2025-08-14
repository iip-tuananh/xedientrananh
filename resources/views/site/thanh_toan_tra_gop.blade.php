@extends('site.layouts.master')
@section('title')

@endsection
@section('description')

@endsection
@section('image')

@endsection

@section('css')
@endsection

@section('content')
    <style>
        :root{
            --bg:#f6f7f9;
            --card:#fff;
            --pri:#ff6b00;
            --pri-600:#e55f00;
            --text:#1f2937;
            --muted:#6b7280;
            --line:#e5e7eb;
            --radius:14px;
        }
        .emi-wrap{
            font-family: system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, "Apple Color Emoji","Segoe UI Emoji";
            color:var(--text);
            background:var(--bg);
            padding:16px;
        }
        .emi-header{
            display:flex; justify-content:space-between; align-items:center;
            margin:0 auto 12px; max-width:1100px;
        }
        .emi-header a{ color:#2563eb; text-decoration:none; font-size:14px }
        .emi-header a:hover{ text-decoration:underline }
        .emi-header h2{ margin:0; font-size:18px; font-weight:700 }

        .emi-grid{
            display:grid; gap:18px; grid-template-columns: 1fr 1.2fr;
            max-width:1100px; margin:0 auto;
        }
        @media (max-width: 992px){ .emi-grid{ grid-template-columns:1fr; } }

        .card{ background:var(--card); border:1px solid var(--line); border-radius:var(--radius); }
        .card .card-hd{ padding:14px 16px; border-bottom:1px solid var(--line); font-weight:600 }
        .card .card-bd{ padding:14px 16px }

        /* LEFT: Cart */
        .cart-list{ display:flex; flex-direction:column; gap:12px }
        .cart-item{ display:flex; gap:12px; }
        .cart-item .thumb{
            width:74px; height:54px; border:1px solid var(--line); border-radius:10px;
            background:#fafafa; display:flex; align-items:center; justify-content:center; font-size:12px; color:var(--muted);
            flex:0 0 74px;
        }
        .cart-item .meta{ display:flex; flex-direction:column; gap:4px; flex:1 }
        .cart-item .name{ font-size:14px; font-weight:600; line-height:1.3 }
        .cart-item .sku{ font-size:12px; color:var(--muted) }
        .cart-item .price{ font-size:13px; color:#b91c1c; font-weight:700 }

        .stack{ display:flex; flex-direction:column; gap:8px; }
        .row-flex{ display:flex; justify-content:space-between; align-items:center; gap:12px; font-size:14px }
        .row-flex.total{ font-weight:800; font-size:16px; border-top:1px dashed var(--line); margin-top:6px; padding-top:10px }
        .muted{ color:var(--muted); font-weight:500 }
        .note-orange{ color:#b91c1c; font-weight:700 }
        .tiny{ font-size:12px; color:var(--muted) }

        .controls{
            display:grid; grid-template-columns: 1fr 1fr; gap:10px; margin:10px 0 2px;
        }
        .controls .control{ display:flex; flex-direction:column; gap:6px }
        .controls select, .controls input{
            border:1px solid var(--line); border-radius:10px; padding:10px 12px; font-size:14px; background:#fff;
        }

        /* RIGHT: form */
        form .field{ margin-bottom:10px }
        form .field label{ display:block; font-size:13px; color:var(--muted); margin-bottom:6px }
        form .field input, form .field select, form .field textarea{
            width:100%; border:1px solid var(--line); border-radius:10px; padding:10px 12px; font-size:14px; background:#fff;
        }
        .inline-3{ display:grid; grid-template-columns:1fr 1fr 1fr; gap:10px }
        .inline-2{ display:grid; grid-template-columns:1fr 1fr; gap:10px }
        @media (max-width: 576px){ .inline-2, .inline-3{ grid-template-columns:1fr } }

        /* Finance companies */
        .fin-list{ display:grid; grid-template-columns:repeat(3,1fr); gap:10px }
        @media (max-width: 576px){ .fin-list{ grid-template-columns:repeat(2,1fr) } }
        .fin-item{
            border:1px solid var(--line); border-radius:12px; padding:10px; text-align:center; cursor:pointer; user-select:none;
            font-size:13px; color:var(--text); background:#fff; transition: .15s ease;
        }
        .fin-item:hover{ border-color:#cbd5e1 }
        .fin-item.active{ outline:2px solid #2563eb; outline-offset:2px }

        /* Radios (type) */
        .radio-group{ display:flex; gap:14px; flex-wrap:wrap; }
        .chip{
            border:1px solid var(--line); border-radius:999px; padding:8px 12px; cursor:pointer; user-select:none; font-size:14px;
        }
        .chip.active{ background:#eff6ff; border-color:#bfdbfe; color:#1e40af; }

        /* Branch list */
        .branch-list{ display:flex; flex-direction:column; gap:8px; max-height:190px; overflow:auto; border:1px dashed var(--line); padding:10px; border-radius:12px }
        .branch{
            padding:10px 12px; border:1px solid var(--line); border-radius:10px; font-size:13px; cursor:pointer;
        }
        .branch.selected{ border-color:#2563eb; background:#eff6ff }
        .branch small{ color:var(--muted) }

        /* Submit */
        .actions{ padding:14px 16px; border-top:1px solid var(--line); background:#fff; border-radius:0 0 var(--radius) var(--radius) }
        .btn-primary{
            width:100%; padding:12px 16px; border:none; border-radius:12px; background:var(--pri); color:#fff; font-weight:700; font-size:15px; cursor:pointer;
        }
        .btn-primary:hover{ background:var(--pri-600) }
        .tiny-help{ text-align:center; margin-top:6px; font-size:12px; color:var(--muted) }




        /* ===== Refresh spacing for the info form ===== */

        /* Tăng khoảng cách giữa các khối con trong .card-bd */
        .card .card-bd > * + * { margin-top: 16px; }

        /* Mỗi field cách nhau và label rõ ràng hơn */
        .card .field { margin: 0; }
        .card .field label{
            display:block;
            margin-bottom: 6px;
            font-size: 13.5px;
            color: var(--muted, #6b7280);
        }

        /* Grid 2 & 3 cột có gap rộng hơn + khoảng dưới tổng thể */
        .card .inline-2,
        .card .inline-3{
            display:grid;
            gap: 16px;              /* <-- nới khoảng cách giữa các input */
            margin-top: 6px;
            margin-bottom: 6px;
        }

        /* Input/select thoáng hơn, cao tối thiểu 44px cho mobile */
        .card .card-bd input,
        .card .card-bd select,
        .card .card-bd textarea{
            width: 100%;
            padding: 12px 14px;     /* <-- nới padding */
            min-height: 44px;       /* <-- cao tối thiểu */
            border: 1px solid var(--line, #e5e7eb);
            border-radius: 12px;
            background: #fff;
            font-size: 14px;
            outline: none;
            transition: border-color .15s ease, box-shadow .15s ease;
        }

        /* Trạng thái focus dễ nhìn, chuyên nghiệp */
        .card .card-bd input:focus,
        .card .card-bd select:focus,
        .card .card-bd textarea:focus{
            border-color: #2563eb;
            box-shadow: 0 0 0 4px rgba(37,99,235,.08);
        }

        /* Radio chips thoáng hơn */
        .card .radio-group{ display:flex; flex-wrap:wrap; gap: 10px; }
        .card .chip{ padding: 10px 14px; border-radius: 999px; }

        /* Responsive: dưới 576px thì xếp 1 cột cho dễ thở */
        @media (max-width: 576px){
            .card .inline-2,
            .card .inline-3{ grid-template-columns: 1fr; gap: 12px; }
        }

        /* Trên tablet/desktop giữ layout nhiều cột */
        @media (min-width: 577px){
            .card .inline-2{ grid-template-columns: 1fr 1fr; }
            .card .inline-3{ grid-template-columns: 1fr 1fr 1fr; }
        }

    </style>
    <div class="mainBody-theme-container mainBody-modalshow mainBody-product  layoutProduct_scroll ">

        <div class="inst-layout" ng-controller="productDetailPage">
            <div class="emi-wrap">
                <div class="emi-header">
                    <a href="#" id="backLink">⟵ Quay lại giỏ hàng</a>
                    <h2>Đặt mua trả góp</h2>
                </div>

                <div class="emi-grid">
                    <!-- LEFT: Cart summary -->
                    <section class="card" id="cartCard">
                        <div class="card-hd">Chọn lại phương thức</div>
                        <div class="card-bd">
                            <div class="cart-list" id="cartList">
                                <!-- Item mẫu (render động hoặc server-side). Giữ data-price để JS tính -->
                                @foreach($cartCollection as $item)
                                    <article class="cart-item" >
                                        <div class="thumb">
                                            <img src="{{ $item->attributes->image ?? '' }}">
                                        </div>
                                        <div class="meta">
                                            <div class="name">{{ $item->name }}</div>
                                            <div class="sku tiny">Phân loại: {{ $item->attributes->variant_name ?? '' }}</div>
                                            <div class="sku tiny">Số lượng: {{ $item->quantity }}</div>
                                            <div class="price">{{ formatCurrency($item->price) }} đ</div>
                                        </div>
                                    </article>
                                @endforeach


                            </div>

                            <!-- Simple controls -->
                            <div class="controls">

                            </div>

                            <div class="stack" id="summary">
                                <div class="row-flex">
                                    <span class="muted">Công ty: <% financeSelected.company.name %></span>
                                </div>
                                <div class="row-flex">
                                    <span class="muted">Trả trước (<span id="downLabel"><% financeSelected.sophantram %></span>%)</span>
                                    <strong id="downAmt" class="note-orange"><% financeSelected.sotientratruoc | vnd %> </strong>
                                </div>
                                <div class="row-flex">
                                    <span class="muted">Góp mỗi tháng (<span id="monthsLabel"><% financeSelected.month %></span> tháng)</span>
                                    <strong id="perMonth" class="note-orange"><% financeSelected.gopmoithang | vnd %> </strong>
                                </div>
                                <div class="row-flex total">
                                    <span>Tổng tiền</span>
                                    <strong id="grandTotal"><% financeSelected.tongtien | vnd %> </strong>
                                </div>
                                <div class="tiny">* Tính nhanh, chưa bao gồm phí/lãi (nếu có).</div>
                            </div>
                        </div>
                    </section>

                    <!-- RIGHT: Form -->
                    <section class="card">
                        <div class="card-hd">Thông tin trả góp</div>
                        <div class="card-bd">
                            <!-- Finance companies -->


                            <!-- Customer type -->
                            <div class="field">
                                <label>Đối tượng</label>
                                <div class="radio-group" id="custType">
                                    <div class="chip" ng-class="{active: form.customer_type==='Mr'}"              ng-click="form.customer_type='Mr'">Anh</div>
                                    <div class="chip" ng-class="{active: form.customer_type==='Ms'}"              ng-click="form.customer_type='Ms'">Chị</div>
                                    <div class="chip" ng-class="{active: form.customer_type==='student'}"         ng-click="form.customer_type='student'">Sinh viên</div>
                                    <div class="chip" ng-class="{active: form.customer_type==='working_adult'}"   ng-click="form.customer_type='working_adult'">Người đi làm</div>
                                    <div class="chip" ng-class="{active: form.customer_type==='business'}"        ng-click="form.customer_type='business'">Doanh nghiệp</div>
                                    <input type="hidden" name="customer_type" ng-model="form.customer_type" />
                                </div>

                                <div class="invalid-feedback d-block" ng-if="errors['customer_type']">
                                    <% errors['customer_type'][0] %>
                                </div>
                            </div>

                            <!-- Inputs -->
                            <div class="inline-2">
                                <div class="field">
                                    <label>Họ và tên *</label>
                                    <input required id="fullname" placeholder="Nguyễn Văn A" ng-model="form.fullname"/>
                                    <div class="invalid-feedback d-block" ng-if="errors['fullname']">
                                        <% errors['fullname'][0] %>
                                    </div>
                                </div>
                                <div class="field">
                                    <label>Email</label>
                                    <input type="email" id="email" placeholder="email@domain.com" ng-model="form.email"/>
                                    <div class="invalid-feedback d-block" ng-if="errors['email']">
                                        <% errors['email'][0] %>
                                    </div>
                                </div>
                            </div>

                            <div class="inline-3">
                                <div class="field">
                                    <label>Số điện thoại *</label>
                                    <input required id="phone" placeholder="09xxxxxxxx" ng-model="form.phone"/>
                                    <div class="invalid-feedback d-block" ng-if="errors['phone']">
                                        <% errors['phone'][0] %>
                                    </div>
                                </div>

                                <div class="field">
                                    <label>Số CMND/CCCD *</label>
                                    <input required id="idno" placeholder="0123456789" ng-model="form.cccd"/>
                                    <div class="invalid-feedback d-block" ng-if="errors['cccd']">
                                        <% errors['cccd'][0] %>
                                    </div>
                                </div>

                                <div class="field">
                                    <label>Ngày sinh *</label>
                                    <input required id="dob" type="date" ng-model="form.dob"/>
                                    <div class="invalid-feedback d-block" ng-if="errors['dob']">
                                        <% errors['dob'][0] %>
                                    </div>
                                </div>

                            </div>


                            <div class="field">
                                <label>Địa chỉ *</label>
                                <input id="address" required placeholder="Số nhà, đường..." ng-model="form.address"/>
                                <div class="invalid-feedback d-block" ng-if="errors['address']">
                                    <% errors['address'][0] %>
                                </div>
                            </div>

                        </div>

                        <div class="actions">
                            <button class="btn-primary" id="submitBtn" ng-click="submit()">ĐẶT MUA TRẢ GÓP</button>
                            <div class="tiny-help">Duyệt hồ sơ qua điện thoại</div>
                        </div>
                    </section>
                </div>
            </div>
        </div>


    </div>

@endsection

@push('scripts')
    <script>
        app.controller('productDetailPage', ['$scope','$window', function($scope, $window){
            var saved = angular.fromJson($window.localStorage.getItem('financeSelected'));
            $scope.form = {}
            $scope.financeSelected = saved || null;
            $scope.items = @json($cartCollection);
            $scope.items = Object.entries($scope.items).map(([key, item]) => ({
                product_id: item.attributes.product_id,
                product_name: item.name,
                variant_id: item.attributes.variant_id,
                variant_name: item.attributes.variant_name,
                price: item.price,
                quantity: item.quantity,
            }));

            console.log($scope.financeSelected);
            $scope.submit = function () {
                $scope.isSubmitting = true;
                $.ajax({
                    type: 'POST',
                    url: "/checkout-finance",
                    headers: {
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    data: {
                        customer_type: $scope.form.customer_type,
                        fullname: $scope.form.fullname,
                        address: $scope.form.address,
                        phone: $scope.form.phone,
                        email: $scope.form.email,
                        cccd: $scope.form.cccd,
                        dob: $scope.form.dob,
                        items: $scope.items,
                        company_finance: $scope.financeSelected,
                    },
                    success: function(response) {
                        if (response.success) {
                            $scope.errors = [];
                            toastr.success(response.message);
                            $scope.sendSuccess = true;
                            $scope.$applyAsync();
                            $window.localStorage.removeItem('financeSelected');

                            // setTimeout(function() {
                            //     window.location.href = '/';
                            // }, 1000);
                        } else {
                            $scope.errors = response.errors;
                            toastr.warning(response.message);
                        }
                    },
                    error: function(e) {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function() {
                        $scope.isSubmitting = false;
                        $scope.$applyAsync();
                    }
                });
            }

        }]) .filter('vnd', function(){
            return function(x){
                var n = Number(x);
                if (!isFinite(n)) return '—';
                n = Math.round(n);
                return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ' VND';
            };
        });

    </script>




@endpush
