
<template>
    <div class="card category-pill-action pill-action pill" @click.prevent.stop="drop">
        <div class="pill-action-title">
            <p>{{ category.name }}</p>
        </div>

        <div class="pill-action-controls">
            <i class="fas fa-arrows-alt-v"></i>
        </div>
    </div>
</template>

<script>
module.exports = {
    props: ['categoryItem'],
    data: function() {
        return {
            category: this.categoryItem,
        };
    },
    watch: {
        categoryItem: function(newvalue, oldvalue) {
            this.category = newvalue;
        }
    },
    methods: {
        drop: function() {
            this.$parent.$emit('delete', this.category);
        }
    }
}
</script>
