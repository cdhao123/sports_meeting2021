<template>
  <div class="home-page">
    <MainHeader />
    <section class="home-page-main-section">
      <GoldTops />
      <flash-message-list ref="flashMessageList" />
      <GameArrangement />
      <GameNews />
      <GameRanking />
    </section>
  </div>
</template>

<script>
import { mapActions } from "vuex";
import FlashMessageList from "../components/FlashMessageList";
import MainHeader from "../components/MainHeader";
import GoldTops from "../components/GoldTops";
import GameArrangement from "../components/GameArrangement";
import GameNews from "../components/GameNews";
import GameRanking from "../components/GameRanking";

export default {
  name: "PageHome",
  components: {
    FlashMessageList,
    MainHeader,
    GoldTops,
    GameArrangement,
    GameNews,
    GameRanking,
  },
  mounted() {
    this.fetchData();
  },
  methods: {
    ...mapActions({
      fetchData: "fetchData",
    }),
  },
};
</script>

<style>
.home-page-space {
  height: 300px;
  width: 100%;
}
.home-page-main-section {
  padding-top: 20px;
  background-color: #fff;
}
</style>
