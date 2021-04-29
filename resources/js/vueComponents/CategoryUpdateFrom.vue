
<template>
    <div>
        <div class="grid-x grid-padding-x  form-container form-create-category">
            <div class="cell small-12 medium-12 large-12">
                <form @submit.prevent.stop="update">
                    <div class="grid-container">
                        <div class="grid-x grid-padding-x">
                            <div class="cell small-12 medium-12 large-12">
                                <label>Name:
                                    <input type="text" v-model="category.name">
                                </label>
                            </div>
                        </div>

                        <div class="button-wrapper" :class="{'disable': sending}">
                            <button type="submit" class="success button">Save</button>
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
    props: ['categoryItem'],
    data: function() {
        return {
            category: {
                id: this.categoryItem.id,
                name: this.categoryItem.name
            },
            message: [],
            sending: false
        };
    },
    methods: {
        update: function() {
            if (this.sending)
                return;

            if (this.category.name == this.categoryItem.name) {
                this.reset_message();
                return this.set_message(0, 'No data change');
            }

            this.sending = true;

            this.$http.put(
                `/category/${ this.category.id }`,
                {
                    'name': this.category.name
                }
            )
            .then(response => {
                this.reset_message();
                this.set_message(response.status, response.body.message);
                this.categoryItem.name = this.category.name;
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
        }
    }
}
</script>
