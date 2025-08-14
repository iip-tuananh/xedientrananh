@include('admin.finance_companies.FinancePackage')

<script>
    class FinanceCompany extends BaseClass {
        no_set = [];

        before(form) {
            this._packages = [];
            this.image = {};

        }

        after(form) {

        }

        get image() {
            return this._image;
        }

        set image(value) {
            this._image = new Image(value, this);
        }

        set packages(value) {
            this._packages = (value || []).map(val => new FinancePackage(val, this))
        }

        get packages() {
            return this._packages || []
        }

        addPackage(value) {
            this._packages.push(new FinancePackage(value, this));
        }

        removePackage(index) {
            this._packages.splice(index, 1)
        }


        get submit_data() {
            let data = {
                name: this.name,
                hotline: this.hotline,
                website: this.website,
                note: this.note,
                document: this.document,
                status: this.status,
                packages: this._packages.map(val => val.submit_data),
            }

            data = jsonToFormData(data);
            let image = this.image.submit_data;
            if (image) data.append('image', image);

            return data;
        }

    }
</script>
