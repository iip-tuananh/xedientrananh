<script>
    class Attribute extends BaseClass {
        no_set = [];
        attribute_groups = @json(\App\Model\Admin\AttributeGroup::getForSelect());

        before(form) {

        }

        after(form) {

        }

        get submit_data() {
            let data = {
                name: this.name,
                group_id: this.group_id,
            }

            return data;
        }
    }
</script>
