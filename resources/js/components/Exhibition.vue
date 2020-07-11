<template>
    <div class="l_home__container u_font__default">
        <StoreHomeMenu :storedata="datas"></StoreHomeMenu>
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
import StoreHomeMenu from "./StoreHomeMenu.vue";

export default {
    props: ["datas", "authdata", "pageid"],
    data() {
        return {
            title: ""
        };
    },
    methods: {},
    computed: {
        register_Link() {
            return "/store/product/new";
        },
        list_Link() {
            return "/store/product/index";
        },
        profile_Link() {
            return "/store/profile/edit/" + this.authdata.id;
        }
    },
    mounted() {
        console.log("mounted");
        console.log(this.pageid);
        if (this.pageid == 0) {
            this.title = "出品した商品一覧";
        } else {
            this.title = "売却した商品一覧";
        }
    },
    components: {
        DescendingIcon,
        ProductStick,
        StoreHomeMenu
    }
};
</script>
