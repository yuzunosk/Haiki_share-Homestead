<template>
  <div>
    <UserMypage :buydatas="buydatas" :gooddatas="gooddatas" :userdata="userdata"></UserMypage>
  </div>
</template>

<script>
import UserMypage from "./UserMypage.vue";
export default {
  props: ["buydatas", "gooddatas", "userdata"],
  data() {
    return {};
  },
  components: {
    UserMypage
  }
};
</script>
