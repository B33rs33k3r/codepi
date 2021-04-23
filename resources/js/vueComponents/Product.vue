
<template>
    <div>
        <div>
            <p>Produit {{ product.id }}</p>
        </div>

        <div>
            <div>
                <p>1er Caracterisque: <span class="bold">{{ product.carac1 }}</span></p>
            </div>

            <div>
                <p>2eme Caracterisque: <span class="bold">{{ product.carac2 }}</span></p>
            </div>

            <div>
                <p>3eme Caracterisque: <span class="bold">{{ product.carac3 }}</span></p>
            </div>

            <categories v-if="product.categories" :categories="product.categories"></categories>
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
    }
}
</script>