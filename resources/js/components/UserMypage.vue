<template>
    <div class="container">
        <div>
            <h1>マイページ</h1>
            データを流し込む
            <div>
                <p>
                    <a href>出品する</a>
                </p>
                <p>
                    <a href>商品一覧</a>
                </p>
                <p>
                    <a href>プロフィール編集</a>
                </p>
            </div>
        </div>
        <div>
            マイページコンポーネントB
            <div>
                最近いいねした商品/
                <span>全ての商品をみる</span>
                <DescendingIcon
                    v-for="(buydata, i) in buydatas"
                    :key="i"
                    :data="buydata"
                ></DescendingIcon>
            </div>
        </div>
        <div>
            マイページコンポーネントB
            <div>
                最近購入した商品/
                <span>全ての商品をみる</span>
                <!-- データを入れ替えれば表示が変わる -->
                <DescendingIcon></DescendingIcon>
            </div>
        </div>
    </div>
</template>

<script>
import DescendingIcon from "./DescendingIcon.vue";
export default {
    props: ["buydatas"],
    data() {
        return {
            data: ""
        };
    },
    components: {
        DescendingIcon
    }
};
</script>
