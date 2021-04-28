
<template>
    <div>
        <div class="grid-x grid-padding-x  form-container">
            <div class="cell small-12 medium-12 large-12">
                <form @submit.prevent.stop="create">
                    <div class="button-wrapper">
                        <button type="submit" class="success button">Create a new Catalog</button>
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
            message: []
        };
    },
    methods: {
        create: function() {
            this.$http.post('/catalog')
            .then(response => {
                this.reset_message();
                this.set_message(response.status, response.body.message);
                this.$parent.$emit('delete', response.body.catalog);
            }, response => {
                this.reset_message();
                this.set_message(response.status, response.body.message);
            })
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
