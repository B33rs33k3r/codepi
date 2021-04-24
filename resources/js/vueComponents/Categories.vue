
<template>
    <div>
        <p>Categorie {{ categ.id }}</p>
        <form @submit.prevent="save">
            <div class="mb-3">
                <label for="name" class="form-label">Nom:</label>
                <input class="form-control" type="text" name="name" v-model="categ.name">
            </div>

            <button type="submit">Enregistrer</button>
        </form>
    </div>
</template>

<script>
module.exports = {
    mounted: function() {},
    props: ['category'],
    data: function() {
        return {
            categ: this.category
        };
    },
    methods: {
        save: function() {
            this.$http.post('/savecategory', this.categ).then(response => {});
        }
    }
}
</script>