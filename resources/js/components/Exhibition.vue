<template>
    <div class="l_home__container u_font__default">
        <div class="l_home__menu">
            <h1
                class="l_home__menu--title u_display--center u_font__text--title"
            >
                マイページ
            </h1>
            <p class="l_home__menu--link-left u_display--center">
                <a :href="register_Link">出品する</a>
            </p>
            <p class="l_home__menu--link-center u_display--center">
                <a :href="list_Link">商品一覧</a>
            </p>
            <p class="l_home__menu--link-right u_display--center">
                <a :href="profile_Link">プロフィール編集</a>
            </p>
        </div>
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
        ProductStick
    }
};
</script>
