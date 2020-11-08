<template>
    <div class="c_nav__card__warapper">
        <ul
            :class="navCardData.class"
            v-for="(navCardData, i) in navCardDatas"
            :key="i"
        >
            <img
                class="c_nav__card--image u_img__fit--cover100"
                :src="navCardData.image"
                alt="ナビゲーション画像"
            />
            <p class="c_nav__card--text">{{ navCardData.text }}</p>
        </ul>
    </div>
</template>

<script>
export default {
    props: ["data"],
    data() {
        return {
            picData: "",
            info_link: "/store/product/index",
            navCardDatas: [
                { image: "/storage/img/万歳背景透過.png",
                  text: "まずは登録",
                  class:"c_nav__card__containerA" 
                  },
                {
                    image: "/storage/img/食事.png",
                    text: "商品を探して",
                    class:"c_nav__card__containerB"
                },
                {
                    image: "/storage/img/受け取り透過.png",
                    text: "購入したら、店頭で受け取りましょう",
                    class:"c_nav__card__containerC"
                },
                {
                    image: "/storage/img/指示.png",
                    text: "Haiki_shareで　地球にやさしい食事",
                    class:"c_nav__card__containerD"
                }
            ]
        };
    }
};
</script>
