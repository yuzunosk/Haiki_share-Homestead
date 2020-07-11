<template>
    <div class="c_nav__card__warapper">
        <ul
            class="c_nav__card__container"
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
                { image: "/storage/img/万歳white.png", text: "1.まずは登録" },
                {
                    image: "/storage/img/食事white.png",
                    text: "2.商品を探して"
                },
                {
                    image: "/storage/img/受け取りwhite.png",
                    text: "3.購入したら、店頭で受け取りましょう"
                },
                {
                    image: "/storage/img/指示white.png",
                    text: "4.Haiki_shareで　地球にやさしい食事"
                }
            ]
        };
    }
};
</script>
