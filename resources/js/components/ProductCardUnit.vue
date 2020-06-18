<template>
  <ui class="l_product__card-unit__index">
    <ProductCard v-for="(productdata, i) in productdatas" :key="i" :p_data="productdata" :s_id="storeid" ></ProductCard>
  </ui>
</template>

<script>
import ProductCard from "./ProductCard.vue";
export default {
  props: ["productdatas","storeid"],
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
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
}

.l_card__unitTest::nth-child(4n) {
  margin-right: -30px;
}
</style>
