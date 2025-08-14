<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h6>Thông tin chung</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group custom-group mb-4">
                        <label class="form-label required-label">Tên công ty</label>
                        <input class="form-control" ng-model="form.name" type="text">
                        <span class="invalid-feedback d-block" role="alert">
				<strong><% errors.name[0] %></strong>
			</span>
                    </div>

                    <div class="form-group custom-group mb-4">
                        <label class="form-label required-label">Hotline</label>
                        <input class="form-control" ng-model="form.hotline" type="text">
                        <span class="invalid-feedback d-block" role="alert">
				<strong><% errors.hotline[0] %></strong>
			</span>
                    </div>


                    <div class="form-group custom-group mb-4">
                        <label class="form-label">Website</label>
                        <input class="form-control" ng-model="form.website" type="text">
                    </div>


                    <div class="form-group custom-group mb-4">
                        <label class="form-label">Ghi chú</label>
                        <input class="form-control" ng-model="form.note" type="text">
                    </div>

                    <div class="form-group custom-group mb-4">
                        <label class="form-label">Giấy tờ cần có(thực hiện thủ tục cho vay)</label>
                        <input class="form-control" ng-model="form.document" type="text">
                    </div>

                    <div class="col-sm-6">
                        <div class="align-items-center">
                            <label class="form-label required-label me-3 mb-0">Trạng thái</label>
                            <select class="form-control" ng-model="form.status">
                                <option value="">Chọn danh mục</option>
                                <option ng-repeat="s in statuses" ng-value="s.id" ng-selected="s.id == form.status">
                                    <% s.name %>
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header text-center">Ảnh đại diện</div>
            <div class="card-body text-center">
                <img class="img-fluid mb-2"
                     ng-src="<% form.image.path %>"
                     style="max-height: 150px; border:1px solid #ddd; border-radius:4px;">
                <div class="mt-2">
                    <label class="btn btn-outline-primary mb-0">
                        <i class="fa fa-upload"></i> Chọn ảnh
                        <input type="file" accept=".jpg,.png,.jpeg" class="d-none"
                               id="<% form.image.element_id %>">
                    </label>
                </div>
                <div class="text-danger mt-1" ng-if="errors.image">
                    <% errors.image[0] %>
                </div>
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
