
<template>
    <div class="product-container">
        <div>
            <p>Produit {{ product.id }}</p>
        </div>

        <div>
            <div>
                <p>1er Caracterisque: {{ product.carac1 }}</p>
            </div>

            <div>
                <p>2eme Caracterisque: {{ product.carac2 }}</p>
            </div>

            <div>
                <p>3eme Caracterisque: {{ product.carac3 }}</p>
            </div>
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