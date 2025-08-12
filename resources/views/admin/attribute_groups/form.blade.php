<div class="row">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group custom-group">
                    <label class="form-label required-label">Tên nhóm</label>
                    <input class="form-control " type="text" ng-model="form.name">
                    <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.name[0] %></strong>
                    </span>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group custom-group">
                    <label class="form-label required-label">Thứ tự hiển thị</label>
                    <input class="form-control " type="number" ng-model="form.sort_order">
                    <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.sort_order[0] %></strong>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
