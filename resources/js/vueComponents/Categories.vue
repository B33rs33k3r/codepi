
<template>
    <div>
        <div>
            <p>Categories:</p>
        </div>

        <div>
            <ul>
                <li v-for="categ in categs">{{ categ.name }} - {{ categ.id }}</li>
            </ul>
        </div>


    </div>
</template>

<script>
module.exports = {
    mounted: function() { console.log(this.categories); },
    props: ['categories'],
    data: function() {
        return {
            categs: this.categories
        };
    }
}
</script>