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
        /* Layout 3/7 */
        .inst-layout{ display:grid; grid-template-columns: 3fr 7fr; gap:16px; }
        @media (max-width: 992px){ .inst-layout{ grid-template-columns: 1fr; } }

        /* Cart (left) */
        .cart-card{ background:#fff;border:1px solid #e5e7eb;border-radius:12px;padding:12px; }
        .cart-row{ display:flex; align-items:center; gap:12px; padding:10px; border:1px solid #eef2f7; border-radius:10px; margin-bottom:8px; }
        .cart-row .thumb{ width:64px; height:64px; flex:0 0 64px; }
        .cart-row .thumb img{ width:100%; height:100%; object-fit:cover; border-radius:6px; }
        .cart-row .info{ flex:1; }
        .cart-row .name{ font-weight:700; line-height:1.25; }
        .cart-row .meta{ color:#64748b; font-size:13px; margin-top:2px; }
        .cart-row .price{ font-weight:700; }
        .cart-total{ text-align:center; padding:10px 6px; }
        .cart-total .label{ font-weight:800; }
        .cart-total .note{ font-size:12px; color:#94a3b8; margin-top:4px; }
        .fw-800{ font-weight:800; }

        /* Finance (right) – tái dùng các class trước */
        .inst-card{ background:#fff;border:1px solid #e5e7eb;border-radius:12px;padding:16px 16px 8px;box-shadow:0 6px 18px rgba(0,0,0,.04); }
        .inst-head{ display:flex; gap:12px; border-bottom:1px solid #eef2f7; padding:6px 4px 10px; margin-bottom:8px;}
        .inst-head .tab{ display:flex; align-items:center; gap:8px; padding:8px 12px; border-radius:10px; font-weight:800; color:#0f172a; background:#eef6ff; }
        .inst-filter{ padding:8px 0 4px; }
        .months{ display:flex; align-items:center; gap:8px; flex-wrap:wrap; }
        .pill{ border:1px solid #dbe3ef; background:#fff; padding:6px 10px; border-radius:10px; cursor:pointer; }
        .pill.active{ background:#0b5ed7; color:#fff; border-color:#0b5ed7; }

        .inst-table-wrap{ overflow-x:auto; -webkit-overflow-scrolling:touch; }
        .inst-table{ width:100%; min-width:820px; border-collapse:separate; border-spacing:0; }
        .inst-table th, .inst-table td{ padding:12px 14px; border-bottom:1px solid #f1f5f9; vertical-align:middle; font-size:14px; color:#0f172a;}
        .inst-table thead th{ background:#f8fafc; font-weight:800; }
        .company-col .c-head{ display:flex; justify-content:center; align-items:center; height:36px; }
        .company-col img{ max-height:28px; }
        .label-col{ width:240px; font-weight:800; }
        .sticky-col{ position:sticky; left:0; z-index:2; background:#fff; box-shadow:1px 0 0 #eef2f7 inset; }

        .text-danger{ color:#dc2626; } .fw-700{ font-weight:700; } .muted{ color:#64748b; }
        .form-select{ padding:4px 8px; border-radius:8px; border:1px solid #dbe3ef; }
        .dpick{ display:flex; align-items:center; gap:10px; }
        .btn{ display:inline-block; padding:10px 14px; border-radius:10px; border:0; cursor:pointer; font-weight:700; }
        .btn-primary{ background:#0b5ed7; color:#fff; } .btn-muted{ background:#e5e7eb; color:#6b7280; }
        .w-100{ width:100%; }
        .footnote{ margin:10px 2px 2px; color:#94a3b8; font-size:12px; }
        @media (max-width:576px){ .label-col{ width:180px; } .inst-table{ min-width:680px; } }





        /* Hiển/ẩn theo breakpoint */
        .only-desktop{ display:block; }
        .only-mobile{ display:none; }

        @media (max-width:576px){
            .only-desktop{ display:none; }
            .only-mobile{ display:block; }   /* bật khối mobile */
            .inst-mobile{ display:grid; }    /* chỉ mobile mới là grid */
        }

        /* Bảng: cuộn ngang đẹp + snap + gợi ý viền mờ */
        .inst-table-wrap{
            position:relative; overflow-x:auto; -webkit-overflow-scrolling:touch; scroll-snap-type:x proximity;
            padding-bottom:6px;
        }
        .inst-table{ width:max-content; min-width:100%; border-collapse:separate; border-spacing:0; }
        .inst-table thead th, .inst-table td{ scroll-snap-align:start; }
        /* mỗi cột công ty tối thiểu 220px để không dồn chữ */
        .company-col{ min-width:220px; }
        .label-col{ width:220px; }  /* có thể giảm xuống 180px nếu cần */

        /* gradient 2 mép để gợi ý còn nội dung */
        .inst-table-wrap::before,
        .inst-table-wrap::after{
            content:""; position:absolute; top:0; bottom:0; width:18px; pointer-events:none;
        }
        .inst-table-wrap::before{ left:0; background:linear-gradient(90deg, rgba(255,255,255,1), rgba(255,255,255,0)); }
        .inst-table-wrap::after { right:0; background:linear-gradient(270deg, rgba(255,255,255,1), rgba(255,255,255,0)); }

        /* MOBILE CARDS */
        .inst-mobile{  gap:12px; }
        .m-card{
            border:1px solid #e5e7eb; border-radius:12px; padding:12px; background:#fff; box-shadow:0 4px 12px rgba(0,0,0,.04);
        }
        .m-head{ display:flex; align-items:center; gap:10px; margin-bottom:6px; }
        .m-head img{ max-height:22px; }
        .m-head .name{ font-weight:800; }
        .m-row{ display:flex; justify-content:space-between; gap:8px; padding:8px 0; border-bottom:1px solid #f1f5f9; }
        .m-row:last-of-type{ border-bottom:0; }
        .m-row > span{ color:#64748b; }
        .m-row .val{ text-align:right; }
        .danger{ color:#dc2626; }

    </style>
    <div class="mainBody-theme-container mainBody-modalshow mainBody-product  layoutProduct_scroll ">

        <div class="inst-layout" ng-controller="productDetailPage">
            <!-- LEFT: CART (3) -->
            <aside class="cart-card">
                <div class="cart-row" ng-repeat="it in cartItems">
                    <div class="thumb"><img ng-src="<% it.attributes.image %>" alt=""></div>
                    <div class="info">
                        <div class="name"><% it.name %></div>
                        <div class="meta">x<% it.quantity %></div>
                    </div>
                    <div class="price"><% it.price * it.quantity | vnd %></div>
                </div>

                <div class="cart-total">
                    <div class="label">Tổng tiền:</div>
                    <div class="value text-danger fw-800"><% cartTotal() | vnd %></div>
                    <div class="note muted">(Các sản phẩm được tích chọn trả góp)</div>
                </div>
            </aside>

            <!-- RIGHT: FINANCE (7) -->
            <section class="inst-card">
                <div class="inst-head">
                    <div class="tab active"><span class="icon">💰</span><span class="label">CÔNG TY TÀI CHÍNH</span></div>
                </div>

                <!-- Chọn số tháng -->
                <div class="inst-filter">
                    <div class="months">
                        <span>Chọn số tháng trả góp:</span>
                        <button type="button" class="pill"
                                ng-repeat="m in ui.monthOptions"
                                ng-class="{'active': ui.months == m}"
                                ng-click="setMonths(m)"><% m %> tháng</button>
                    </div>
                </div>

                <!-- BẢNG (desktop) -->
                <div class="inst-table-wrap only-desktop">
                    <table class="inst-table">
                        <thead>
                        <tr>
                            <th class="sticky-col label-col">Công ty</th>
                            <th ng-repeat="c in companies" class="company-col">
                                <div class="c-head"><img ng-src="<% c.logo %>" alt="<% c.name %>"></div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th class="sticky-col label-col">Giá sản phẩm</th>
                            <td ng-repeat="c in companies"><% price | vnd %></td>
                        </tr>
                        <tr>
                            <th class="sticky-col label-col">Giá mua trả góp</th>
                            <td ng-repeat="c in companies" class="text-danger fw-700"><% price | vnd %></td>
                        </tr>
                        <tr>
                            <th class="sticky-col label-col">Trả trước</th>
                            <td ng-repeat="c in companies">
                                <div ng-if="$first" class="dpick">
                                    <select class="form-select form-select-sm"
                                            ng-model="ui.downPct"
                                            ng-options="p as (p + '%') for p in ui.downPctOptions">
                                        <option value="">Chọn</option>
                                    </select>
                                    <div class="muted">= <% downAmount() | vnd %></div>
                                </div>
                                <div ng-if="!$first" class="muted"><% downAmount() | vnd %></div>
                            </td>
                        </tr>

                        <!-- Lãi suất thực -->
                        <tr>
                            <th class="sticky-col label-col">Lãi suất thực</th>
                            <td ng-repeat="c in companies">
          <span ng-if="results[c.id].rate">
            <% (results[c.id].rate.interest_monthly * 100) | number:1 %>%
          </span>
                                <span class="muted" ng-if="!results[c.id].rate">Không xác định</span>
                            </td>
                        </tr>

                        <!-- Giấy tờ -->
                        <tr>
                            <th class="sticky-col label-col">Giấy tờ cần có</th>
                            <td ng-repeat="c in companies">
                                <span ng-if="c.docs && c.docs.length"><% c.docs.join(' + ') %></span>
                                <span class="muted" ng-if="!c.docs || !c.docs.length">—</span>
                            </td>
                        </tr>

                        <!-- Góp mỗi tháng -->
                        <tr>
                            <th class="sticky-col label-col">Góp mỗi tháng</th>
                            <td ng-repeat="c in companies">
                                <span ng-if="results[c.id].rate"><% results[c.id].monthly | vnd %></span>
                                <span class="muted" ng-if="!results[c.id].rate">Không hỗ trợ thời hạn này</span>
                            </td>
                        </tr>

                        <!-- Tổng phải trả -->
                        <tr>
                            <th class="sticky-col label-col">Tổng tiền phải trả</th>
                            <td ng-repeat="c in companies">
                                <span ng-if="results[c.id].rate"><% results[c.id].totalWithDown | vnd %></span>
                                <span class="muted" ng-if="!results[c.id].rate">Không xác định VND</span>
                            </td>
                        </tr>

                        <!-- Chênh lệch -->
                        <tr>
                            <th class="sticky-col label-col">Chênh lệch với mua trả thẳng</th>
                            <td ng-repeat="c in companies">
                                <span ng-if="results[c.id].rate"><% results[c.id].delta | vnd %></span>
                                <span class="muted" ng-if="!results[c.id].rate">—</span>
                            </td>
                        </tr>

                        <tr>
                            <th class="sticky-col label-col">Ghi chú</th>
                            <td ng-repeat="c in companies" class="muted">Chi phí trả góp có thể chưa gồm bảo hiểm khoản vay.</td>
                        </tr>

                        <tr>
                            <th class="sticky-col label-col"></th>
                            <td ng-repeat="c in companies">
                                <button class="btn btn-primary w-100" ng-if="results[c.id].rate" ng-click="order(c)">Đặt mua</button>
                                <button class="btn btn-muted w-100" ng-if="!results[c.id].rate" disabled>Tạm dừng hỗ trợ</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <!-- MOBILE cards -->
                <div class="inst-mobile only-mobile">
                    <div class="m-card" ng-repeat="c in companies">
                        <div class="m-head">
                            <img ng-src="<% c.logo %>" alt="<% c.name %>">
                            <div class="name"><% c.name %></div>
                        </div>

                        <div class="m-row"><span>Giá sản phẩm</span><b><% price | vnd %></b></div>
                        <div class="m-row"><span>Giá mua trả góp</span><b class="danger"><% price | vnd %></b></div>

                        <div class="m-row">
                            <span>Trả trước</span>
                            <div class="val">
                                <span class="muted" ng-if="!results[c.id].rate">Không hỗ trợ mức trả trước này</span>
                                <span ng-if="results[c.id].rate"><% downAmount() | vnd %> (<% ui.downPct %>%)</span>
                            </div>
                        </div>

                        <div class="m-row"><span>Lãi suất thực</span>
                            <b><% results[c.id].rate ? ((results[c.id].rate.interest_monthly*100) | number:1)+'%' : 'Không xác định' %></b>
                        </div>

                        <div class="m-row"><span>Giấy tờ cần có</span>
                            <div class="val"><% (c.docs && c.docs.length) ? c.docs.join(' + ') : '—' %></div>
                        </div>

                        <div class="m-row"><span>Góp mỗi tháng</span>
                            <b><% results[c.id].rate ? (results[c.id].monthly | vnd) : 'Không hỗ trợ thời hạn này' %></b>
                        </div>

                        <div class="m-row"><span>Tổng phải trả</span>
                            <b><% results[c.id].rate ? (results[c.id].totalWithDown | vnd) : 'Không xác định VND' %></b>
                        </div>

                        <div class="m-row"><span>Chênh lệch</span>
                            <b><% results[c.id].rate ? (results[c.id].delta | vnd) : '—' %></b>
                        </div>

                        <button class="btn btn-primary w-100" ng-if="results[c.id].rate" ng-click="order(c)">Đặt mua</button>
                        <button class="btn btn-muted  w-100" ng-if="!results[c.id].rate" disabled>Tạm dừng hỗ trợ</button>
                    </div>
                </div>




                <p class="footnote">Lưu ý: Số tiền thực tế có thể chênh lệch do làm tròn.</p>
            </section>
        </div>


    </div>

@endsection

@push('scripts')
{{--    <script>--}}
{{--        app.controller('productDetailPage', ['$scope', function($scope){--}}

{{--            $scope.cartItems = @json(@$cartItems);--}}

{{--            $scope.cartTotal = function(){ return ($scope.cartItems||[]).reduce((s,it)=>s+(it.price||0)*(it.quantity||0),0); };--}}
{{--            Object.defineProperty($scope, 'price', { get(){ return $scope.cartTotal(); } });--}}
{{--            $scope.companies = @json(@$companies)--}}

{{--            // UI--}}
{{--            $scope.ui = {};--}}
{{--            $scope.ui.monthOptions = uniqueMonths($scope.companies);--}}
{{--            $scope.ui.months = $scope.ui.monthOptions[0] || 6;--}}
{{--            $scope.ui.downPctOptions = buildDownOptions($scope.companies, $scope.ui.months);--}}
{{--            $scope.ui.downPct = $scope.ui.downPctOptions[0] || null;--}}

{{--            function uniqueMonths(companies){--}}
{{--                var set={}; companies.forEach(c => (c.rate_matrix||[]).forEach(r=> set[r.months]=1));--}}
{{--                return Object.keys(set).map(Number).sort((a,b)=>a-b);--}}
{{--            }--}}
{{--            function buildDownOptions(companies, months, step){--}}
{{--                step = step || 10; var min=100, max=0, found=false;--}}
{{--                companies.forEach(c => (c.rate_matrix||[]).forEach(r=>{--}}
{{--                    if(r.months===months){ found=true; min=Math.min(min,r.down_pct_min); max=Math.max(max,r.down_pct_max); }--}}
{{--                }));--}}
{{--                if(!found) return [];--}}
{{--                var arr=[], p=Math.ceil(min/step)*step; for(; p<=Math.floor(max/step)*step+1e-9; p+=step) arr.push(p);--}}
{{--                return arr;--}}
{{--            }--}}
{{--            $scope.setMonths = function(m){--}}
{{--                $scope.ui.months = m;--}}
{{--                console.log($scope.ui.months)--}}
{{--                console.log(m)--}}
{{--                $scope.ui.downPctOptions = buildDownOptions($scope.companies, m);--}}
{{--                if ($scope.ui.downPctOptions.indexOf($scope.ui.downPct) === -1) $scope.ui.downPct = $scope.ui.downPctOptions[0] || null;--}}
{{--            };--}}
{{--            $scope.recalc = function(){};--}}

{{--            $scope.downAmount = function(){ return ($scope.price||0) * (($scope.ui.downPct||0)/100); };--}}

{{--            $scope.getRate = function(c){--}}
{{--                var m=$scope.ui.months, d=$scope.ui.downPct; if(d==null) return null;--}}
{{--                var rows=(c.rate_matrix||[]).filter(r=> r.months===m && d>=r.down_pct_min && d<=r.down_pct_max);--}}
{{--                if(!rows.length) return null;--}}
{{--                rows.sort((a,b)=>(a.down_pct_max-a.down_pct_min)-(b.down_pct_max-b.down_pct_min)); // khoảng hẹp nhất--}}
{{--                return rows[0];--}}
{{--            };--}}

{{--            $scope.calc = function(c){--}}
{{--                var rate=$scope.getRate(c); if(!rate) return null;--}}
{{--                var P=$scope.price, n=$scope.ui.months, d=$scope.ui.downPct/100;--}}
{{--                var down=P*d, L=Math.max(0, P-down), r=rate.interest_monthly||0;--}}
{{--                var interest=L*r*n, totalInstall=L+interest, monthly=totalInstall/n, totalWithDown=down+totalInstall, delta=totalWithDown-P;--}}
{{--                return {monthly, totalWithDown, delta};--}}
{{--            };--}}

{{--            $scope.order = function(c){ alert('Đăng ký trả góp qua '+c.name+' - '+$scope.ui.months+' tháng'); };--}}
{{--        }])--}}
{{--            .filter('vnd', function(){ return function(x){ if(x==null||isNaN(x)) return '—'; var n=Math.round(x); return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g,'.')+' VND'; }; });--}}
{{--    </script>--}}

    <script>
        app.controller('productDetailPage', ['$scope', '$window', function($scope, $window){

            /* -------- CART -------- */
            $scope.cartItems = @json($cartItems ?? []);
            $scope.cartTotal = function(){
                var s = 0, arr = $scope.cartItems || [];
                for (var i=0;i<arr.length;i++){
                    var it = arr[i] || {};
                    var price = parseFloat(it.price) || 0;
                    var qty   = parseFloat(it.quantity || it.qty) || 0;
                    s += price * qty;
                }
                return s;
            };
            Object.defineProperty($scope, 'price', {
                get: function(){ return $scope.cartTotal(); }
            });

            /* -------- COMPANIES: sanitize dữ liệu từ DB -------- */
            var rawCompanies = @json($companies ?? []);
            $scope.companies = sanitizeCompanies(rawCompanies);

            function sanitizeCompanies(companies){
                var out = [];
                for (var i=0;i<companies.length;i++){
                    var c = companies[i] || {};
                    // rate_matrix từ packages / rate_matrix, ép kiểu số:
                    var packs = c.rate_matrix || c.packages || [];
                    var rate_matrix = [];
                    for (var j=0;j<packs.length;j++){
                        var p = packs[j] || {};
                        var months = parseInt(p.months || p.term_months, 10) || 0;
                        var dmin   = parseFloat(p.down_pct_min) || 0;
                        var dmax   = parseFloat(p.down_pct_max) || 0;
                        var im     = p.interest_monthly;                    // có thể là "2.40" hoặc 0.024
                        im = (im === '' || im === null || im === undefined) ? 0 : parseFloat(im);
                        if (im > 1) im = im / 100;                          // DB lưu % -> đổi sang thập phân
                        rate_matrix.push({ months:months, down_pct_min:dmin, down_pct_max:dmax, interest_monthly:im });
                    }
                    // docs
                    var docs = c.docs;
                    if (!docs){
                        var docstr = c.document || '';
                        if (docstr){
                            var parts = docstr.split(/[\+,\/|]/);
                            docs = [];
                            for (var k=0;k<parts.length;k++){ var t = (parts[k]||'').trim(); if (t) docs.push(t); }
                        } else { docs = []; }
                    }
                    out.push({
                        id: parseInt(c.id,10) || i+1,
                        name: c.name || '',
                        logo: c.logo || (c.image && c.image.path ? c.image.path : ''),
                        docs: docs,
                        rate_matrix: rate_matrix
                    });
                }
                return out;
            }

            /* -------- UI state -------- */
            $scope.ui = {};
            $scope.ui.monthOptions   = uniqueMonths($scope.companies);
            $scope.ui.months         = $scope.ui.monthOptions.length ? $scope.ui.monthOptions[0] : null;
            $scope.ui.downPctOptions = buildDownOptions($scope.companies, $scope.ui.months);
            $scope.ui.downPct        = $scope.ui.downPctOptions.length ? $scope.ui.downPctOptions[0] : null;

            function uniqueMonths(companies){
                var set = {};
                for (var i=0;i<companies.length;i++){
                    var rm = companies[i].rate_matrix || [];
                    for (var j=0;j<rm.length;j++) set[rm[j].months] = 1;
                }
                var res = [];
                for (var k in set) if (set.hasOwnProperty(k)) res.push(parseInt(k,10));
                res.sort(function(a,b){ return a-b; });
                return res;
            }
            function buildDownOptions(companies, months, step){
                step = step || 10;
                var min=100, max=0, found=false;
                for (var i=0;i<companies.length;i++){
                    var rm = companies[i].rate_matrix || [];
                    for (var j=0;j<rm.length;j++){
                        var r = rm[j];
                        if (r.months === months){ found=true; if (r.down_pct_min<min) min=r.down_pct_min; if (r.down_pct_max>max) max=r.down_pct_max; }
                    }
                }
                if (!found) return [];
                var arr=[], p=Math.ceil(min/step)*step;
                for (; p<=Math.floor(max/step)*step + 1e-9; p+=step) arr.push(p);
                return arr;
            }

            /* -------- TÍNH SẴN KẾT QUẢ để bind (tránh digest loop) -------- */
            $scope.results = {}; // { [companyId]: { rate, monthly, totalWithDown, delta } }

            function findRate(c, months, downPct){
                if (downPct == null) return null;
                var rows = [];
                var rm = c.rate_matrix || [];
                for (var i=0;i<rm.length;i++){
                    var r = rm[i];
                    if (r.months === months && downPct >= r.down_pct_min && downPct <= r.down_pct_max) rows.push(r);
                }
                if (!rows.length) return null;
                rows.sort(function(a,b){ return (a.down_pct_max-a.down_pct_min)-(b.down_pct_max-b.down_pct_min); });
                return rows[0]; // dùng luôn object gốc (không clone) để Angular không coi là thay đổi
            }

            function recomputeAll(){
                var P = $scope.price || 0;
                var n = $scope.ui.months;
                var d = $scope.ui.downPct;

                var out = {};
                for (var i=0;i<$scope.companies.length;i++){
                    var c = $scope.companies[i];
                    var rate = findRate(c, n, d);
                    if (!rate){ out[c.id] = { rate:null }; continue; }

                    var down = P * (d/100);
                    var L    = Math.max(0, P - down);
                    var r    = rate.interest_monthly || 0;      // thập phân/tháng
                    // Flat rate
                    var interestTotal   = L * r * n;
                    var totalInstallment = L + interestTotal;
                    out[c.id] = {
                        rate: rate,
                        monthly: totalInstallment / n,
                        totalWithDown: down + totalInstallment,
                        delta: (down + totalInstallment) - P
                    };
                }
                $scope.results = out;
            }

            $scope.setMonths = function(m){
                $scope.ui.months = m;
                $scope.ui.downPctOptions = buildDownOptions($scope.companies, m);
                if ($scope.ui.downPctOptions.indexOf($scope.ui.downPct) === -1){
                    $scope.ui.downPct = $scope.ui.downPctOptions.length ? $scope.ui.downPctOptions[0] : null;
                }
                recomputeAll();
            };

            $scope.downAmount = function(){
                return ($scope.price || 0) * (($scope.ui.downPct || 0)/100);
            };

            $scope.$watch('ui.downPct', function(){ recomputeAll(); });
            $scope.$watch('price', function(){ recomputeAll(); });

            // Init
            recomputeAll();

            $scope.order = function(c){
                var data = {
                    company: c,
                    month: $scope.ui.months,
                    sophantram: $scope.ui.downPct,
                    sotientratruoc: $scope.downAmount(),
                    gopmoithang: $scope.results[c.id].monthly,
                    tongtien: $scope.results[c.id].totalWithDown,
                };

                $window.localStorage.setItem('financeSelected', angular.toJson(data));
            };


        }])
            .filter('vnd', function(){
                return function(x){
                    var n = Number(x);
                    if (!isFinite(n)) return '—';
                    n = Math.round(n);
                    return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ' VND';
                };
            });
    </script>




@endpush
