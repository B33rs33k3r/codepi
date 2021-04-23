
<template>
    <div>
        <div>
            <p>Categories:</p>
        </div>

        <div>
            <ul>
                <li v-for="categ in categs">
                    <span class="bold">{{ categ.name }}</span>
                </li>
            </ul>
        </div>


    </div>
</template>

<script>
module.exports = {
    mounted: function() {},
    props: ['categories'],
    data: function() {
        return {
            categs: this.categories
        };
    }
}
</script>