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
        .compare-wrap { padding: 24px 0; }
        .cmp-title { text-align:center; font-weight:800; margin-bottom:16px; }

        .compare-table-wrap {
            overflow-x: auto;                     /* mobile: kéo ngang */
            -webkit-overflow-scrolling: touch;
            padding: 0 12px;
        }
        .compare-table {
            width: 100%;
            min-width: 820px;                     /* đủ rộng cho 3–4 cột */
            border-collapse: separate;
            border-spacing: 0;
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(0,0,0,.04);
        }

        /* Cells */
        .compare-table th,
        .compare-table td {
            padding: 16px 14px;
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
            font-size: 14px;
            color: #0f172a;
        }
        .compare-table tbody tr:last-child th,
        .compare-table tbody tr:last-child td { border-bottom: 0; }

        /* Sticky cột thuộc tính */
        .label-col {
            width: 220px;
            font-weight: 800;
            color: #0f172a;
            background: #fff;
        }
        .sticky-col {
            position: sticky; left: 0; z-index: 2;
            box-shadow: 1px 0 0 #e5e7eb inset;
        }
        thead .sticky-col { z-index: 3; }

        /* Head sản phẩm */
        thead th { background:#f8fafc; font-weight:700; }
        .product-col .btn-link {
            float:right; margin-bottom:8px; border:0; background:transparent; cursor:pointer;
        }
        .btn-link.small { font-size:12px; }
        .btn-link.danger { color:#ef4444; }

        .p-card { text-align:center; }
        .p-thumb { width: 150px; height: 110px; margin: 0 auto 8px; }
        .p-thumb img { width:100%; height:100%; object-fit:contain; }
        .p-name { font-weight:700; }

        /* Stars */
        .stars .star {
            font-style: normal; opacity:.3; margin-right:2px; font-size:16px;
        }
        .stars .star.on { opacity:1; }
        .stars small { margin-left:6px; color:#64748b; }

        /* Giá */
        .price { display:flex; flex-direction:column; gap:2px; align-items:flex-start; }
        .price .sale { color:#dc2626; font-weight:800; }
        .price .regular { color:#94a3b8; text-decoration:line-through; }
        .price .percent { color:#ef4444; font-size:12px; }

        /* Chips */
        .chip-list { display:flex; flex-wrap:wrap; gap:8px; justify-content:flex-start; }
        .cell-text { text-align:left; }
        .chip{
            display:inline-flex; align-items:center;
            padding:4px 10px; border-radius:999px;
            border:1px solid #e5e7eb; background:#f6f8fa; font-weight:600;
        }

        /* CTA */
        .row-cta td { background:#f8fafc; }
        .btn { display:inline-block; padding:10px 14px; border-radius:10px; border:0; cursor:pointer; }
        .btn-primary { background:#0b5ed7; color:#fff; font-weight:700; }
        .w-100 { width:100%; }

        /* Responsive tinh chỉnh */
        @media (max-width: 992px){
            .label-col { width: 180px; }
        }
        @media (max-width: 576px){
            .compare-table { min-width: 640px; } /* vẫn kéo ngang mượt */
            .label-col { width: 160px; }
            .p-thumb { width:120px; height:90px; }
            .chip { padding:3px 8px; }
        }



        .group-row th{
            background:#f8fafc; font-weight:800; letter-spacing:.3px;
            border-bottom:1px solid #e5e7eb;
        }
        .group-gap td{ padding:0; height:4px; background:#fff; border:0; }

        .muted{ color:#94a3b8; }
        .chip-list{ display:flex; flex-wrap:wrap; gap:8px; }
        .chip{
            display:inline-flex; align-items:center; padding:4px 10px;
            border:1px solid #e5e7eb; border-radius:999px; background:#f6f8fa; font-weight:600;
        }
        .cell-text{ text-align:left; }


    </style>
    <div class="mainBody-theme-container mainBody-modalshow mainBody-product  layoutProduct_scroll ">

        <main class="wrapperMain_content">

            <section class="compare-wrap" ng-controller="productDetailPage">
                <h1 class="cmp-title">So sánh sản phẩm</h1>

                <div class="compare-table-wrap">
                    <table class="compare-table">
                        <thead>
                        <tr>
                            <th class="sticky-col label-col">SẢN PHẨM</th>

                            <th class="product-col" ng-repeat="p in compareProducts">
                                <button class="btn-link danger small" ng-click="removeItem(p.id)">Xóa</button>
                                <div class="p-card">
                                    <div class="p-thumb">
                                        <img ng-src="<%p.image%>" alt="<%p.name%>">
                                    </div>
                                    <div class="p-name"><%p.name%></div>
                                </div>
                            </th>
                        </tr>
                        </thead>

                        <tbody>
                        <!-- Rating -->
{{--                        <tr>--}}
{{--                            <th class="sticky-col label-col">RATING</th>--}}
{{--                            <td ng-repeat="p in compareProducts">--}}
{{--                                <div class="stars">--}}
{{--                                    <i class="star" ng-repeat="i in [1,2,3,4,5]" ng-class="{'on': i <= (p.rating||0)}">★</i>--}}
{{--                                    <small>(<%p.review_count || 0%>)</small>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}

                        <!-- Giá -->
                        <tr>
                            <th class="sticky-col label-col">GIÁ</th>
                            <td ng-repeat="p in compareProducts">
                                <div class="price">
                                    <span class="sale" ng-if="p.price"><%p.price | currency:'':0%>đ</span>
                                    <span class="regular" ng-if="p.base_price > 0"><%p.base_price | currency:'':0%>đ</span>
                                    <div class="percent" ng-if="p.base_price > 0">(-<%p.percent_discount%>%)</div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <th class="sticky-col label-col">HÃNG SẢN XUẤT</th>
                            <td ng-repeat="p in compareProducts">
                                <div class="cell-text">
                                    <% p.manufacture %>
                                </div>
                            </td>
                        </tr>

                        <!-- Các dòng thuộc tính động -->
{{--                        <tr ng-repeat="row in featureRows">--}}
{{--                            <th class="sticky-col label-col"><%row.label | uppercase%></th>--}}
{{--                            <td ng-repeat="p in compareProducts">--}}
{{--                                <div ng-switch="row.type">--}}
{{--                                    <!-- kiểu chip (màu sắc, option nhiều giá trị) -->--}}
{{--                                    <div class="chip-list" ng-switch-when="chips">--}}
{{--                                        <span class="chip" ng-repeat="v in (p[row.key] || []) track by $index"><%v%></span>--}}
{{--                                        <span class="muted" ng-if="!(p[row.key] && p[row.key].length)">—</span>--}}
{{--                                    </div>--}}
{{--                                    <!-- mặc định: text -->--}}
{{--                                    <div ng-switch-default class="cell-text">--}}
{{--                                        <% p[row.key] || '—' %>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}

                        <!-- GROUP HEADER -->
                        <tr class="group-row" ng-repeat-start="g in specRows">
                            <th class="sticky-col label-col" colspan="<% 1 + compareProducts.length %>">
                                <% g.group_name %>
                            </th>
                        </tr>

                        <!-- CÁC THUỘC TÍNH TRONG GROUP -->
                        <tr class="spec-row" ng-repeat="row in g.rows">
                            <th class="sticky-col label-col"><% row.label %></th>

                            <td ng-repeat="p in compareProducts">
                                <div ng-if="row.type === 'chips'" class="chip-list">
      <span class="chip" ng-repeat="v in getValues(p, g.group_name, row.label) track by $index">
        <% v %>
      </span>
                                    <span class="muted" ng-if="!getValues(p, g.group_name, row.label).length">—</span>
                                </div>

                                <div ng-if="row.type !== 'chips'" class="cell-text">
                                    <% joinValues(p, g.group_name, row.label) || '—' %>
                                </div>
                            </td>
                        </tr>

                        <!-- đóng group -->
                        <tr ng-repeat-end class="group-gap">
                            <td colspan="<% 1 + compareProducts.length %>"></td>
                        </tr>





                        <!-- CTA -->
                        <tr class="row-cta">
                            <th class="sticky-col label-col"></th>
                            <td ng-repeat="p in compareProducts">
                               <a href="/san-pham/<% p.slug %>.html" target="_blank">
                                   <button class="btn btn-primary w-100">Xem chi tiết</button>
                               </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </section>


        </main>

    </div>

@endsection

@push('scripts')

    <script>
        app.controller('productDetailPage', function ($rootScope, $scope, $interval, compareItemSync) {
            $scope.compareProducts = @json($compareLists);


            $scope.getValues = function(p, groupName, attrName){
                var groups = (p.attributes || []);
                for (var i=0;i<groups.length;i++){
                    if ((groups[i].group_name || '') === groupName){
                        var attrs = groups[i].attributes || [];
                        for (var j=0;j<attrs.length;j++){
                            if ((attrs[j].attr_name || attrs[j].name || '') === attrName){
                                return attrs[j].values || [];
                            }
                        }
                    }
                }
                return [];
            };

            $scope.joinValues = function(p, groupName, attrName){
                var vals = $scope.getValues(p, groupName, attrName);
                return vals.length ? vals.join(', ') : '';
            };

            $scope.specRows = (function(){
                var map = {};    // group_name -> { attr_name: {multi:bool} }
                var order = {};  // group_name -> sort_order (số nhỏ trước)

                ($scope.compareProducts || []).forEach(function(p){
                    (p.attributes || []).forEach(function(gr){
                        var gname = gr.group_name || 'Khác';
                        var gsort = (typeof gr.sort_order !== 'undefined')
                            ? parseInt(gr.sort_order,10) : 9999;

                        if (order[gname] === undefined || gsort < order[gname]) order[gname] = gsort;
                        if (!map[gname]) map[gname] = {};

                        (gr.attributes || []).forEach(function(attr){
                            var aname = attr.attr_name || attr.name || '';
                            if (!aname) return;
                            if (!map[gname][aname]) map[gname][aname] = { multi:false };
                            if ((attr.values || []).length > 1) map[gname][aname].multi = true;
                        });
                    });
                });

                var out = Object.keys(map).map(function(gname){
                    var rows = Object.keys(map[gname]).map(function(aname){
                        return { label: aname, type: map[gname][aname].multi ? 'chips':'text' };
                    }).sort(function(a,b){ return a.label.localeCompare(b.label); });

                    return { group_name: gname, sort_order: order[gname] || 9999, rows: rows };
                });

                out.sort(function(a,b){
                    var so = (a.sort_order||9999) - (b.sort_order||9999);
                    return so !== 0 ? so : a.group_name.localeCompare(b.group_name);
                });

                return out;
            })();

            // remove item
            $scope.removeItem = function (productId) {
                console.log(productId)
                jQuery.ajax({
                    type: 'GET',
                    url: "{{route('compare.remove.item')}}",
                    data: {
                        productId: productId
                    },
                    success: function (response) {
                        if (response.success) {

                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function(){
                                compareItemSync.items = response.compareItems;
                                compareItemSync.count = response.count;
                            }, 1000);

                            $scope.compareProducts = response.compareItems;

                            $scope.$applyAsync();
                        }
                    },
                    error: function (e) {
                        jQuery.toast.error('Đã có lỗi xảy ra');
                    },
                    complete: function () {
                        $scope.$applyAsync();
                    }
                });
            }

        })
    </script>
@endpush
