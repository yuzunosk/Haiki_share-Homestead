<template>
    <!-- 全体レイアウト、商品情報と店舗情報 -->
    <div class="l_detail__container">
        <div class="l_detail--main c_hero__top__container mb-100">
          <p v-if="!isDone" class="l_detail--main--attention u_font__Xlage--text--attention">SOLD OUT</p>
            <img
                class="l_detail--main--hero m-auto u_img__fit--cover-detail"
                :src="image"
                alt
            />
            <!-- opacity.3くらいで背景設置 -->
            <!-- グリッドレイアウトを使用 -->
            <!-- img hero 商品画像-->

            <div class="l_detail--main--info">
                <!-- 右がわ商品情報コンテナ -->
                <div
                    class="l_detail--main--info--info l_detail--main--info__container"
                >
                    <h2
                        class="l_detail--main--info__container--title u_display--Jstart u_font__lage--text"
                    >
                        {{ productdata.name }}
                    </h2>

                    <p
                        class="l_detail--main--info__container--category u_display--Jstart"
                    >
                        <span class="btn--mini btn--beige">{{
                            productdata.category
                        }}</span>
                    </p>

                    <p
                        class="l_detail--main--info__container--expiration u_display--Jstart u_font__text--expiration"
                    >
                        賞味期限：{{ productdata.sellby }}
                    </p>
                    <p
                        class="l_detail--main--info__container--price-l u_display--Jstart u_font__text--price"
                    >
                        通常価格 ¥ {{ productdata.regular_price }}
                    </p>
                    <h3
                        class="l_detail--main--info__container--price-r u_display--center u_font__text--price--lage u_red--text"
                    >
                        セール価格 ¥ {{ productdata.price }}
                    </h3>
                </div>
                <div
                    class="l_detail--main--info--foot u_display--end--Astart mr-40"
                >
                    <botton :class="changeClassBtn" @click="changeText"
                        >{{ text }}</botton
                    >
                    <!-- 状況で変化するボタンのコンポーネント：if文 編集可能か：購入可能か -->
                </div>
            </div>
        </div>
        <div class="l_detail--info u_font__default">
            <!-- 店舗情報 -->
            <h1 class="l_detail--info--head u_display--Jstart">店舗情報</h1>

            <h3 class="l_detail--info--textA u_display--Jstart">店舗名</h3>
            <p class="l_detail--info--dataA u_display--Jstart">
                {{ storedata.name }}
            </p>

            <h3 class="l_detail--info--textB u_display--Jstart">支店名</h3>
            <p class="l_detail--info--dataB u_display--Jstart">
                {{ storedata.branch_name }}
            </p>

            <h3 class="l_detail--info--textC u_display--Jstart">店長名</h3>
            <p class="l_detail--info--dataC u_display--Jstart">
                {{ storedata.manager_name }}
            </p>

            <h3 class="l_detail--info--textE u_display--Jstart">郵便</h3>
            <p class="l_detail--info--dataE u_display--Jstart">
                〒 {{ storedata.zip }}
            </p>

            <h3 class="l_detail--info--textF u_display--Jstart">住所</h3>
            <p class="l_detail--info--dataF u_display--Jstart">
                {{ storedata.prefectural }}
            </p>

            <p class="l_detail--info--dataG u_display--Jstart">
                {{ storedata.address }}
            </p>

            <h3 class="l_detail--info--textH u_display--Jstart">TEL</h3>
            <p class="l_detail--info--dataH u_display--Jstart">
                {{ storedata.tel }}
            </p>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    props: ["productdata", "storedata" , "buydata"],
    data() {
        return {
            image: "/storage/" + this.productdata.pic,
            isDone: "",
            text: "",

        };
    },
    methods: {
        doBuy() {
            axios
                .post("/buy" , {
                    p_id: this.productdata.id,
                    u_id: this.storedata.id
                })
                .then(res => {
                    console.log("通信結果" + res );
                })
                .catch(error => {
                    console.log( "通信結果" + error);
                });
        },
        changeText() {
          const res = window.confirm("実行しますか？");
          if(res){

          if(this.isDone) {
            this.text = "購入済み" 
            this.isDone = false;
            this.doBuy();

          }else {
            this.text = "購入する"
            this.isDone = true;
            this.doBuy();

          }
          }
        },
        checkedBuyData() {
          if(this.buydata == null){
            this.isDone = true;
            this.text   = "購入する"
          }else{
            this.isDone = false;
            this.text   = "購入済み"

          }
        }

    },
    computed: {
      changeClassBtn() {
         return {
              "btn": true,
              "btn--transition": true,
              "btn--blue": this.isDone,
              "btn--red": !this.isDone
         }
      }
    },
    mounted() {
      console.log('mounted');
      this.checkedBuyData();
    },
};
</script>
