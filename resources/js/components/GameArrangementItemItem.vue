<template>
  <li class="game-arrangement-item-item">
    <mu-divider></mu-divider>
    <div
      class="game-arrangement-item-item-title-container"
      @click="$emit('update:visible', !visible)"
    >
      <mu-ripple :opacity="0.4">
        <div class="game-arrangement-item-item-title">
          <ClockIcon
            class="game-arrangement-item-item-title-clock"
            :hour="getHour(item.begins_at)"
            :minute="getMinute(item.begins_at)"
          />
          <span
            class="game-arrangement-item-item-title-text"
          >{{ getTimeString(item.begins_at) }} - {{ item.name }}</span>
        </div>
      </mu-ripple>
    </div>
    <mu-expand-transition>
      <div class="game-arrangement-item-item-table-container" v-if="visible">
        <table class="game-arrangement-item-item-table">
          <tr class="game-arrangement-item-item-row">
            <td class="medal-cell">
              <img class="medal" src="../../img/golden.png">
            </td>
            <td>冠军</td>
            <td>{{ item.golden_team || '(暂无)' }}</td>
            <td>{{ item.golden_name }}</td>
          </tr>
          <tr class="game-arrangement-item-item-row">
            <td class="medal-cell">
              <img class="medal" src="../../img/silver.png">
            </td>
            <td>亚军</td>
            <td>{{ item.silver_team || '(暂无)' }}</td>
            <td>{{ item.silver_name }}</td>
          </tr>
          <tr class="game-arrangement-item-item-row">
            <td class="medal-cell">
              <img class="medal" src="../../img/bronze.png">
            </td>
            <td>季军</td>
            <td>{{ item.bronze_team || '(暂无)' }}</td>
            <td>{{ item.bronze_name }}</td>
          </tr>
          <tr class="game-arrangement-item-item-row">
            <td class="medal-cell">
              <img class="medal" src="../../img/golden.png">
            </td>
            <td>体特冠军</td>
            <td>{{ item.golden_s_team || '(暂无)' }}</td>
            <td>{{ item.golden_s_name }}</td>
          </tr>
          <tr class="game-arrangement-item-item-row">
            <td class="medal-cell">
              <img class="medal" src="../../img/silver.png">
            </td>
            <td>体特亚军</td>
            <td>{{ item.silver_s_team || '(暂无)' }}</td>
            <td>{{ item.silver_s_name }}</td>
          </tr>
          <tr class="game-arrangement-item-item-row">
            <td class="medal-cell">
              <img class="medal" src="../../img/bronze.png">
            </td>
            <td>体特季军</td>
            <td>{{ item.bronze_s_team || '(暂无)' }}</td>
            <td>{{ item.bronze_s_name }}</td>
          </tr>
        </table>
      </div>
    </mu-expand-transition>
  </li>
</template>

<script>
import ClockIcon from './ClockIcon'

// 补上数字前导零
function fixZero (num) {
  return num < 10 ? `0${num}` : `${num}`
}

// 获取时间字符串
function getTimeString (val) {
  const date = new Date(val)
  const h = fixZero(date.getHours())
  const m = fixZero(date.getMinutes())
  return `${h}:${m}`
}

export default {
  name: 'GameArrangementItemItem',
  components: {
    ClockIcon
  },
  props: {
    item: {
      type: Object,
      required: true
    },
    visible: {
      type: Boolean,
      required: true
    }
  },
  methods: {
    getTimeString: getTimeString,
    getHour (val) {
      const date = new Date(val)
      return date.getHours()
    },
    getMinute (val) {
      const date = new Date(val)
      return date.getMinutes()
    }
  }
}
</script>

<style>
.game-arrangement-item-item{
  margin: 0 auto;
}
.game-arrangement-item-item-title-container {
  position: relative;
  display: flex;
  justify-content: center;
  cursor: pointer;
}
.game-arrangement-item-item-title {
  display: flex;
  height: 30px;
  align-items: center;
  font-size: 1.15em;
}
.game-arrangement-item-item-title-clock {
  width: 12px;
  height: 12px;
}
.game-arrangement-item-item-title-text {
  margin-left: 9px;
}
.game-arrangement-item-item-table {
  margin: 0 auto;
}
.game-arrangement-item-item-row .medal-cell {
  display: flex;
  align-items: center;
}
.game-arrangement-item-item-row .medal {
  width: 12px;
  height: auto;
}
.game-arrangement-item-item-row td {
  padding: 0 6px;
  text-align: center;
}
@media screen and (min-width: 480px) {
  .game-arrangement-item-item-title {
    height: 36px;
  }
  .game-arrangement-item-item-title-clock {
    width: 14px;
    height: 14px;
  }
  .game-arrangement-item-item-title-text {
    font-size: 1.1em;
  }
  .game-arrangement-item-item-row {
    font-size: 1.1em;
  }
  .game-arrangement-item-item-row .medal {
    width: 16px;
  }
}
@media screen and (min-width: 640px) {
  .game-arrangement-item-item {
    width: 280px;
  }
}
</style>
