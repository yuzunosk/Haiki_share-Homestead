<template>
    <div>
        <StoreMypage :productdatas="productdatas"></StoreMypage>
    </div>
</template>

<script>
import StoreMypage from "./StoreMypage.vue";
export default {
    props: ["productdatas"],
    data() {
        return {};
    },
    components: {
        StoreMypage
    }
};
</script>
