<template>
  <div class="l_product__stick-unit mb-30">
    <img class="l_product--pic u_img__fit--cover u_size__icon--radius" :src="pic" alt="商品画像" />
    <p class="l_product--name u_display--Jstart ml-30">{{ data.name }}</p>
    <div class="l_product--icon">
      <a :href="info_link">
        <img
          class="l_product--icon u_img__fit--cover u_size__icon--radius"
          src="/storage/img/データアイコン.png"
          alt="詳細ボタン"
        />
      </a>
    </div>
  </div>
</template>


<script>
export default {
  props: ["data"],
  data() {
    return {
      pic: "/storage/" + this.data.pic,
      info_link: "/store/product/show/" + this.data.id
    };
  }
};
</script>