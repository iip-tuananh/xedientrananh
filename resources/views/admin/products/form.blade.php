<style>
    .gallery-item {
        padding: 5px;
        padding-bottom: 0;
        border-radius: 2px;
        border: 1px solid #bbb;
        min-height: 100px;
        height: 100%;
        position: relative;
    }

    .gallery-item .remove {
        position: absolute;
        top: 5px;
        right: 5px;
    }

    .gallery-item .drag-handle {
        position: absolute;
        top: 5px;
        left: 5px;
        cursor: move;
    }

    .gallery-item:hover {
        background-color: #eee;
    }

    .gallery-item .image-chooser img {
        max-height: 150px;
    }

    .gallery-item .image-chooser:hover {
        border: 1px dashed green;
    }
</style>
<div class="row">
    <div class="col-sm-8">
        {{-- <div class="form-group mb-4">
            <div class="row">
                <div class="col-md-6">
                    <input class="cursor-pointer" type="radio" ng-model="form.type" value="0" id="type_0"> <label for="type_0" class="cursor-pointer">Sản phẩm thông thường</label>
                </div>
                <div class="col-md-6">
                    <input class="cursor-pointer" type="radio" ng-model="form.type" value="1" id="type_1"> <label for="type_1" class="cursor-pointer">Sản phẩm affiliate</label>
                </div>
            </div>
            <span class="invalid-feedback d-block" role="alert">
                <strong>
                    <% errors.type[0] %>
                </strong>
            </span>
        </div> --}}
        <div class="form-group custom-group mb-4">
            <label class="form-label required-label">Danh mục sản phẩm</label>
            <ui-select class="" remove-selected="true" ng-model="form.cate_id" theme="select2">
                <ui-select-match placeholder="Chọn danh mục">
                    <% $select.selected.name %>
                </ui-select-match>
                <ui-select-choices repeat="t.id as t in (form.all_categories | filter: $select.search)" ui-disable-choice="! t.level">
                    <span ng-bind="t.name"></span>
                </ui-select-choices>
            </ui-select>
            <span class="invalid-feedback d-block" role="alert">
                <strong>
                    <% errors.cate_id[0] %>
                </strong>
            </span>
        </div>

        <div class="form-group custom-group mb-4">
            <label class="form-label required-label">Danh mục hãng sản xuất</label>
            <ui-select class="" remove-selected="true" ng-model="form.manufacturer_id" theme="select2">
                <ui-select-match placeholder="Chọn hãng sản xuất">
                    <% $select.selected.name %>
                </ui-select-match>
                <ui-select-choices repeat="t.id as t in (form.all_manufacture | filter: $select.search)">
                    <span ng-bind="t.name"></span>
                </ui-select-choices>
            </ui-select>
            <span class="invalid-feedback d-block" role="alert">
                <strong>
                    <% errors.manufacturer_id[0] %>
                </strong>
            </span>
        </div>

        <div class="form-group custom-group mb-4">
            <label class="form-label required-label">Mã hàng hóa</label>
            <input class="form-control " type="text" ng-model="form.code">
            <span class="invalid-feedback d-block" role="alert">
                <strong>
                    <% errors.code[0] %>
                </strong>
            </span>
        </div>

        <div class="form-group custom-group mb-4">
            <label class="form-label required-label">Tên hàng hóa</label>
            <input class="form-control " type="text" ng-model="form.name">
            <span class="invalid-feedback d-block" role="alert">
                <strong>
                    <% errors.name[0] %>
                </strong>
            </span>
        </div>

        <div class="form-group custom-group mb-4">
            <label class="form-label">Mô tả ngắn</label>
            <textarea class="form-control ck-editor" ck-editor rows="5" ng-model="form.intro"></textarea>
            <span class="invalid-feedback d-block" role="alert">
                <strong>
                    <% errors.intro[0] %>
                </strong>
            </span>
        </div>

        <div class="form-group custom-group mb-4">
            <label class="form-label">Chi tiết sản phẩm</label>
            <textarea class="form-control ck-editor" ck-editor rows="5" ng-model="form.body"></textarea>
            <span class="invalid-feedback d-block" role="alert">
                <strong>
                    <% errors.body[0] %>
                </strong>
            </span>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group custom-group mb-4">
            <label class="form-label">Giá trước giảm</label>
            <input class="form-control " type="text" ng-model="form.base_price">
            <span class="invalid-feedback d-block" role="alert">
                <strong>
                    <% errors.base_price[0] %>
                </strong>
            </span>
        </div>
        <div class="form-group custom-group mb-4">
            <label class="form-label">Giá bán</label>
            <input class="form-control " type="text" ng-model="form.price" ng-change="form.updateRevenuePrice()">
            <span class="invalid-feedback d-block" role="alert">
                <strong>
                    <% errors.price[0] %>
                </strong>
            </span>
        </div>

        {{-- <div class="form-group custom-group mb-4">
            <label class="form-label">Hoa hồng (người mua hàng có thể nhận) / sản phẩm</label>
            <input class="form-control " type="text" ng-model="form.revenue_price" disabled>
            <span class="invalid-feedback d-block" role="alert">
                <strong>
                    <% errors.revenue_price[0] %>
                </strong>
            </span>
        </div> --}}



        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Thuộc tính</h5>
                    </div>
                    <div class="card-body">
                        <!-- Chọn và thêm thuộc tính -->
                        <div class="d-flex mb-3">
                            <select class="form-control me-2"
                                    ng-model="selectedAttribute"
                                    ng-options="attr as attr.name for attr in form.all_attributes">
                                <option value="">-- Chọn thuộc tính --</option>
                            </select>
                            <button class="btn btn-primary"
                                    ng-click="form.addAttributes(selectedAttribute)"
                                    ng-disabled="!selectedAttribute">
                                Thêm
                            </button>
                        </div>
                        <span class="text-danger small" ng-if="errors.attrs.length">
         <% errors.attrs[0] %>
        </span>

                        <!-- Danh sách thuộc tính -->
                        <ul class="list-group">
                            <li class="list-group-item p-3" ng-repeat="attrObj in form.attrs track by $index">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <strong><% attrObj.name %></strong>
                                    <button class="btn btn-sm btn-danger"
                                            ng-click="form.removeAttributes($index)">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>

                                <!-- Bảng giá trị -->
                                <table class="table table-sm mb-0">
                                    <thead>
                                    <tr>
                                        <th>Giá trị</th>
                                        <th class="text-end">Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr ng-repeat="(vIndex, item) in attrObj.values">
                                        <td>
                                            <input type="text"
                                                   class="form-control form-control-sm"
                                                   ng-model="item.value"
                                                   placeholder="Nhập giá trị...">
                                            <span class="text-danger">
                                                <% errors['attrs.' + $parent.$index + '.values.' + $index + '.value'][0]%>
                                            </span>
                                        </td>
                                        <td style="text-align: center">
                                            <button class="btn btn-outline-danger btn-sm"
                                                    ng-click="attrObj.removeValues(vIndex)">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-center">
                                            <button class="btn btn-sm btn-secondary"
                                                    ng-click="attrObj.addValues()">
                                                <i class="fa fa-plus"></i> Thêm giá trị
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group custom-group mb-4">
            <label class="form-label">Chọn tags</label>
            <ui-select remove-selected="false" multiple ng-model="form.tag_ids">
                <ui-select-match placeholder="Chọn tag">
                    <% $item.name %>
                </ui-select-match>
                <ui-select-choices
                    repeat="item.id as item in (tags | filter: $select.search)">
                    <span ng-bind="item.name"></span>
                </ui-select-choices>
            </ui-select>
        </div>

        <div class="form-group custom-group mb-4">
            <label class="form-label required-label">Trạng thái</label>
            <select id="my-select" class="form-control custom-select" ng-model="form.status">
                <option value="">Chọn trạng thái</option>
                <option value="0">Lưu nháp</option>
                <option value="1">Xuất bản</option>
            </select>
            <span class="invalid-feedback d-block" role="alert">
                <strong>
                    <% errors.status[0] %>
                </strong>
            </span>
        </div>

{{--        <div class="form-group custom-group mb-4">--}}
{{--            <label class="form-label">Tình trạng</label>--}}
{{--            <select id="my-select" class="form-control custom-select" ng-model="form.state">--}}
{{--                <option value="">Chọn tình trạng hàng hóa</option>--}}
{{--                <option value="1">Còn hàng</option>--}}
{{--                <option value="2">Hết hàng</option>--}}
{{--            </select>--}}
{{--        </div>--}}


{{--        <div class="form-group text-center">--}}
{{--            <div class="main-img-preview">--}}
{{--                <p class="help-block-img">* Ảnh định dạng: jpg, png không quá 2MB.</p>--}}
{{--                <img class="thumbnail img-preview" ng-src="<% form.image.path %>">--}}
{{--            </div>--}}
{{--            <div class="input-group" style="width: 100%; text-align: center">--}}
{{--                <div class="input-group-btn" style="margin: 0 auto">--}}
{{--                    <div class="fileUpload fake-shadow cursor-pointer">--}}
{{--                        <label class="mb-0" for="<% form.image.element_id %>">--}}
{{--                            <i class="glyphicon glyphicon-upload"></i> Chọn ảnh--}}
{{--                        </label>--}}
{{--                        <input class="d-none" id="<% form.image.element_id %>" type="file" class="attachment_upload" accept=".jpg,.jpeg,.png">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <span class="invalid-feedback d-block" role="alert">--}}
{{--                <strong>--}}
{{--                    <% errors.image[0] %>--}}
{{--                </strong>--}}
{{--            </span>--}}
{{--        </div>--}}
{{--        <hr>--}}
{{--        <div class="form-group text-center">--}}
{{--            <label for="">Gallery ảnh</label>--}}
{{--            <div class="row gallery-area border">--}}
{{--                <div class="col-md-4 p-2" ng-repeat="g in form.galleries">--}}
{{--                    <div class="gallery-item">--}}
{{--                        <button class="btn btn-sm btn-danger remove" ng-click="form.removeGallery($index)">--}}
{{--                            <i class="fa fa-times mr-0"></i>--}}
{{--                        </button>--}}
{{--                        <div class="form-group">--}}
{{--                            <div class="img-chooser" title="Chọn ảnh">--}}
{{--                                <label for="<% g.image.element_id %>">--}}
{{--                                    <img ng-src="<% g.image.path %>">--}}
{{--                                    <input class="d-none" type="file" accept=".jpg,.png,.jpeg" id="<% g.image.element_id %>">--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                            <span class="invalid-feedback d-block" role="alert" ng-if="!errors['galleries.' + $index + '.image_obj']">--}}
{{--                                <strong>--}}
{{--                                    <% errors['galleries.' + $index + '.image' ][0] %>--}}
{{--                                </strong>--}}
{{--                            </span>--}}
{{--                            <span class="invalid-feedback">--}}
{{--                                <strong>--}}
{{--                                    <% errors['galleries.' + $index + '.image_obj' ][0] %>--}}
{{--                                </strong>--}}
{{--                            </span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-4 p-2">--}}
{{--                    <label class="gallery-item d-flex align-items-center justify-content-center cursor-pointer" for="gallery-chooser">--}}
{{--                        <i class="fa fa-plus fa-2x text-secondary"></i>--}}
{{--                    </label>--}}
{{--                    <input class="d-none" type="file" accept=".jpg,.png,.jpeg" id="gallery-chooser" multiple>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <span class="invalid-feedback">--}}
{{--                <strong>--}}
{{--                    <% errors.galleries[0] %>--}}
{{--                </strong>--}}
{{--            </span>--}}
{{--        </div>--}}

{{--        <div class="col-md-12">--}}
{{--            <div class="form-group">--}}
{{--                <label>File đính kèm: </label>--}}
{{--                <div class="d-flex">--}}
{{--                    <div class="document-item" ng-repeat="d in form.documents" style="margin-right: 20px">--}}
{{--                        <a href="javascript:void(0)" class="remove" ng-click="deleteFile(d)">--}}
{{--                            <i class="fa fa-times"></i>--}}
{{--                        </a>--}}
{{--                        <a href="<% d %>" target="_blank" class="fa fa-file-pdf-o fa-3x"></a>--}}
{{--                        <a href="<% d %>" target="_blank" class="mt-1 text-ellipsis" title="<% getFileName(d) %>"><% getFileName(d) %></a>--}}
{{--                    </div>--}}
{{--                    <div class="document-item" ng-repeat="d in addition_attachments" style="margin-right: 20px"--}}
{{--                         title="<% d.name ? d.name : 'Chọn file' %>"--}}
{{--                         ng-class="{'error': errors && errors['attachments.' + $index]}">--}}
{{--                        <a href="javascript:void(0)" class="remove" ng-click="removeFile($index)"><i--}}
{{--                                class="fa fa-times"></i></a>--}}
{{--                        <label class="fa fa-file-o fa-3x mb-0 text-secondary cursor-pointer"--}}
{{--                               for="document<% $index %>" ng-if="!d.name"></label>--}}
{{--                        <label class="fa fa-file-pdf-o fa-3x mb-0 text-secondary cursor-pointer"--}}
{{--                               for="document<% $index %>" ng-if="d.name"></label>--}}
{{--                        <label class="mt-1 mb-0 text-secondary file-name cursor-pointer"--}}
{{--                               for="document<% $index %>"><% d.name ? d.name : 'Chọn file' %></label>--}}
{{--                        <input class="d-none attachments" data-index="<% $index %>" type="file"--}}
{{--                               id="document<% $index %>" name="attachments[]">--}}
{{--                    </div>--}}
{{--                    <div class="document-item">--}}
{{--                        <a href="javascript:void(0)" class="fa fa-plus fa-2x text-secondary"--}}
{{--                           ng-click="addFile()"></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <span class="invalid-feedback d-block" role="alert" ng-if="errors && errors['attachments']">--}}
{{--                                <strong><% errors['attachments'][0] %></strong>--}}
{{--                            </span>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="form-group text-center">--}}
{{--            <label for="">Video, link</label>--}}
{{--            <div ng-if="!form.videos || !form.videos.length">Chưa có videos</div>--}}

{{--            <div ng-repeat="video in form.videos track by $index">--}}
{{--                <div class="mb-2 d-flex align-items-center">--}}
{{--                    <u>Video <% $index + 1 %></u>--}}
{{--                    <button class="btn btn-link text-danger ml-auto" ng-click="form.removeVideo($index)"><i class="fa fa-times"></i></button>--}}
{{--                </div>--}}
{{--                <div class="form-group custom-group mb-4">--}}
{{--                    <label class="form-label required-label">Link youtube</label>--}}
{{--                    <input class="form-control " type="text" ng-model="video.link">--}}

{{--                    <span class="invalid-feedback d-block" role="alert">--}}
{{--                        <strong>--}}
{{--                            <% errors['videos.' + $index + '.link' ][0] %>--}}
{{--                        </strong>--}}
{{--                    </span>--}}
{{--                </div>--}}

{{--                <div class="form-group custom-group mb-4">--}}
{{--                    <label class="form-label required-label">Video</label>--}}
{{--                    <input class="form-control " type="text" ng-model="video.video">--}}
{{--                    <span class="invalid-feedback d-block" role="alert">--}}
{{--                        <strong>--}}
{{--                            <% errors['videos.' + $index + '.video' ][0] %>--}}
{{--                        </strong>--}}
{{--                    </span>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <button class="btn btn-info btn-sm mt-1" ng-click="form.addVideo()">--}}
{{--                <i class="fa fa-plus"></i> Thêm video--}}
{{--            </button>--}}
{{--        </div>--}}

    </div>
</div>
<hr>
<div class="text-right">
    <button type="submit" class="btn btn-success btn-cons" ng-click="submit()" ng-disabled="loading.submit">
        <i ng-if="!loading.submit" class="fa fa-save"></i>
        <i ng-if="loading.submit" class="fa fa-spin fa-spinner"></i>
        Lưu
    </button>
    <a href="{{ route('Category.index') }}" class="btn btn-danger btn-cons">
        <i class="fa fa-remove"></i> Hủy
    </a>
</div>
