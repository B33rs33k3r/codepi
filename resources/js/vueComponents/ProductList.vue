<template>
    <div>
        <ul class="grid-x grid-padding-x grid-padding-y">
            <li v-for="product in products" class="cell small-12 medium-12 large-12">
                <product
                    :catalog_param="catalogs"
                    :product_param="product"
                    :category_param="categories"
                    @delete="deletion">
                </product>
            </li>
        </ul>
    </div>
</template>

<script>
module.exports = {
    mounted: function() {},
    props: ['catalog_list', 'product_list', 'category_list'],
    data: function() {
        return {
            catalogs: this.catalog_list,
            products: this.product_list,
            categories: this.category_list
        };
    },
    methods: {
        deletion: function(id) {
            this.products = this.products.filter(function(product) {
                return product.id != id;
            });
        }
    }
}
</script>