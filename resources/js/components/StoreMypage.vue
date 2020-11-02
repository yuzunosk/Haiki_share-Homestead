<template>
    <div class="l_home__container u_font__default">
        <StoreHomeMenu :authdata="storedata"></StoreHomeMenu>
        <div class="l_home__main">
            <div class="l_home__main--setA c_new__Arrival__list">
                <span class="c_new__Arrival--title u_display--Jstart"
                    >最近出品した商品</span
                >
                <a
                    v-if="judgProductDone"
                    :href="exhibition_link"
                    class="c_new__Arrival--info u_display--end"
                    >全ての商品をみる</a
                >
                <div v-if="judgProductDone" class="u_display--Jstart--wrap c_new__Arrival--group">
                    <DescendingIcon
                        v-for="(productdata, i) in productdatas"
                        :key="i"
                        :data="productdata"
                    ></DescendingIcon>
                </div>
                <div v-else  class="c_new__Arrival--group" style="text-align:center;">
                    <p>まだデータがありません</p>
                </div>
            </div>
            <div class="l_home__main--setB c_new__Arrival__list">
                <span class="c_new__Arrival--title u_display--Jstart"
                    >最近売れた商品</span
                >
                <a v-if="judgBuyDone" :href="sale_link" class="c_new__Arrival--info u_display--end"
                    >全ての商品をみる</a
                >
                <div v-if="judgBuyDone" class="u_display--Jstart--wrap c_new__Arrival--group">
                    <DescendingIcon
                        v-for="(buydata, i) in buydatas"
                        :key="i"
                        :data="buydata"
                    ></DescendingIcon>
                </div>
                <div v-else  class="c_new__Arrival--group" style="text-align:center;">
                    <p>まだデータがありません</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import DescendingIcon from "./DescendingIcon.vue";
import StoreHomeMenu from "./StoreHomeMenu.vue";
export default {
    props: ["productdatas", "storedata", "buydatas"],
    data() {
        return {
            data: "",
        };
    },
    computed: {
        register_Link() {
            return "/store/product/new";
        },
        list_Link() {
            return "/store/product/index";
        },
        profile_Link() {
            return "/store/profile/edit/" + this.storedata.id;
        },
        exhibition_link() {
            return "/store/product/exhibition";
        },
        sale_link() {
            return "/store/product/sale";
        },
        judgBuyDone() {
            console.log(this.buydatas[0]);
            //販売データの有無
            if(this.buydatas[0]  === undefined) {
                return false;
            }else {
                return true;
            }
            console.log("judgBuyDone終了");
        },
        judgProductDone() {
        console.log(this.productdatas[0]);
        //商品データの有無
        if(this.productdatas[0] === undefined) {
          return false;
        }else {
          return true;
        }
        console.log("judgProductDone終了");
        }

    },
    methods: {


    },
    components: {
        DescendingIcon,
        StoreHomeMenu
    },
    mounted() {
        console.log("mounted");
        this.judgBuyDone();
        this.judgProductDone();

    }
};
</script>
