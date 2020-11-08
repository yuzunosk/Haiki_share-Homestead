<template>
    <div class="l_home__menu">
        <h1 class="l_home__menu--title u_display--center u_font__text--title">
            マイページ
        </h1>
        <a :href="list_Link" class="l_home__menu--icon-left">
            <!-- 出品した商品一覧アイコン -->
            <i class="fas fa-th-list fa-3x"></i>
        </a>

        <a :href="register_Link" class="l_home__menu--icon-center">
            <!-- 出品するアイコン -->
            <i class="fas fa-gifts fa-3x"></i>
        </a>

        <a :href="profile_Link" class="l_home__menu--icon-right">
            <!-- プロフィール編集アイコン -->
            <i class="far fa-address-card fa-3x"></i>
        </a>

        <p class="l_home__menu--link-left u_display--center">
            <a class="btn--green--top u_display--center" :href="register_Link">出品する</a>
        </p>
        <p class="l_home__menu--link-center u_display--center">
            <a class="btn--green--top u_display--center" :href="list_Link">出品した商品一覧</a>
        </p>
        <p class="l_home__menu--link-right u_display--center">
            <a class="btn--green--top u_display--center" :href="profile_Link">プロフィール編集</a>
        </p>
    </div>
</template>

<script>
export default {
    props: ["authdata"],
    deta() {
        return {};
    },
    computed: {
        register_Link() {
            return "/store/product/new";
        },
        list_Link() {
            return "/store/product/index";
        },
        profile_Link() {
            return "/store/profile/edit/" + this.authdata.id;
        },
        exhibition_link() {
            return "/store/product/exhibition";
        },
        sale_link() {
            return "/store/product/sale";
        }
    }
};
</script>
