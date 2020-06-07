<template>
  <!-- 全体レイアウト、商品情報と店舗情報 -->
  <div class="l_detail__container">
    <div class="l_detail--main c_hero__top__container mb-100">
      <img class="l_detail--main--hero m-auto u_img__fit--cover-detail" :src="image" alt />
      <!-- opacity.3くらいで背景設置 -->
      <!-- グリッドレイアウトを使用 -->
      <!-- img hero 商品画像-->

      <div class="l_detail--main--info">
        <!-- 右がわ商品情報コンテナ -->
        <div class="l_detail--main--info--info l_detail--main--info__container">
          <h2
            class="l_detail--main--info__container--title u_display--Jstart u_font__lage--text"
          >{{ productdata.name }}</h2>

          <p class="l_detail--main--info__container--category">
            <span class="btn--mini btn--beige">{{ productdata.category }}</span>
          </p>

          <p
            class="l_detail--main--info__container--expiration u_display--Jstart u_font__text--expiration"
          >賞味期限：{{ productdata.sellby }}</p>
          <p
            class="l_detail--main--info__container--price-l u_display--Jstart u_font__text--price"
          >通常価格 ¥ {{ productdata.price }}</p>
          <h3
            class="l_detail--main--info__container--price-r u_display--Jstart u_font__text--price--lage u_red--text"
          >セール価格 ¥ {{ productdata.price }}</h3>
        </div>
        <div class="l_detail--main--info--foot u_display--end--Astart mr-30">
          <botton class="btn btn--white">購入する</botton>
          <!-- 状況で変化するボタンのコンポーネント：if文 編集可能か：購入可能か -->
        </div>
      </div>
    </div>
    <div class="l_detail--info u_font__default">
      <!-- 店舗情報 -->
      <h1 class="l_detail--info--head u_display--Jstart">店舗情報</h1>

      <h3 class="l_detail--info--textA u_display--Jstart">店舗名</h3>
      <p class="l_detail--info--dataA u_display--Jstart">{{ storedata.name }}</p>

      <h3 class="l_detail--info--textB u_display--Jstart">支店名</h3>
      <p class="l_detail--info--dataB u_display--Jstart">{{ storedata.branch_name }}</p>

      <h3 class="l_detail--info--textC u_display--Jstart">店長名</h3>
      <p class="l_detail--info--dataC u_display--Jstart">{{ storedata.name }}</p>

      <h3 class="l_detail--info--textE u_display--Jstart">郵便</h3>
      <p class="l_detail--info--dataE u_display--Jstart">〒 000-0000</p>

      <h3 class="l_detail--info--textF u_display--Jstart">住所</h3>
      <p class="l_detail--info--dataF u_display--Jstart">{{ storedata.address }}</p>

      <h3 class="l_detail--info--textG u_display--Jstart">TEL</h3>
      <p class="l_detail--info--dataG u_display--Jstart">0120-000-0000</p>
    </div>
  </div>
</template>

<script>
export default {
  props: ["productdata", "storedata"],
  data() {
    return {
      image: "/storage/" + this.productdata.pic
    };
  }
};
</script>
