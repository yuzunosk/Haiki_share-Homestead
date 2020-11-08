<template>
    <div class="l_product__miniCard__container" @click="clickScreenTransition">
        <img
            class="l_product__miniCard--image u_img__fit--cover100"
            :src="picData"
            alt=" サンプル画像"/>
        <p
            class="l_product__miniCard--title u_display--center u_font__text--title">
            {{ data.name }}
        </p>
    </div>
</template>

<script>
export default {
    props: ["data"],
    data() {
        return {
            picData: "",
            info_link: "/store/product/index"
        };
    },
    methods: {
        judmentPic() {
            //picがnullか判定する
            if (this.data.image != null) {
                this.picData = this.data.image;
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
