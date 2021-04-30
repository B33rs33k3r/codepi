
<template>
    <div class="card product-card">
        <div class="card-divider">
            <div class="card-title">
                <p>Product {{ product.id }}</p>
            </div>
        </div>

        <div class="card-section">
            <p><span class="bold">Carac 1:</span> {{ product.carac1 }}</p>
            <p><span class="bold">Carac 2:</span> {{ product.carac2 }}</p>
            <p><span class="bold">Carac 3:</span> {{ product.carac3 }}</p>

            <div class="categories-wrapper">
                <div>
                    <p class="bold">Categories:</p>
                </div>

                <slot name="list" :list="product.categories" :list-class="'small-12 medium-6 large-4'"></slot>
            </div>
        </div>
    </div>
</template>

<script>
module.exports = {
    props: ['productItem'],
    data: function() {
        return {
            product: this.productItem,
        };
    },
    watch: {
        productItem: function(newvalue, oldvalue) {
            this.product = newvalue;
        }
    }
}
</script>
