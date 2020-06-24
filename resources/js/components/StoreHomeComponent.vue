<template>
  <div>
    <StoreMypage :productdatas="productdatas" :storedata="storedata" :buydatas="buydatas"></StoreMypage>
  </div>
</template>

<script>
import StoreMypage from "./StoreMypage.vue";
export default {
  props: ["productdatas", "storedata", "buydatas"],
  data() {
    return {};
  },
  components: {
    StoreMypage
  }
};
</script>
