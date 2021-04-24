<template>
    <div>
        <div>
            <p>Creer un produit</p>
            <form @submit.prevent="save_product">
                <div class="mb-3">
                    <label for="carac1" class="form-label">1er Caracteristique:</label>
                    <input class="form-control" type="text" name="carac1" v-model="new_product.carac1">
                </div>
                <div class="mb-3">
                    <label for="carac2" class="form-label">2eme Caracteristique:</label>
                    <input class="form-control" type="text" name="carac2" v-model="new_product.carac2">
                </div>
                <div>
                    <label for="carac3" class="form-label">3eme Caracteristique:</label>
                    <input class="form-control" type="number" name="carac3" v-model="new_product.carac3">
                </div>

                <button type="submit">Enregistrer</button>
            </form>
        </div>

        <ul class="row">
            <li v-for="prod in prods" class="col-sm-12 col-lg-4 col-xl-3">
                <product :produit="prod"></product>
            </li>
        </ul>
    </div>
</template>

<script>
module.exports = {
    mounted: function() {},
    props: ['products'],
    data: function() {
        return {
            prods: this.products,
            new_product: {
                id: 0,
                carac1: '',
                carac2: '',
                carac3: 0
            }
        };
    },
    methods: {
        save_product: function() {
            this.$http.post('/saveproduct', this.new_product).then(response => {});
        }
    }
}
</script>