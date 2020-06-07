<template>
  <ui class="l_card__unitTest">
    <ProductCard v-for="(productdata, i) in productdatas" :key="i" :data="productdata"></ProductCard>
  </ui>
</template>

<script>
import ProductCard from "./ProductCard.vue";
export default {
  props: ["productdatas"],
  data() {
    return {};
  },
  components: {
    ProductCard
  }
};
</script>

<style scoped>
.l_card__unitTest {
  display: flex;
  justify-content: space-around;
  align-items: center;
  flex-wrap: wrap;
}
</style>
