<template>
  <div class="game-arrangement">
    <div class="game-arrangement-title-group">
      <a id="arrangement" name="arrangement" rel="external nofollow">&nbsp;</a>
      <h2 class="game-arrangement-title">赛事安排</h2>
      <span class="game-arrangement-title-tips">（点击时间查看项目安排）</span>
    </div>
    <hr class="game-arrangement-hr" />
    <div class="game-arrangement-list-container">
      <carousel
        class="index-carousel"
        :autoplay="true"
        :minSwipeDistance="40"
        :scrollPerPage="true"
        :speed="500"
        :perPage="1"
        :loop="true"
        :paginationEnabled="false"
      >
        <slide v-for="(item, index) in photos">
          <!-- {{item}} -->
          <img :src="item.path" alt="" />
          <div class="slide-info">
            赛事名称：{{ item.game_name }}
            {{
              item.game_id == "10"
                ? "径赛"
                : "田赛"
            }}
          </div>
          <div class="slide-info">
            {{ item.description }}
          </div>
        </slide>
      </carousel>
      <ul class="game-arrangement-list">
        <GameArrangementItem
          v-for="item in arrangementList"
          :key="item.key"
          :title="item.name"
          :content="item.content"
        />
      </ul>
      <carousel
        class="index-carousel second-slide"
        :autoplay="true"
        :minSwipeDistance="40"
        :scrollPerPage="true"
        :speed="500"
        :perPage="1"
        :loop="true"
        :paginationEnabled="false"
      >
        <slide v-for="(item, index) in photos">
          <img :src="photos[photos.length - 1 - index].path" alt="" />
          <div class="slide-info">
            赛事名称：{{ photos[photos.length - 1 - index].game_name }}
            {{
              photos[photos.length - 1 - index].game_id == "10"
                ? "径赛"
                : "田赛"
            }}
          </div>
          <div class="slide-info">
            {{ photos[photos.length - 1 - index].description }}
          </div>
        </slide>
      </carousel>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import GameArrangementItem from "./GameArrangementItem";
import { Carousel, Slide } from "vue-carousel";
export default {
  name: "GameArrangement",
  components: {
    GameArrangementItem,
    Carousel,
    Slide,
  },
  data() {
    return {};
  },
  computed: {
    ...mapGetters({
      games_23am_track: "games_23am_track",
      games_23am_field: "games_23am_field",
      games_23pm_track: "games_23pm_track",
      games_23pm_field: "games_23pm_field",
      games_24am_track: "games_24am_track",
      games_24am_field: "games_24am_field",
      games_24pm_track: "games_24pm_track",
      games_24pm_field: "games_24pm_field",
      photos: "photos",
    }),
    arrangementList() {
      return [
        {
          name: "23日上午径赛",
          key: "games_23am_track",
          content: this.games_23am_track,
        },
        {
          name: "23日上午田赛",
          key: "games_23am_field",
          content: this.games_23am_field,
        },
        {
          name: "23日下午径赛",
          key: "games_23pm_track",
          content: this.games_23pm_track,
        },
        {
          name: "23日下午田赛",
          key: "games_23pm_field",
          content: this.games_23pm_field,
        },
        {
          name: "24日上午径赛",
          key: "games_24am_track",
          content: this.games_24am_track,
        },
        {
          name: "24日上午田赛",
          key: "games_24am_field",
          content: this.games_24am_field,
        },
        {
          name: "24日下午径赛",
          key: "games_24pm_track",
          content: this.games_24pm_track,
        },
        {
          name: "24日下午田赛",
          key: "games_24pm_field",
          content: this.games_24pm_field,
        },
      ];
    },
  },
};
</script>

<style>
.slide-info {
  font-size: 7px;
  font-weight: 1000;
  color: rgb(125, 133, 132);
}
.game-arrangement-list-container {
  display: flex;
  justify-content: space-around;
}
.index-carousel {
  width: 25vw;
}
.game-arrangement-list-container img {
  width: 25vw;
  height: 33vw;
}
.game-arrangement {
  padding: 10px 0 60px;
  text-align: center;
}
.game-arrangement-title-group {
  margin: 12px 0;
}
.game-arrangement-title-tips {
  font-size: 0.8em;
  color: #aaa;
}
.game-arrangement-hr {
  max-width: 320px;
  margin: 0 auto;
  border: none;
  border-bottom: 2px solid #000;
}
@media screen and (min-width: 480px) {
  .game-arrangement-hr {
    max-width: 400px;
  }
}
@media screen and (min-width: 640px) {
  .game-arrangement-hr {
    max-width: 580px;
  }
}
@media screen and (min-width: 960px) {
  .game-arrangement-hr {
    max-width: 800px;
  }
}
@media screen and (max-width: 600px) {
  .second-slide {
    display: none;
  }
  .game-arrangement-list-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-around;
  }
}
@media screen and (min-width: 600px) {
  .second-slide {
    display: block;
  }
  .game-arrangement-list-container {
    display: flex;
    justify-content: space-around;
  }
}
</style>
