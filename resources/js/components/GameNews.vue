<template>
  <div class="game-news">
    <a id="news" name="news" rel="external nofollow">&nbsp;</a>
    <h2 class="game-news-title">运动会新闻</h2>
    <hr class="game-news-hr" />
    <table class="game-news-table">
      <tr v-for="(item, i) in news" :key="i">
        <td class="game-news-number">News.{{ i + 1 }}</td>
        <td class="game-news-news-title">
          <a :href="`/news/${item.id}`">{{ item.title }}</a>
        </td>
      </tr>
    </table>
  </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
  name: "GameNews",
  computed: {
    ...mapGetters({
      news: "news",
    }),
  },
};
</script>

<style>
.game-news {
  background-color: #b80909;
  padding: 60px 0;
  text-align: center;
}
.game-news-title {
  font-size: 1.7em;
  margin: 6px 0;
  color: white;
}
.game-news-hr {
  margin: 0 auto;
  max-width: 320px;
  border: none;
  border-bottom: 2px solid #fff;
}
.game-news-table {
  padding: 10px 0;
  margin: 0 auto;
  max-width: 300px;
  color: white;
  text-align: left;
}
.game-news-number {
  width: 60px;
  vertical-align: top;
}
.game-news-news-title a {
  color: white;
}
.game-news-news-title a:hover {
  text-decoration: underline;
}
@media screen and (min-width: 480px) {
  .game-news-hr {
    max-width: 400px;
  }
  .game-news-table {
    max-width: 380px;
  }
}
@media screen and (min-width: 640px) {
  .game-news-hr {
    max-width: 580px;
  }
  .game-news-table {
    max-width: 560px;
  }
}
@media screen and (min-width: 960px) {
  .game-news-hr {
    max-width: 800px;
  }
  .game-news-table {
    max-width: 780px;
  }
}
</style>
