<template>
    <div class="l_home__container u_font__default">
        <UserHomeMenu :authdata="authdata"></UserHomeMenu>
        <div class="l_home__main__stick--unit">
            <h1 class="my-50">{{ title }}</h1>
            <ProductStick
                v-for="(data, i) in datas"
                :key="i"
                :data="data"
            ></ProductStick>
        </div>
    </div>
</template>

<script>
import DescendingIcon from "./DescendingIcon.vue";
import ProductStick from "./ProductStick.vue";
import UserHomeMenu from "./UserHomeMenu.vue";

export default {
    props: ["datas", "authdata", "pageid"],
    data() {
        return {
            title: ""
        };
    },
    mounted() {
        console.log("mounted");
        console.log(this.pageid);
        if (this.pageid == 0) {
            this.title = "出品した商品一覧";
        } else if (this.pageid == 0) {
            this.title = "売却した商品一覧";
        } else {
            this.title = "購入した商品一覧";
        }
    },
    components: {
        DescendingIcon,
        ProductStick,
        UserHomeMenu
    }
};
</script>
