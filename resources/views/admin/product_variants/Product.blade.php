@include('admin.product_variants.ProductGallery')
@include('admin.product_variants.Video')

<script>
    class Product extends BaseClass {
        no_set = [];

        before(form) {
            this.all_products = @json(\App\Model\Admin\Product::getForSelect());
            this.image = {};
            this._attrs = [];

        }

        after(form) {
            this.videos = form.videos && form.videos.length
                ? form.videos
                : [
                    new Video({ title: null}),
                ];
        }

        get videos() {
            return this._videos || [];
        }

        set videos(value) {
            this._videos = (value || []).map(val => new Video(val, this));
        }

        addVideo(result) {
            if (!this._videos) this._videos = [];
            let new_result = new Video(result, this);
            this._videos.push(new_result);
            return new_result;
        }

        removeVideo(index) {
            this._videos.splice(index, 1);
        }

        get image() {
            return this._image;
        }

        set image(value) {
            this._image = new Image(value, this);
        }

        clearImage() {
            if (this.image) this.image.clear();
            if (this.image_back) this.image_back.clear();
        }

        get galleries() {
            return this._galleries || [];
        }

        set galleries(value) {
            this._galleries = (value || []).map(val => new ProductGallery(val, this));
        }

        addGallery(gallery) {
            if (!this._galleries) this._galleries = [];
            let new_gallery = new ProductGallery(gallery, this);
            this._galleries.push(new_gallery);
            return new_gallery;
        }

        removeGallery(index) {
            this._galleries.splice(index, 1);
        }

        set attrs(value) {
            this._attrs = (value || []).map(val => new Attri(val, this))
        }

        get attrs() {
            return this._attrs || []
        }

        addAttributes(value) {
            const exists = this._attrs.some(attrWrapper =>
                attrWrapper.id === value.id
            );
            if (exists) {
                toastr.warning('Thuộc tính này đã được thêm');
                return;
            }

            this._attrs.push(new Attri(value, this));
        }

        removeAttributes(index) {
            this._attrs.splice(index, 1)
        }

        get cost_price() {
            return this._cost_price ? this._cost_price.toLocaleString('en') : '';
        }

        set cost_price(value) {
            value = parseNumberString(value);
            this._cost_price = value;
        }

        get min_daily_rental_price() {
            return this._min_daily_rental_price ? this._min_daily_rental_price.toLocaleString('en') : '';
        }

        set min_daily_rental_price(value) {
            value = parseNumberString(value);
            this._min_daily_rental_price = value;
        }

        get sale_price() {
            return this._sale_price ? this._sale_price.toLocaleString('en') : '';
        }

        set sale_price(value) {
            value = parseNumberString(value);
            this._sale_price = value;
        }


        get deposit_price() {
            return this._deposit_price ? this._deposit_price.toLocaleString('en') : '';
        }

        set deposit_price(value) {
            value = parseNumberString(value);
            this._deposit_price = value;
        }


        get is_default() {
            return this._is_default;
        }

        set is_default(value) {
            this._is_default = !!value;
        }

        get submit_data() {
            let data = {
                product_id: this.product_id,
                name: this.name,
                sku: this.sku,
                status: this.status,
                intro: this.intro,
                qty: this.qty,
                is_default: this.is_default ? 1 : 0,

            }

            data = jsonToFormData(data);
            let image = this.image.submit_data;
            if (image) data.append('image', image);

            this.galleries.forEach((g, i) => {
                if (g.id) data.append(`galleries[${i}][id]`, g.id);
                let gallery = g.image.submit_data;
                if (gallery) data.append(`galleries[${i}][image]`, gallery);
                else data.append(`galleries[${i}][image_obj]`, g.id);
            })

            return data;
        }
    }
</script>
