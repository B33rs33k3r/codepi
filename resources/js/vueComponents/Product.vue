
<template>
    <div class="product-container">
        <div>
            <p>Produit {{ product.id }}</p>
        </div>

        <div>
            <form @submit.prevent="save">
                <div class="mb-3">
                    <label for="carac1" class="form-label">1er Caracteristique:</label>
                    <input class="form-control" type="text" name="carac1" v-model="product.carac1">
                </div>
                <div class="mb-3">
                    <label for="carac2" class="form-label">2eme Caracteristique:</label>
                    <input class="form-control" type="text" name="carac2" v-model="product.carac2">
                </div>
                <div>
                    <label for="carac3" class="form-label">3eme Caracteristique:</label>
                    <input class="form-control" type="number" name="carac3" v-model="product.carac3">
                </div>

                <button type="submit">Enregistrer</button>
            </form>
        </div>

        <div>
            <button @click.prevent="deletion">Supprimer</button>
        </div>
    </div>
</template>

<script>
module.exports = {
    mounted: function() {},
    props: ['produit'],
    data: function() {
        return {
            product: this.produit
        };
    },
    methods: {
        save: function() {
            this.$http.post('/saveproduct', this.product).then(response => {
                if (!response.ok)
                    this.product = this.produit;
            });
        },
        deletion: function() {
            this.$http.post('/deleteproduct', this.product).then(response => {})
        }
    }
}
</script>