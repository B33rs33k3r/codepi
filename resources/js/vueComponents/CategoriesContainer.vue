<template>
    <div>
        <div>
            <p>Creer une categorie</p>
            <form @submit.prevent="save">
                <div class="mb-3">
                    <label for="name" class="form-label">Nom:</label>
                    <input class="form-control" type="text" name="name" v-model="new_category.name">
                </div>

                <button type="submit">Enregistrer</button>
            </form>
        </div>

        <div>
            <ul class="row">
                <li v-for="category in categ" class="col-sm-12 col-lg-4 col-xl-3">
                    <categories :category="category"></categories>
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
            categ: this.categories,
            new_category: {
                id: 0,
                name: ''
            }
        };
    },
    methods: {
        save: function() {
            this.$http.post('/savecategory', this.new_category).then(response => {});
        }
    }
}
</script>