
<template>
    <div class="card product-card">
        <div class="card-divider">
            <div>
                <p>Product {{ product.id }}</p>
            </div>

            <div class="product-action">
                <ul>
                    <li @click.prevent="switch_mode"><i class="fas fa-edit"></i></i></li>
                </ul>
            </div>
        </div>

        <div class="card-section">

            <div v-show="!update_state">
                <div class="category-linked category-block" v-if="product.catalogs.length > 0">
                    <p>Linked Catalogs:</p>
                    <ul class="grid-x grid-padding-x grid-margin-x category-detach">
                        <li class="cell auto category-item" v-for="catalog in product.catalogs">
                            <p>{{ catalog.id }}</p>
                        </li>
                    </ul>
                </div>

                <div class="product-caracs">
                    <p>Carac produit:</p>
                    <ul>
                        <li class="product-carac"><p><span class="bold">Carac 1:</span> {{ product.carac1 }}</p></li>
                        <li class="product-carac"><p><span class="bold">Carac 2:</span> {{ product.carac2 }}</p></li>
                        <li class="product-carac"><p><span class="bold">Carac 3:</span> {{ product.carac3 }}</p></li>
                    </ul>
                </div>

                <div class="category-linked category-block" v-if="product.categories.length > 0">
                    <p>Linked Categories:</p>
                    <ul class="grid-x grid-padding-x grid-margin-x category-detach">
                        <li class="cell auto category-item" v-for="category in product.categories">
                            <p>{{ category.name }}</p>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="product-update" v-show="update_state">
                <product-update
                    :product_param="product"
                    :category_param="categories"
                    :catalog_param="catalogs"
                    @delete="deletion">
                </product-update>
            </div>
        </div>
    </div>
</template>

<script>
module.exports = {
    mounted: function() { this.init(); },
    props: ['catalog_param', 'product_param', 'category_param', ],
    data: function() {
        return {
            catalogs: this.catalog_param,
            product: this.product_param,
            categories: this.category_param,
            update_state: false
        };
    },
    watch: {
        product_param: function(newvalue, oldvalue) {
            this.product = newvalue;
            this.switch_mode(false);
        }
    },
    methods: {
        init: function() {
            console.log(this.product);
            let product_catalogs = JSON.parse(JSON.stringify(this.product.catalogs));

            if (this.product.catalogs.length > 0)
                this.filter_catalogs(product_catalogs);

            let product_categories = JSON.parse(JSON.stringify(this.product.categories));

            if (this.product.categories.length > 0)
                this.filter_categories(product_categories);
        },
        deletion: function(id) {
            this.$emit('delete', id);
        },
        filter_categories: function(categories) {
            let shifted_category = categories.shift();

            this.categories = this.categories.filter(function(category) {
                return category.id != shifted_category.id;
            });

            if (categories.length > 0)
                this.filter_categories(categories);

            return;
        },
        filter_catalogs: function(catalogs) {
            let shifted_catalog = catalogs.shift();

            this.catalogs = this.catalogs.filter(function(catalog) {
                return catalog.id != shifted_catalog.id
            });

            if (catalogs.length > 0)
                this.filter_catalogs(catalogs);

            return;
        },
        switch_mode: function(value) {
            this.update_state = typeof value == 'boolean' ? value : !this.update_state;
        }
    }
}
</script>