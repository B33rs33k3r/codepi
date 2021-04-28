<template>
    <div>
        <div class="grid-x grid-padding-x message-wrapper" v-show="message.control">
            <div class="cell small-12 medium-12 large-12">
                <div class="message-action" @click.prevent.stop="close">
                    <i class="fas fa-times"></i>
                </div>

                <ul v-show="message.infos.length > 0">
                    <li v-for="info in message.infos" class="message" :class="info.status">
                        {{ info.text }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
module.exports = {
    mounted: function() {},
    props: ['messages'],
    data: function() {
        return {
            message: {
                control: false,
                infos: [],
                promise: null
            }
        };
    },
    watch: {
        messages: function(newvalue, oldvalue) {
            this.message.infos = newvalue;

            if (this.message.promise)
                clearTimeout(this.message.promise);

            this.open();
        }
    },
    methods: {
        close: function() {
            this.message.control = false;
        },
        open: function() {
            this.message.control = true;

            let that = this;
            this.message.promise = setTimeout(function() {
                that.message.control = false;
            }, 60000);
        }
    }
}
</script>