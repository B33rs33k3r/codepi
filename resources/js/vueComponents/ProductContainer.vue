<template>
    <div>
        <div>
            <p v-if="create">Creer un produit</p>
            <p v-else>Mettre a jour le produit {{ new_product.id }}</p>
            <form @submit.prevent="save_product">
                <input type="text" name="carac1" v-model="new_product.carac1">
                <input type="text" name="carac2" v-model="new_product.carac2">
                <input type="number" name="carac3" v-model="new_product.carac3">

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
    mounted: function() { console.log(this.prods); },
    props: ['products'],
    data: function() {
        return {
            prods: this.products,
            new_product: {
                id: 0,
                carac1: '',
                carac2: '',
                carac3: 0
            },
            create: true
        };
    },
    methods: {
        save_product: function() {
            this.$http.post('/saveproduct', this.new_product).then(response => {
                console.log(response);
                /*if (response.ok)
                    this.prods[response.data.id] = response.data*/

                this.create = true;
            });
        }
    }
}
</script>