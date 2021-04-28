<template>
    <div class="card category-pill">
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
    }
}
</script>