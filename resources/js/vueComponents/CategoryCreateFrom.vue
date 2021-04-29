
<template>
    <div>
        <div class="grid-x grid-padding-x  form-container form-create-category">
            <div class="cell small-12 medium-12 large-12">
                <form @submit.prevent.stop="create">
                    <div class="grid-container">
                        <div class="grid-x grid-padding-x">
                            <div class="cell small-12 medium-12 large-12">
                                <label>Name:
                                    <input type="text" v-model="category.name">
                                </label>
                            </div>
                        </div>

                        <div class="button-wrapper" :class="{'disable': sending}">
                            <button type="submit" class="success button">Create a new Category</button>
                            <img src="/img/loader.gif" class="loader" v-show="sending">
                        </div>
                    </div>
                </form>

                <message :messages="message"></message>
            </div>
        </div>
    </div>
</template>

<script>
module.exports = {
    mounted: function() {},
    props: [],
    data: function() {
        return {
            category: {name: ''},
            message: [],
            sending: false
        };
    },
    methods: {
        create: function() {
            if (this.sending)
                return;

            this.sending = true;

            this.$http.post(
                '/category',
                {
                    name: this.category.name
                }
            )
            .then(response => {
                this.reset_message();
                this.set_message(response.status, response.body.message);
                this.reset_data();
                this.$parent.$emit('add', response.body.category);
                this.sending = false;
            }, response => {
                this.reset_message();
                this.set_message(response.status, response.body.message);
                this.sending = false;
            });
        },
        reset_data() {
            this.category.name = "";
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
