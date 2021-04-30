
<template>
    <div>
        <form @submit.prevent="save">
            <div class="catalogs-wrapper">
                <div v-show="product.catalogs.length > 0">
                    <div>
                        <p class="bold">Linked catalogs:</p>
                    </div>

                    <list :list="product.catalogs"
                        :list-class="'small-12 medium-4 large-3'"
                        :event-name="'drop-product-catalog-item'"
                        @drop-product-catalog-item="drop_product_catalog_item">
                        <template #list-item="slotProps">
                            <catalog-pill-action :catalog-item="slotProps.item"></catalog-pill-action>
                        </template>
                    </list>
                </div>

                <div v-show="catalogs.length > 0">
                    <div>
                        <p class="bold">Available categories:</p>
                    </div>

                    <list :list="catalogs"
                        :list-class="'small-12 medium-4 large-3'"
                        :event-name="'drop-catalog-item'"
                        @drop-catalog-item="drop_catalog_item">
                        <template #list-item="slotProps">
                            <catalog-pill-action :catalog-item="slotProps.item"></catalog-pill-action>
                        </template>
                    </list>
                </div>
            </div>

            <div class="grid-container">
                <div class="grid-x grid-padding-x">
                    <div>
                        <p class="bold">Product carac:</p>
                    </div>

                    <div class="cell small-12 medium-12 large-12">
                        <label>Carac 1:
                            <input type="text" v-model="product.carac1">
                        </label>
                    </div>

                    <div class="cell small-12 medium-12 large-12">
                        <label>Carac 2:
                            <input type="text" v-model="product.carac2">
                        </label>
                    </div>

                    <div class="cell small-12 medium-12 large-12">
                        <label>Carac 3:
                            <input type="number" v-model="product.carac3">
                        </label>
                    </div>
                </div>

                <div class="categoies-wrapper">
                    <div v-show="product.categories.length > 0">
                        <div>
                            <p class="bold">Linked categories:</p>
                        </div>

                        <list :list="product.categories"
                            :list-class="'small-12 medium-4 large-3'"
                            :event-name="'drop-product-categories-item'"
                            @drop-product-categories-item="drop_product_categories_item">
                            <template #list-item="slotProps">
                                <category-pill-action :category-item="slotProps.item"></category-pill-action>
                            </template>
                        </list>
                    </div>

                    <div v-show="categories.length > 0">
                        <div>
                            <p class="bold">Available categories:</p>
                        </div>

                        <list :list="categories"
                            :list-class="'small-12 medium-4 large-3'"
                            :event-name="'drop-categories-item'"
                            @drop-categories-item="drop_categories_item">
                            <template #list-item="slotProps">
                                <category-pill-action :category-item="slotProps.item"></category-pill-action>
                            </template>
                        </list>
                    </div>
                </div>

                <div class="button-wrapper" :class="{'disable': sending}">
                    <button type="submit" class="success button">Save</button>
                    <img src="/img/loader.gif" class="loader" v-show="sending">
                </div>
            </div>
        </form>
    </div>
</template>

<script>
module.exports = {
    mounted: function() { this.init(); },
    props: ['productItem', 'catalogList', 'categoryList'],
    data: function() {
        return {
            catalogs: this.catalogList,
            product: this.productItem,
            categories: this.categoryList,
            sending: false
        };
    },
    watch: {
        product_param: function(newvalue, oldvalue) {
            this.product = newvalue;
        }
    },
    methods: {
        init: function() {
            if (this.product.categories.length > 0) {
                this.filter_list_attribute(
                    JSON.parse(JSON.stringify(this.product.categories)),
                    'categories'
                );
            }

            if (this.product.catalogs.length > 0) {
                this.filter_list_attribute(
                    JSON.parse(JSON.stringify(this.product.catalogs)),
                    'catalogs'
                );
            }
        },
        save: function() {
            if (this.sending)
                return;

            this.sending = true;

            let query_data = {
                carac1: this.product.carac1,
                carac2: this.product.carac2,
                carac3: this.product.carac3,
                catalogs: this.reduce_to_ids(this.product.catalogs),
                categories: this.reduce_to_ids(this.product.categories)
            };

            this.$http.put(
                `/product/${this.product.id}`,
                query_data
            ).then(response => {
                this.$emit('message', response.status, response.body.message);
                this.sending = false;
            }, response => {
                this.$emit('message', response.status, response.body.message);
                this.product = this.productItem;
                this.sending = false;
            });
        },
        drop_product_catalog_item: function(deleted_item) {
            this.product.catalogs = this.product.catalogs.filter(function(item) {
                return item.id != deleted_item.id;
            });

            this.catalogs.push(deleted_item);
        },
        drop_catalog_item: function(deleted_item) {
            this.catalogs = this.catalogs.filter(function(item) {
                return item.id != deleted_item.id;
            });

            this.product.catalogs.push(deleted_item);
        },
        drop_product_categories_item: function(deleted_item) {
            this.product.categories = this.product.categories.filter(function(item) {
                return item.id != deleted_item.id;
            });

            this.categories.push(deleted_item);
        },
        drop_categories_item: function(deleted_item) {
            this.categories = this.categories.filter(function(item) {
                return item.id != deleted_item.id;
            });

            this.product.categories.push(deleted_item);
        },
        reduce_to_ids: function(collection) {
            return collection.reduce(function(carry, item) {
                carry.push(item.id);
                return carry;
            }, []);
        },
        filter_list_attribute: function(needle_list, haystack_attribute_name) {
            let shifted_needle = needle_list.shift();

            this[haystack_attribute_name] = this[haystack_attribute_name].filter(function(item) {
                return item.id != shifted_needle.id;
            });

            if (needle_list.length > 0)
                this.filter_list_attribute(needle_list, haystack_attribute_name);

            return;
        }
    }
}
</script>