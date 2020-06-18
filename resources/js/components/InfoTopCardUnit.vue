<template>
  <ui class="l_top--info--panel">
    <ProductMiniCard v-for="(productData, i) in productDatas" :key="i" :data="productData"></ProductMiniCard>
  </ui>
</template>

<script>
import ProductMiniCard from "./ProductMiniCard.vue";
export default {
  data() {
    return {
      productDatas: [
        { name: "パン", image: "/storage/img/パン背景A.jpg", id: 1 },
        { name: "お弁当", image: "/storage/img/onigiriTop.jpg", id: 2 },
        { name: "惣菜", image: "/storage/img/sousaiTop.jpg", id: 3 },
        { name: "スイーツ", image: "/storage/img/sweetTop.jpg", id: 4 },
        { name: "サンドイッチ", image: "/storage/img/sandTop.jpg", id: 5 }
      ]
    };
  },
  components: {
    ProductMiniCard
  }
};
</script>
