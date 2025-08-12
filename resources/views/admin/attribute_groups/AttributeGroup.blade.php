<script>
    class AttributeGroup extends BaseClass {
        no_set = [];

        before(form) {
            this.image = {};
        }

        after(form) {

        }

        // Ảnh đại diện
        get image() {
            return this._image;
        }

        set image(value) {
            this._image = new Image(value, this);
        }

        clearImage() {
            if (this.image) this.image.clear();
        }

        get allow_rent() {
            return this._allow_rent;
        }

        set allow_rent(value) {
            this._allow_rent = !!value;
        }

        get submit_data() {
            let data = {
                name: this.name,
                sort_order: this.sort_order,
            }
            data = jsonToFormData(data);

            let image = this.image.submit_data;
            if (image) data.append('image', image);

            return data;
        }
    }
</script>
