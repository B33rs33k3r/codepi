
<template>
    <div class="card catalog-pill pill-action pill" @click.prevent.stop="drop">
        <div class="pill-action-title">
            <p>{{ catalog.id }}</p>
        </div>

        <div class="pill-action-controls">
            <i class="fas fa-arrows-alt-v"></i>
        </div>
    </div>
</template>

<script>
module.exports = {
    props: ['catalogItem'],
    data: function() {
        return {
            catalog: this.catalogItem,
        };
    },
    watch: {
        catalogItem: function(newvalue, oldvalue) {
            this.catalog = newvalue;
        }
    },
    methods: {
        drop: function() {
            this.$parent.$emit('delete', this.catalog);
        }
    }
}
</script>
