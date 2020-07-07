<template>
    <div class="l_home__container u_font__default">
        <div class="l_home__menu">
            <h1
                class="l_home__menu--title u_display--center u_font__text--title"
            >
                マイページ
            </h1>
            <a :href="list_Link" class="l_home__menu--icon-left">
                <!-- 商品一覧アイコン -->
                <i class="fas fa-th-list fa-3x"></i>
            </a>
            <a :href="profile_Link" class="l_home__menu--icon-right">
                <!-- プロフィール編集アイコン -->
                <i class="far fa-address-card fa-3x"></i>
            </a>
            <p class="l_home__menu--link-left u_display--center">
                <a :href="list_Link">商品一覧</a>
            </p>
            <p class="l_home__menu--link-right u_display--center">
                <a :href="profile_Link">プロフィール編集</a>
            </p>
        </div>
        <div class="l_home__main">
            <div class="l_home__main--setA c_new__Arrival__list">
                <span class="c_new__Arrival--title u_display--Jstart"
                    >最近購入した商品</span
                >
                <a :href="buy_Link" class="c_new__Arrival--info u_display--end"
                    >全ての商品をみる</a
                >
                <div class="u_display--Jstart--wrap c_new__Arrival--group">
                    <DescendingIcon
                        v-for="(buydata, i) in buydatas"
                        :key="i"
                        :data="buydata"
                    ></DescendingIcon>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import DescendingIcon from "./DescendingIcon.vue";
export default {
    props: ["buydatas", "userdata"],
    data() {
        return {
            data: ""
        };
    },
    computed: {
        register_Link() {
            return "/user/product/new";
        },
        list_Link() {
            return "/user/index";
        },
        profile_Link() {
            return "/user/profile/edit/" + this.userdata.id;
        },
        buy_Link() {
            return "/user/product/purchased";
        }
    },
    components: {
        DescendingIcon
    }
};
</script>
