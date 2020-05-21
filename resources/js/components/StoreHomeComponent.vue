<template>
    <div>
        <StoreMypage
            :productdatas="productdatas"
            :storedata="storedata"
        ></StoreMypage>
    </div>
</template>

<script>
import StoreMypage from "./StoreMypage.vue";
export default {
    props: ["productdatas", "storedata"],
    data() {
        return {};
    },
    components: {
        StoreMypage
    }
};
</script>
