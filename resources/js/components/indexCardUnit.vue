<template>
    <ui class="l_product__card-unit__index">
        <IndexCard
            v-for="(productdata, i) in productdatas"
            :key="i"
            :p_data="productdata"
            :buydatas="buydatas"
        ></IndexCard>
    </ui>
</template>

<script>
import IndexCard from "./indexCard.vue";
export default {
    name: "IndexCardUnit",
    props: ["productdatas", "buydatas"],
    data() {
        return {};
    },
    components: {
        IndexCard
    }
};
</script>

<style scoped>
.l_card__unitTest {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
}

.l_card__unitTest::nth-child(4n) {
    margin-right: -30px;
}
</style>
