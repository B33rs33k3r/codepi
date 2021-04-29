
<template>
    <div class="card catalog-card">
        <div class="card-divider">
            <div class="card-title">
                <p>Catalog {{ catalog.id }}</p>
            </div>

            <div class="card-controls">
                <div class="control-edit">
                    <a href="/product"><i class="fas fa-edit"></i></a>
                </div>

                <div class="button-wrapper">
                    <button type="button" class="alert button" @click.prevent.stop="deletion">Delete</button>
                </div>
            </div>
        </div>

        <div class="card-section">
            <slot name="list" :list="catalog.products" :list-class="'small-12 medium-10 large-4'"></slot>

            <message :messages="message"></message>
        </div>
    </div>
</template>

<script>
module.exports = {
    mounted: function() {},
    props: ['catalogItem'],
    data: function() {
        return {
            catalog: this.catalogItem,
            message: []
        };
    },
    watch: {
        catalogItem: function(newvalue, oldvalue) {
            this.catalog = newvalue;
        }
    },
    methods: {
        deletion: function() {
            this.$http.delete(`/catalog/${this.catalog.id}`)
            .then(response => {
                this.reset_message();
                this.set_message(response.status, response.body.message);
                this.$parent.$emit('delete', response.body.catalog);
            }, response => {
                this.reset_message();
                this.set_message(response.status, response.body.message);
            });
        },
        set_message: function(status, text) {
            this.message = [
                {
                    'status': status == 200 ? 'success' : 'error',
                    'text': text
                }
            ];
        },
        reset_message: function() {
            this.message = [];
        }
    }
}
</script>