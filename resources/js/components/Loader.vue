<template>
    <div class="load_img" v-show="loading">
        <img
            :src="'/images/loader.gif'"
            class="img-responsive"
            alt="Please wait"
        />
    </div>
</template>

<script>

export default {
    props: ['loading'],
};
</script>

<style scoped>
.load_img {
    width: 100%;
    height: 100vh;
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 99999;
    text-align: center;
    background: rgba(62, 60, 60, 0.1);
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>
