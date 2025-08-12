<!-- CSS dùng lại và bổ sung -->
<style>
    .card {
        border-radius: .5rem;
        box-shadow: 0 2px 4px rgba(0,0,0,0.08);
        margin-bottom: 1.5rem;
    }
    .card-header {
        background-color: #f7f7f7;
        font-weight: 600;
    }

    .required-label::after {
        content: " *";
        color: #d00;
    }

    .size-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
        grid-gap: 1rem;
    }

    .color-preview {
        width: 40px; height: 40px;
        border: 1px solid #ccc;
        border-radius: 4px;
        display: inline-block;
        vertical-align: middle;
    }

    .gallery-area {
        display: flex;
        flex-wrap: wrap;
        gap: .5rem;
    }
    .gallery-item {
        position: relative;
        width: calc(33.333% - .5rem);
        min-height: 100px;
        padding: .5rem;
        border: 1px solid #ddd;
        border-radius: 4px;
        text-align: center;
        background: #fff;
    }
    .gallery-item img {
        max-width: 100%;
        max-height: 100px;
        object-fit: cover;
    }
    .gallery-item .remove {
        position: absolute;
        top: .25rem; right: .25rem;
        border: none;
        background: rgba(255,0,0,0.8);
        color: #fff;
        padding: .2rem .4rem;
        border-radius: 2px;
        cursor: pointer;
    }
    .gallery-add {
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px dashed #bbb;
        border-radius: 4px;
        cursor: pointer;
        width: calc(33.333% - .5rem);
        height: 100px;
    }



    .result-item {
        display: flex;
        align-items: center;
        margin-bottom: 0.75rem;
        padding: 0.5rem;
        border: 1px solid #ddd;
        border-radius: 6px;
    }
    .result-item input {
        flex: 1;
        margin-right: 0.5rem;
    }
    .result-item .btn {
        min-width: 36px;
    }



    .result-item input {
        flex: 1;
        margin-right: 0.5rem; /* khoảng cách giữa các input và giữa input với button */
    }

    .result-item input:last-of-type {
        margin-right: 0.75rem; /* nới rộng ít hơn trước khi tới button */
    }

    .result-item .btn {
        min-width: 36px;
        margin-left: 0;      /* đảm bảo nút sát vào khung */
    }

    .result-item .btn + .btn {
        margin-left: 0.25rem; /* khoảng cách giữa 2 nút */
    }
</style>

<form ng-submit="submit()">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                @if(@$object)
                    <div class="card-header" >Thông tin biến thể &nbsp; (<a href="#" target="_blank"> Link sản phẩm</a>) </div>
                @else
                    <div class="card-header">Thông tin biến thể </div>
                @endif
                <div class="card-body">

                    <div class="form-group">
                        <p><strong>Sản phẩm:</strong> <% product.name %></p>
                        <p><strong>Danh mục:</strong> <% product.category.name %></p>
                    </div>

                    <div class="form-group custom-group mb-4">
                        <label class="form-label required-label">Mã SKU</label>
                        <input class="form-control " type="text" ng-model="form.sku">
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>
                                <% errors.sku[0] %>
                            </strong>
                         </span>
                    </div>

                    <div class="form-group custom-group mb-4">
                        <label class="form-label required-label">Tên biến thể</label>
                        <input class="form-control " type="text" ng-model="form.name">
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>
                                <% errors.name[0] %>
                            </strong>
                         </span>
                    </div>

                    <div class="form-group custom-group mb-4">
                        <label class="form-label required-label">Tình trạng</label>
                        <select
                            class="form-control"
                            name="transaction_type"
                            ng-model="form.status"
                            >
                            <option value="" disabled selected>-- Chọn tình trạng --</option>
                            <option value="1">Còn hàng</option>
                            <option value="0">Hết hàng</option>

                        </select>
                        <span class="invalid-feedback d-block" role="alert">
                 <strong><% errors.status[0] %></strong>
            </span>
                    </div>

                    <div class="form-group custom-group mb-4">
                        <label class="form-label required-label">Số lượng</label>
                        <input class="form-control " type="number" ng-model="form.qty">
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>
                                <% errors.qty[0] %>
                            </strong>
                         </span>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Biến thể mặc định</label>
                        <div class="custom-control custom-switch">
                            <input type="checkbox"
                                   class="custom-control-input"
                                   id="isDefaultSwitch"
                                   ng-model="form.is_default">
                            <label class="custom-control-label" for="isDefaultSwitch">
                                Đặt làm serial mặc định
                            </label>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-4">
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

            <div class="card">
                <div class="card-header text-center">Thư viện ảnh</div>
                <div class="card-body">
                    <div class="gallery-area">
                        <div class="gallery-item" ng-repeat="g in form.galleries">
                            <button type="button" class="remove" ng-click="form.removeGallery($index)">
                                &times;
                            </button>
                            <label class="d-block cursor-pointer">
                                <img ng-src="<% g.image.path %>">
                                <input type="file" accept=".jpg,.png,.jpeg" class="d-none"
                                       id="<% g.image.element_id %>">
                            </label>
                        </div>
                        <label class="gallery-add" for="gallery-chooser">
                            <i class="fa fa-plus fa-2x text-secondary"></i>
                        </label>
                        <input type="file" accept=".jpg,.png,.jpeg" id="gallery-chooser"
                               class="d-none" multiple>
                    </div>
                    <div class="text-danger mt-1" ng-if="errors.galleries">
                        <% errors.galleries[0] %>
                    </div>
                </div>
            </div>



        </div>
    </div>

    <div class="text-right">
        <button type="submit" class="btn btn-success" ng-disabled="loading.submit">
            <i ng-if="!loading.submit" class="fa fa-save"></i>
            <i ng-if="loading.submit" class="fa fa-spin fa-spinner"></i>
            Lưu
        </button>

        <a href="{{ route('product_variants.index') }}?product-id=<% form.product_id %>" class="btn btn-danger">
            <i class="fa fa-times"></i> Hủy
        </a>
    </div>
</form>
