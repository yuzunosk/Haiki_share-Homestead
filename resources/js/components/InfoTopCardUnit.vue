<template>
 <div class="l_top--info__container">
  <ui class="l_top--info--panel">
    <ProductMiniCard v-for="(productData, i) in productDatas" :key="i" :data="productData"></ProductMiniCard>
  </ui>
  <ui class="l_top--info--sm_panel">
     <div class="l_top--info--sm_panel--panelA l_product__miniCard__container">
          <img :src="productDatas[1].image" class="l_product__miniCard--image u_img__fit--cover100" />
          <p class="l_product__miniCard--title u_display--center u_font__text--title">{{ productDatas[1].name }}</p>
     </div>
     <div class="l_top--info--sm_panel--panelB l_product__miniCard__container">
          <img :src="productDatas[2].image" class="l_product__miniCard--image u_img__fit--cover100" />
          <p class="l_product__miniCard--title u_display--center u_font__text--title">{{ productDatas[2].name }}</p>
     </div>
     <div class="l_top--info--sm_panel--panelC l_product__miniCard__container">
          <img :src="productDatas[3].image" class="l_product__miniCard--image u_img__fit--cover100" />
          <p class="l_product__miniCard--title u_display--center u_font__text--title">{{ productDatas[3].name }}</p>
     </div>
     <div class="l_top--info--sm_panel--panelD l_product__miniCard__container">
          <img :src="productDatas[4].image" class="l_product__miniCard--image u_img__fit--cover100" />
          <p class="l_product__miniCard--title u_display--center u_font__text--title">{{ productDatas[4].name }}</p>
     </div>
  </ui>
 </div>
</template>

<script>
import ProductMiniCard from "./ProductMiniCard";
export default {
  data() {
    return {
      productDatas: [
        { name: "パン", image: "/storage/img/panTop.jpg", id: 1 },
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
