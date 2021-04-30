<template>
    <div class="card category-pill pill">
        <p>{{ category.name }}</p>
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
    }
}
</script>