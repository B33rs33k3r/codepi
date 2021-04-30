<template>
    <div class="card product-card">
        <div class="card-divider">
            <div class="card-title">
                <p>Product {{ product.id }}</p>
            </div>

            <div class="card-controls">
                <div class="control-edit" @click.prevent.stop="toggle_update_state">
                    <i class="fas fa-edit"></i>
                </div>

                <div class="button-wrapper" :class="{'disable': sending}">
                    <button type="button" class="alert button" @click.prevent.stop="deletion">Delete</button>
                    <img src="/img/loader.gif" class="loader" v-show="sending">
                </div>
            </div>
        </div>

        <div class="card-section">
            <div v-show="!update_state">
                <div class="catalogs-wrapper" v-show="product.catalogs.length > 0">
                    <div>
                        <p class="bold">Catalogs:</p>
                    </div>

                    <slot name="list-catalog" :list="product.catalogs" :list-class="'small-12 medium-4 large-3'"></slot>
                </div>

                <div class="attribute-container product-attribute-container">
                    <div>
                        <p class="bold">Product carac:</p>
                    </div>

                    <div class="attribute-wrapper product-attribute-wrapper">
                        <p class="attribute"><span class="bold attribute-title">Carac 1:</span> {{ product.carac1 }}</p>
                        <p class="attribute"><span class="bold attribute-title">Carac 2:</span> {{ product.carac2 }}</p>
                        <p class="attribute"><span class="bold attribute-title">Carac 3:</span> {{ product.carac3 }}</p>
                    </div>
                </div>

                <div class="categories-wrapper">
                    <div>
                        <p class="bold">Categories:</p>
                    </div>

                    <slot name="list-category" :list="product.categories" :list-class="'small-12 medium-4 large-3'"></slot>
                </div>

            </div>

            <div v-show="update_state">
                <product-update-form :product-item="product"
                    :catalogList="catalogs"
                    :category-list="categories"
                    @message="set_message">
                </product-update-form>
            </div>

            <message :messages="message"></message>
        </div>
    </div>
</template>

<script>
module.exports = {
    props: ['productItem', 'catalogList', 'categoryList'],
    data: function() {
        return {
            product: this.productItem,
            catalogs: this.catalogList,
            categories: this.categoryList,
            sending: false,
            update_state: false,
            message: []
        };
    },
    watch: {
        productItem: function(newvalue, oldvalue) {
            this.product = newvalue;
        }
    },
    methods: {
        deletion: function() {
            if (this.sending)
                return;

            this.sending = true;

            this.$http.delete(`/product/${this.product.id}`)
            .then(response => {
                this.set_message(response.status, response.body.message);
                this.$parent.$emit('delete', response.body.category);
                this.sending = false;
            }, response => {
                this.set_message(response.status, response.body.message);
                this.sending = false;
            });
        },
        toggle_update_state: function() {
            this.update_state = !this.update_state;
        },
        set_message: function(status, text) {
            this.reset_message();

            this.message = [
                {
                    'status': status == 200 ? 'success' : 'error',
                    'text': text
                }
            ];
        },
        reset_message: function() {
            this.message = [];
        },
    }
}
</script>