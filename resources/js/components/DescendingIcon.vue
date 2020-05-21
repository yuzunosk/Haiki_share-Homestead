<template>
    <div class="c_new__Arrival--unit">
        <span
            class="c_new__Arrival--unit--text u_display--Jstart--Astart u_text--align"
            >{{ data.name }}</span
        >
        <img
            class="c_new__Arrival--unit--img u_display--center"
            :src="picData"
            style="object-fit:contain;margin:0 auto;"
        />
    </div>
</template>

<script>
export default {
    props: ["data", "key"],
    data() {
        return {
            picData: ""
        };
    },
    methods: {
        judmentPic() {
            if (this.data.pic != null) {
                this.picData = "/storage/" + this.data.pic;
            } else {
                this.picData = "/storage/img/no-image.png";
            }
            return;
        }
    },
    mounted() {
        console.log("mounted");
        return this.judmentPic();
    }
};
</script>
