<template>
  <div>
    <div class="l_product__card__container mb-100 mr-100" @click="clickScreenTransition">
      <img class="l_product--pic u_img__fit--cover100" :src="picData" alt="商品画像" />
      <div class="c_product__card__container">
        <p class="c_product__card--name u_display--Jstart u_font__default">{{ p_data.name }}</p>
        <p
          class="c_product__card--price u_display--end u_font__text--price--lage"
        >￥{{ p_data.price }}円</p>
        <div class="c_product__card--unit">
          <a
            :href="edit_Link"
            class="c_product__card--unit--iconA u_size__icon--card"
            v-if="isEdit"
          >
            <i class="fas fa-tools"></i>
          </a>

          <a :href="info_link" class="c_product__card--unit--iconB u_size__icon--card">
            <i class="far fa-file-alt"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
export default {
  props: ["p_data", "s_id", "buydatas"],
  data() {
    return {
      picData: "",
      info_link: "/store/product/show/" + this.p_data.id,
      edit_Link: "/store/product/edit/" + this.p_data.id,
      isEdit: true
    };
  },
  methods: {
    judgPic() {
      //picがnullか判定する
      if (this.p_data.pic != null) {
        this.picData = "/storage/" + this.p_data.pic;
      } else {
        this.picData = "/storage/img/no-image.png";
      }
      return;
    },
    clickScreenTransition() {
      //画面を遷移させる
      window.location.href = this.info_link;
    },
    judgBuy() {
      for (let i = 0; i < this.buydatas.length; i++) {
        if (this.buydatas[i].buy_product_id == this.p_data.id) {
          console.log("JUDG = out");
          this.isEdit = !this.isEdit;
        }
      }
    }
  },
  mounted() {
    console.log("mounted");
    this.judgPic();
    this.judgBuy();
  }
};
</script>