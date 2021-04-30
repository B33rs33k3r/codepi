
<template>
    <div class="card catalog-pill pill">
        <p>{{ catalog.id }}</p>
    </div>
</template>

<script>
module.exports = {
    mounted: function() {},
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
    }
}
</script>
