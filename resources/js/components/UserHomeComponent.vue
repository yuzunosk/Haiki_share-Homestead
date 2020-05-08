<template>
    <div>
        <UserMypage :buydatas="buydatas"></UserMypage>
    </div>
</template>

<script>
import UserMypage from "./UserMypage.vue";
export default {
    props: ["buydatas"],
    data() {
        return {};
    },
    components: {
        UserMypage
    }
};
</script>
