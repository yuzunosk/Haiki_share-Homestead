<template>
  <div>
    <div class="l_product__card__container mb-100 mr-100" @click="clickScreenTransition">
      <img class="l_product--pic u_img__fit--cover100" :src="picData" alt="商品画像" />
      <div class="c_product__card__container" v-on="click">
        <p class="c_product__card--name u_display--Jstart u_font__default">{{ data.name }}</p>
        <p
          class="c_product__card--price u_display--end u_font__text--price--lage"
        >￥{{ data.price }}円</p>
      </div>
    </div>
  </div>
</template>


<script>
export default {
  props: ["data"],
  data() {
    return {
      picData: "",
      info_link: "/store/product/show/" + this.data.id
    };
  },
  methods: {
    judmentPic() {
      //picがnullか判定する
      if (this.data.pic != null) {
        this.picData = "/storage/" + this.data.pic;
      } else {
        this.picData = "/storage/img/no-image.png";
      }
      return;
    },
    clickScreenTransition() {
      //画面を遷移させる
      window.location.href = this.info_link;
    }
  },
  mounted() {
    console.log("mounted");
    return this.judmentPic();
  }
};
</script>