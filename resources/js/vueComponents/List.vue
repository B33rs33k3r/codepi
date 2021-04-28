<template>
    <div>
        <div class="grid-x grid-padding-x">
            <div class="cell small-12 medium-12 large-12">
                <slot name="form"></slot>
            </div>
        </div>

        <ul class="grid-x grid-padding-x">
            <li v-for="item in items" class="cell" :class="list_class">
                <slot name="list-item" :item="item"></slot>
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
    props: ['list', 'listClass'],
    data: function() {
        return {
            items: this.list,
            list_class: this.listClass ? this.listClass : 'small-12 medium-12 large-12'
        };
    },
    methods: {
        add: function(new_item) {
            this.items.push(new_item);
        },
        delete: function(deleted_item) {
            this.items = this.items.filter(function(item) {
                return item.id != deleted_item.id;
            });
        }
    }
}
</script>