<template>
    <div class="l_home__menu2">
        <h1 class="l_home__menu--title u_display--center u_font__text--title">
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
            <a class="btn--green--top u_display--center" :href="list_Link">商品一覧</a>
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
        list_Link() {
            return "/user/index";
        },
        profile_Link() {
            return "/user/profile/edit/" + this.authdata.id;
        }
    }
};
</script>
