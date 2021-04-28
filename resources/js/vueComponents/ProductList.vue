<template>
    <div>
        <div class="grid-x grid-padding-x">
            <div class="cell small-12 medium-12 large-12 form-create">
                <div>
                    <p class="title">Create product:</p>
                </div>

                <form @submit.prevent="create">
                    <div class="categoies-wrapper">
                        <div class="category-linked category-block" v-if="product.catalogs.length > 0">
                            <p>Linked Catalogs:</p>
                            <ul class="grid-x grid-padding-x grid-margin-x category-detach">
                                <li class="cell auto category-item"
                                    v-for="catalog in product.catalogs"
                                    @click.prevent="detach_catalog(catalog.id)">

                                    <p>{{ catalog.id }}</p>
                                    <div class="category-action">
                                        <i class="fas fa-times"></i>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="categories-available category-block" v-if="catalogs.length > 0">
                            <p>Available Categories:</p>
                            <ul class="grid-x grid-padding-x grid-margin-x category-detach" >
                                <li class="cell auto category-item" v-for="catalog in catalogs" @click.prevent="attach_catalog(catalog.id)">
                                    <p>{{ catalog.id }}</p>
                                    <div class="category-action">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="grid-container">
                        <div class="grid-x grid-padding-x">
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
                            <div class="category-linked category-block" v-if="product.categories.length > 0">
                                <p>Linked Categories:</p>
                                <ul class="grid-x grid-padding-x grid-margin-x category-detach">
                                    <li class="cell auto category-item" v-for="category in product.categories" @click.prevent="detach_category(category.id)">
                                        <p>{{ category.name }}</p>
                                        <div class="category-action">
                                            <i class="fas fa-times"></i>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="categories-available category-block">
                                <p>Available Categories:</p>
                                <ul class="grid-x grid-padding-x grid-margin-x category-detach" v-if="categories.length > 0">
                                    <li class="cell auto category-item" v-for="category in categories" @click.prevent="attach_category(category.id)">
                                        <p>{{ category.name }}</p>
                                        <div class="category-action">
                                            <i class="fas fa-plus"></i>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="button-wrapper">
                            <button type="submit" class="success button">Save</button>
                        </div>
                    </div>
                </form>

                <div class="grid-x grid-padding-x message-wrapper" v-show="message.control">
                    <div class="cell small-12 medium-12 large-12">
                        <div class="message-action" @click.prevent="reset_message">
                            <i class="fas fa-times"></i>
                        </div>

                        <ul>
                            <li v-for="info in message.infos" class="message" :class="info.status">
                                {{ info.text }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

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
            categories: this.category_list,
            product: {
                carac1: '',
                carac2: '',
                carac3: 0,
                catalogs: [],
                categories: []
            },
            attach_categories: [],
            detach_categories: [],
            attach_catalogs: [],
            detach_catalogs: [],
            message: {
                control: false,
                infos: [],
                promise: null
            }
        };
    },
    methods: {
        deletion: function(id) {
            this.products = this.products.filter(function(product) {
                return product.id != id;
            });
        },
        create: function() {
            this.reset_message();

            this.$http.post(
                'product',
                {
                    carac1: this.product.carac1,
                    carac2: this.product.carac2,
                    carac3: this.product.carac3,
                    detach_categories: this.detach_categories,
                    attach_categories: this.attach_categories,
                    detach_catalogs: this.detach_catalogs,
                    attach_catalogs: this.attach_catalogs
                }
            )
            .then(response => {
                this.reset_message();
                this.set_message({
                    0: {status: response.status == 200 ? 'success' : 'error', text: response.body.message}
                });
                this.reset_data();
                this.add(response.body.product);
            }, response => {
                this.reset_message();
                this.set_message({
                    0: {status: response.status == 200 ? 'success' : 'error', text: response.body.message}
                });
            });
        },
        add: function(product) {
            this.products.push(product);
        },
        detach_category: function(category_id) {
            let index = this.attach_categories.indexOf(category_id);
            if (index > -1)
                this.attach_categories.splice(index, 1);
            else
                this.detach_categories.push(category_id);

            this.product.categories = this.product.categories.filter(function(category) {
                if (category.id == category_id)
                    this.categories.push(category);

                return category.id != category_id;
            }, this);

        },
        attach_category: function(category_id) {
            let index = this.detach_categories.indexOf(category_id);
            if (index > -1)
                this.detach_categories.splice(index, 1);
            else
                this.attach_categories.push(category_id);

            this.categories = this.categories.filter(function(category) {
                if (category.id == category_id)
                    this.product.categories.push(category);

                return category.id != category_id;
            }, this);
        },
        detach_catalog: function(catalog_id) {
            let index = this.attach_catalogs.indexOf(catalog_id);
            if (index > -1)
                this.attach_catalogs.splice(index, 1);
            else
                this.detach_catalogs.push(catalog_id);

            this.product.catalogs = this.product.catalogs.filter(function(catalog) {
                if (catalog.id == catalog_id)
                    this.catalogs.push(catalog);

                return catalog.id != catalog_id;
            }, this);

        },
        attach_catalog: function(catalog_id) {
            let index = this.detach_catalogs.indexOf(catalog_id);
            if (index > -1)
                this.detach_catalogs.splice(index, 1);
            else
                this.attach_catalogs.push(catalog_id);

            this.catalogs = this.catalogs.filter(function(catalog) {
                if (catalog.id == catalog_id)
                    this.product.catalogs.push(catalog);

                return catalog.id != catalog_id;
            }, this);
        },
        set_message: function(infos) {
            for (let info_index in infos)
                this.message.infos.push(infos[info_index]);

            this.message.control = true;

            let that = this;
            this.message.promise = setTimeout(function() {
                that.message.control = false;
            }, 60000);
        },
        reset_message: function() {
            if (this.message.promise)
                clearTimeout(this.message.promise);

            this.message.infos = [];
            this.message.control = false;
        },
        reset_data: function() {
            this.product.carac1 = "";
            this.product.carac2 = "";
            this.product.carac3 = 0;
            this.product.catalogs = [];
            this.product.categories = [];
            this.attach_categories = [];
            this.detach_categories = [];
            this.attach_catalogs = [];
            this.detach_catalogs = [];
        }
    }
}
</script>