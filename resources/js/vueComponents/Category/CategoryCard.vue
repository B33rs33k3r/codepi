
<template>
    <div class="card category-card">
        <div class="card-divider">
            <div class="card-title">
                <p>Category {{ category.id }}</p>
            </div>

            <div class="card-controls">
                <div class="control-edit" @click.prevent.stop="switch_update_state">
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
                <p><span class="bold">Name:</span> {{ category.name }}</p>
            </div>

            <category-update-form :category-item="category" v-show="update_state"></category-update-form>

            <slot name="list" :list="category.products" :list-class="'small-12 medium-10 large-4'"></slot>

            <message :messages="message"></message>
        </div>
    </div>
</template>

<script>
module.exports = {
    mounted: function() {},
    props: ['categoryItem'],
    data: function() {
        return {
            category: this.categoryItem,
            message: [],
            update_state: false,
            sending: false
        };
    },
    watch: {
        catalogItem: function(newvalue, oldvalue) {
            this.category = newvalue;
        }
    },
    methods: {
        deletion: function() {
            if (this.sending)
                return;

            this.sending = true;

            this.$http.delete(`/category/${this.category.id}`)
            .then(response => {
                this.reset_message();
                this.set_message(response.status, response.body.message);
                this.$parent.$emit('delete', response.body.category);
                this.sending = false;
            }, response => {
                this.reset_message();
                this.set_message(response.status, response.body.message);
                this.sending = false;
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
        },
        switch_update_state: function() {
            this.update_state = !this.update_state;
        }
    }
}
</script>