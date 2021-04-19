<template>
  <div class="banner">
    <h1 class="banner-title">西安交大第五十八届校运会</h1>
    <p class="banner-subtitle">
      不忘昔日千里西行路，一步一脚印，场上自强不息，场下奋发图强，再度西进创新港
    </p>
    <mu-flex class="flex-wrapper" justify-content="center">
      <mu-button color="#3b55e6" class="banner-live-button" @click="enterLive"
        >进入直播</mu-button
      >
    </mu-flex>
  </div>
</template>

<script>
export default {
  name: "Banner",
  methods: {
    enterLive() {
      window.open("https://live.bilibili.com/5658150", "_blank");
    },
  },
};
</script>

<style>
.banner {
  height: 200px;
  padding: 20px 10px 0;
  background: url("../../img/banner.jpg");
  background-size: auto 200px;
  background-position: center center;
  color: rgb(22, 1, 1);
}
.banner-title{
  color: rgb(3, 2, 17);
  font-size: 36px;
  font-weight: 1000;
}
.banner h1,
.banner p {
  margin: 0 auto;
  text-align: center;
  font-family: "Microsoft Yahei";
}
.banner-live-button {
  margin: 20px auto;
  border-radius: 18px;
}
@media screen and (min-width: 480px) {
  .banner {
    height: 240px;
    background-size: auto 240px;
    padding-top: 40px;
  }
}
@media screen and (min-width: 640px) {
  .banner {
    height: 360px;
    background-size: auto 360px;
    padding-top: 60px;
  }
}
</style>
