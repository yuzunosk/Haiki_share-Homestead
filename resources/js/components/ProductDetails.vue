<template>
    <!-- 全体レイアウト、商品情報と店舗情報 -->
    <div class="l_detail__container">
        <div class="l_detail--main c_hero__top__container mb-100">
            <p
                v-if="isBuy"
                class="l_detail--main--attention u_font__Xlage--text--attention"
            >
                SOLD OUT
            </p>
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
                <div class="l_detail--main--info--head">
                    <div class="l_detail--main--info--right u_display--center">
                        <a
                            data-hashtags="masizime"
                            data-via="masizime"
                            data-related="masizime:こんにちはウェブのましじめです。"
                            data-size="large"
                            data-text="カスタムテキスト"
                            href="https://twitter.com/share?ref_src=twsrc%5Etfw"
                            class="btn--blue btn--sns"
                            data-show-count="false"
                        >
                            <i class="fab fa-twitter fa-2x"></i>
                        </a>
                    </div>
                </div>
                <div
                    class="l_detail--main--info--info l_detail--main--info__container"
                >
                    <h2
                        class="l_detail--main--info__container--title u_display--Jstart--info u_font__lage--text"
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
                <div class="l_detail--main--info--foot">
                    <button
                        :class="changeClassBtn"
                        v-if="isPurchase"
                        @click="clickDone"
                        :disabled="isDisabled"
                    >
                        {{ toggleText }}
                    </button>
                    <!-- 状況で変化するボタンのコンポーネント：if文 編集可能か：購入可能か-->
                    <component :is="isWhich"></component>
                </div>
            </div>
        </div>
        <div class="l_detail--info">
            <!-- 店舗情報 -->
            <h1 class="l_detail--info--head u_display--Jstart u_font__detail--head">店舗情報</h1>

            <h3 class="l_detail--info--textA u_display--Jstart u_font__detail--info--title">店舗名</h3>
            <p class="l_detail--info--dataA u_display--Jstart u_font__detail--default">
                {{ storedata.store_name }}
            </p>

            <h3 class="l_detail--info--textB u_display--Jstart  u_font__detail--info--title">支店名</h3>
            <p class="l_detail--info--dataB u_display--Jstart u_font__detail--default">
                {{ storedata.branch_name }}
            </p>

            <h3 class="l_detail--info--textC u_display--Jstart u_font__detail--info--title">店長名</h3>
            <p class="l_detail--info--dataC u_display--Jstart u_font__detail--default">
                {{ storedata.manager_name }}
            </p>

            <h3 class="l_detail--info--textE u_display--Jstart u_font__detail--info--title">郵便</h3>
            <p class="l_detail--info--dataE u_display--Jstart u_font__detail--default">
                〒 {{ storedata.zip }}
            </p>

            <h3 class="l_detail--info--textF u_display--Jstart u_font__detail--info--title">住所</h3>
            <p class="l_detail--info--dataF u_display--Jstart u_font__detail--default">
                {{ storedata.prefectural }}
            </p>

            <p class="l_detail--info--dataG u_display--Jstart u_font__detail--default">
                {{ storedata.address }}
            </p>

            <h3 class="l_detail--info--textH u_display--Jstart u_font__detail--info--title">TEL</h3>
            <p class="l_detail--info--dataH u_display--Jstart u_font__detail--default">
                {{ storedata.tel }}
            </p>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import b_CompoA from "./buyComponentA";
import b_CompoB from "./buyComponentB";
export default {
    props: ["productdata", "storedata", "buydata", "authdata"],
    data() {
        return {
            image: "/storage/" + this.productdata.pic,
            isBuy: false,
            isBuyer: false,
            isDone: false,
            isWhich: "b_CompoA",
            isPurchase: true,
            isDisabled: false,
            tweetView_link: "/tweet/"
        };
    },
    methods: {
        doBuy() {
            axios
                .post("/buy", {
                    p_id: this.productdata.id,
                    id: this.storedata.id,
                    u_id: this.authdata
                })
                .then(res => {
                    console.log("通信結果" + res);
                })
                .catch(error => {
                    console.log("通信結果" + error);
                });
        },
        clickDone() {
            const res = window.confirm("実行しますか？");
            if (res) {
                //商品が売れている状況か判定する
                if (!this.isBuy) {
                    //売れていない場合
                    this.isDone = false;
                    this.isBuy = true;
                    this.doBuy();
                    this.isDisabled = true;
                    this.judgComponent();
                } else {
                    //売れている場合
                    this.isDone = true;
                    this.isBuy = false;
                    this.doBuy();
                    this.isDisabled = true;
                    this.judgComponent();
                }
            }
        },
        judgBuyer() {
            //ログインユーザーIDとbuydataに記録されているユーザーIDを照合する
            if (this.buydata != null) {
                if (this.authdata === this.buydata.buy_user_id) {
                    this.isBuyer = true;
                } else {
                    this.isBuyer = false;
                }
            }
        },
        judgBuy() {
            if (this.buydata != null) {
                this.isBuy = true;
                if (this.isBuyer) {
                    this.isDisabled = false;
                }
            }
        },
        judgPurchase() {
            if (this.isBuy && this.isBuyer) {
                this.isPurchase = true;
            } else if (!this.isBuy && !this.isBuyer) {
                this.isPurchase = true;
            } else {
                this.isPurchase = false;
            }
        },
        iniSet() {
            this.judgBuyer();
            this.judgBuy();
            this.judgPurchase();
            this.judgComponent();
        },
        showTweetView() {
            //画面を遷移させる
            window.location.href = this.tweetView_link;
        },
        judgComponent() {
            if (this.isBuy) {
                this.isWhich = "b_CompoB";
                return;
            } else {
                this.isWhich = "b_CompoA";
                return;
            }
        }
    },
    computed: {
        twitter_Link() {
            return "/twitter/" + this.productdata.name + "/" + this.image;
        },
        changeClassBtn() {
            return {
                btn: true,
                "btn--transition": true,
                "l_detail--main--info--btn": true,
                "btn--blue": !this.isBuy,
                "btn--red": this.isBuy
            };
        },
        toggleText() {
            if (this.isBuy) {
                return "購入キャンセル";
            } else {
                return "購入する";
            }
        }
    },
    beforeMount() {
        console.log("mounted");
        this.iniSet();
    },
    components: {
        b_CompoA,
        b_CompoB
    }
};
</script>
