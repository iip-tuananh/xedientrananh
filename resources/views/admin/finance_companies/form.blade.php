<div class="row">
    <style>
        /* Grid gọn gàng */
        .form-grid{
            display:grid;
            grid-template-columns:repeat(2,minmax(0,1fr));
            gap:16px 24px;
        }
        .fg .form-label{ font-weight:600; color:#374151; margin-bottom:6px; }
        .req{ color:#ef4444; }

        /* Trường dài chiếm 2 cột */
        .fg.span-2{ grid-column:1 / -1; }

        /* Input đồng đều */
        .form-control{ height:42px; }
        textarea.form-control{ height:auto; }

        /* Lỗi form */
        .is-invalid{ border-color:#dc3545; }
        .invalid-feedback{ display:block; font-size:12px; }

        /* Ảnh đại diện */
        .thumb{
            width:100%;
            max-width:380px;
            margin:0 auto;
            aspect-ratio: 16 / 9;
            background:#f8fafc;
            display:flex; align-items:center; justify-content:center;
            border-radius:8px;
        }
        .preview-border{ border:1px dashed #cbd5e1; }
        .thumb img{ width:100%; height:100%; object-fit:contain; border-radius:8px; }

        /* Mobile */
        @media (max-width: 767.98px){
            .form-grid{ grid-template-columns:1fr; gap:12px 16px; }
            .form-control{ height:40px; }
        }

    </style>
    <div class="col-md-12">
        <!-- CARD: Thông tin chung -->
        <div class="card">
            <div class="card-header"><h6 class="mb-0">Thông tin chung</h6></div>
            <div class="card-body">
                <div class="form-grid">
                    <div class="fg">
                        <label class="form-label">Tên công ty <span class="req">*</span></label>
                        <input class="form-control" type="text"
                               ng-model="form.name" ng-class="{'is-invalid': errors.name}">
                        <small class="invalid-feedback" ng-if="errors.name"><% errors.name[0] %></small>
                    </div>

                    <div class="fg">
                        <label class="form-label">Hotline <span class="req">*</span></label>
                        <input class="form-control" type="tel"
                               ng-model="form.hotline" ng-class="{'is-invalid': errors.hotline}">
                        <small class="invalid-feedback" ng-if="errors.hotline"><% errors.hotline[0] %></small>
                    </div>

                    <div class="fg">
                        <label class="form-label">Website</label>
                        <input class="form-control" type="url" placeholder="https://..."
                               ng-model="form.website">
                    </div>

                    <div class="fg">
                        <label class="form-label">Trạng thái <span class="req">*</span></label>
                        <select class="form-control" ng-model="form.status"
                                ng-options="s.id as s.name for s in statuses">
                            <option value="">-- Chọn trạng thái --</option>
                        </select>
                        <small class="invalid-feedback" ng-if="errors.status"><% errors.status[0] %></small>

                    </div>

                    <div class="fg span-2">
                        <label class="form-label">Ghi chú</label>
                        <textarea class="form-control" rows="2" ng-model="form.note"></textarea>
                    </div>

                    <div class="fg span-2">
                        <label class="form-label">Giấy tờ cần có (thủ tục vay)</label>
                        <textarea class="form-control" rows="3" placeholder="Ví dụ: CCCD, Hộ khẩu, Sao kê lương..."
                                  ng-model="form.document"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- CARD: Ảnh đại diện -->
        <div class="card mt-3">
            <div class="card-header text-center"><h6 class="mb-0">Ảnh đại diện</h6></div>
            <div class="card-body text-center">
                <div class="thumb preview-border">
                    <img ng-src="<% form.image.path %>" alt="preview" />
                </div>
                <label class="btn btn-outline-primary mt-2 mb-0">
                    <i class="fa fa-upload me-1"></i> Chọn ảnh
                    <input type="file" accept=".jpg,.png,.jpeg" class="d-none" id="<% form.image.element_id %>">
                </label>
                <div class="text-danger mt-1" ng-if="errors.image"><% errors.image[0] %></div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Danh sách gói hỗ trợ</h5>
                <button type="button" class="btn btn-primary btn-sm" ng-click="form.addPackage()">
                    + Thêm gói
                </button>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle mb-0">
                        <thead class="table-light">
                        <tr>
                            <th class="text-center" style="width:60px">#</th>
                            <th style="min-width:160px">Tên gói (kỳ hạn)</th>
                            <th style="min-width:240px">Khoảng % trả trước</th>
                            <th style="min-width:200px">Lãi suất/tháng (%)</th>
                            <th class="text-center" style="width:80px">Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr ng-repeat="p in form.packages track by $index">
                            <td class="text-center"><% $index + 1 %></td>

                            <!-- Kỳ hạn -->
                            <td>
                                <select class="form-select"
                                        ng-model="p.term_months"
                                        ng-options="t as (t + ' tháng') for t in termOptions"
                                        required>
                                    <option value="">-- Chọn kỳ hạn --</option>
                                </select>
                                <span class="text-danger" ng-if="errors['packages.' + $index + '.term_months']">
                                                <% errors['packages.' + $index + '.term_months'][0]  %>
                                            </span>
                            </td>

                            <!-- Khoảng % trả trước -->
                            <td>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Min"
                                           ng-model="p.down_pct_min" min="0" max="100" step="1" required>
                                    <span class="input-group-text">%</span>
                                    <span class="input-group-text">–</span>
                                    <input type="number" class="form-control" placeholder="Max"
                                           ng-model="p.down_pct_max" min="0" max="100" step="1"

                                           required>
                                    <span class="input-group-text">%</span>
                                </div>
                                <span class="text-danger" ng-if="errors['packages.' + $index + '.down_pct_min']">
                                                <% errors['packages.' + $index + '.down_pct_min'][0]  %>
                                            </span>

                                <small class="text-danger" ng-if="p.down_pct_min > p.down_pct_max">
                                    Min không được lớn hơn Max
                                </small>
                            </td>

                            <!-- Lãi suất/tháng (%) -->
                            <td>
                                <div class="input-group">
                                    <input type="number" class="form-control" placeholder="VD: 2.20"
                                           ng-model="p.interest_monthly" min="0" max="100" step="0.01" required>
                                    <span class="input-group-text">%</span>

                                </div>
                                <span class="text-danger" ng-if="errors['packages.' + $index + '.interest_monthly']">
                                                <% errors['packages.' + $index + '.interest_monthly'][0]  %>
                                            </span>
                                <small class="text-muted">
                                    Thập phân: <b><% (p.interest_monthly || 0)/100 | number:4 %></b>
                                </small>
                            </td>

                            <!-- Xóa -->
                            <td class="text-center">
                                <button type="button" class="btn btn-outline-danger btn-sm"
                                        ng-click="form.removePackage($index)">
                                    Xóa
                                </button>
                            </td>
                        </tr>

                        <tr ng-if="!form.packages || !form.packages.length">
                            <td colspan="5" class="text-center text-muted py-4">
                                Chưa có gói nào. Nhấn “Thêm gói”.
                            </td>
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
    <button type="submit" class="btn btn-success btn-cons" ng-click="submit()" ng-disabled="loading.submit">
        <i ng-if="!loading.submit" class="fa fa-save"></i>
        <i ng-if="loading.submit" class="fa fa-spin fa-spinner"></i>
        Lưu
    </button>
    <a href="{{ route('orders.index') }}" class="btn btn-danger btn-cons">
        <i class="fa fa-remove"></i> Quay lại
    </a>
</div>
