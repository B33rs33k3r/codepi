<template>
    <div>
        <div class="grid-x grid-padding-x">
            <div class="cell small-12 medium-12 large-12">
                <slot name="form" :optional-data="optional_data"></slot>
            </div>
        </div>

        <ul class="grid-x grid-padding-x list-container">
            <li v-for="item in items" class="cell" :class="list_class">
                <slot name="list-item" :item="item" :optional-data="optional_data"></slot>
            </li>
        </ul>
    </div>
</template>

<script>
module.exports = {
    mounted: function() {
        // Custom event listener to get new item from child component
        this.$on('add', this.add);

        // Custom event listener to delete item from child component
        this.$on('delete', this.delete);
    },
    props: ['list', 'optionalData', 'listClass', 'eventName'],
    data: function() {
        return {
            items: this.list,
            optional_data: this.optionalData,
            list_class: this.listClass ? this.listClass : 'small-12 medium-12 large-12'
        };
    },
    watch: {
        list: function(newvalue, oldvalue) {
            this.items = newvalue;
        }
    },
    methods: {
        add: function(new_item) {
            this.items.push(new_item);
        },
        delete: function(deleted_item) {
            this.items = this.items.filter(function(item) {
                return item.id != deleted_item.id;
            });

            if (this.eventName)
                this.$emit(this.eventName, deleted_item);
        }
    }
}
</script>