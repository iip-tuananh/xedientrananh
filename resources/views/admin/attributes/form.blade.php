<div class="row">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group custom-group">
                    <label class="form-label required-label">Nhóm thuộc tính</label>
                    <ui-select remove-selected="false" ng-model="form.group_id" theme="select2">
                        <ui-select-match placeholder="Chọn nhóm">
                            <% $select.selected.name %>
                        </ui-select-match>
                        <ui-select-choices repeat="item.id as item in (form.attribute_groups | filter: $select.search)">
                            <div>
                                <span ng-bind="item.name"></span>
                            </div>
                        </ui-select-choices>
                    </ui-select>
                    <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.group_id[0] %></strong>
                    </span>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group custom-group">
                    <label class="form-label required-label">Tên thuộc tính</label>
                    <input class="form-control " type="text" ng-model="form.name">
                    <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.name[0] %></strong>
                    </span>
                </div>
            </div>

        </div>
    </div>
</div>
