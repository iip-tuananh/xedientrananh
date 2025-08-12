@include('admin.products.ProductGallery')
@include('admin.products.ProductVideo')
@include('admin.products.Attri')

<script>
    class Product extends BaseClass {
        no_set = [];
        all_categories = @json(\App\Model\Admin\Category::getForSelect());
        all_manufacture = @json(\App\Model\Admin\Manufacturer::getForSelect());
        all_attributes = @json(\App\Model\Admin\Attribute::getForSelect());

        before(form) {
            this.image = {};
            this.status = 0;
            this._attrs = [];
        }

        after(form) {

        }

        get base_price() {
            return this._base_price ? this._base_price.toLocaleString('en') : '';
        }

        set base_price(value) {
            value = parseNumberString(value);
            this._base_price = value;
        }

        get price() {
            return this._price ? this._price.toLocaleString('en') : '';
        }

        set price(value) {
            value = parseNumberString(value);
            this._price = value;
        }


        get image() {
            return this._image;
        }

        set image(value) {
            this._image = new Image(value, this);
        }

        clearImage() {
            if (this.image) this.image.clear();
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

        // attribute
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
        // end attribute

        set videos(value) {
            this._videos = (value || []).map(val => new ProductVideo(val, this));
        }

        get videos() {
            return this._videos;
        }

        addVideo() {
            console.log(this._videos)
            this._videos.push(new ProductVideo({}, this));
        }

        removeVideo(index) {
            this._videos.splice(index, 1);
        }

        get use_url_custom() {
            return this._use_url_custom;
        }

        set use_url_custom(value) {
            this._use_url_custom= !!Number(value) || null;
        }

        get manufacturer_id() {
            return this._manufacturer_id;
        }

        set manufacturer_id(value) {
            this._manufacturer_id = value || null;
        }

        get origin_id() {
            return this._origin_id;
        }

        set origin_id(value) {
            this._origin_id = value || null;
        }

        get documents() {
            return (this.attachments || '').split(', ').map(val => val.trim()).filter(val => !!val);
        }

        updateRevenuePrice() {
            this._revenue_price = this._price * (this.revenue_percent_5 / 100);
        }

        // get tag_ids() {
        //     return this._tag_ids;
        // }
        //
        // set tag_ids(value) {
        //     this._tag_ids = (value || []).map(val => val.id);
        // }

        get submit_data() {
            let data = {
                cate_id: this.cate_id,
                name: this.name,
                code: this.code,
                base_price: this._base_price,
                price: this._price,
                short_des: this.short_des,
                intro: this.intro,
                body: this.body,
                status: this.status,
                type: this.type,
                manufacturer_id: this.manufacturer_id,
                tag_ids: this.tag_ids,
                // state: this.state,
                is_pin: this.is_pin,
                attrs: this._attrs.map(val => val.submit_data),
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
