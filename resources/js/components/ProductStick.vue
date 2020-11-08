<template>
    <div class="l_product__stick-unit mb-30">
        <img
            class="l_product--pic u_img__fit--cover100 u_size__icon--radius"
            :src="picData"
            alt="商品画像"
        />
        <p class="l_product--name u_display--Jstart ml-30">{{ data.name }}</p>
        <div class="l_product--icon">
            <a :href="isUrl">
                <img
                    class="l_product--icon u_img__fit--cover100 u_size__icon--radius"
                    src="/storage/img/データアイコン.png"
                    alt="詳細ボタン"
                />
            </a>
        </div>
    </div>
</template>

<script>
export default {
    props: ["data", "authid"],
    data() {
        return {
            picData: "/storage/img/no-image.png",
            isUrl: "/store/product/show"
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
        },
        judgUser() {
            //ログインIDがユーザーかストアーか判定する
            if (this.authid < 10000 ) {
                return (this.isUrl = "/store/product/show/" + this.data.id);
            } else {
                return (this.isUrl = "/user/product/usershow/" + this.data.id);
            }
        }
    },
    mounted() {
        console.log("mounted");
        this.judmentPic();
        this.judgUser();
        return;
    }
};
</script>
