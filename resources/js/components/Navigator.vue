<template>
  <div class="navigator-outter" :class="{ fixed: fixed }">
    <nav class="navigator">
      <!-- 顶部导航栏：侧边弹出按钮、交大校徽、e瞳logo -->
      <div class="navigator-inner">
        <div class="navigator-trigger">
          <mu-button icon slot="left" @click="$emit('open')">
            <mu-icon value="menu"></mu-icon>
          </mu-button>
        </div>
        <div class="navigator-logos">
          <div class="navigator-logo-container">
            <img
              class="navigator-logo"
              src="../../img/logo_xjtu.png"
              alt="logo_xjtu"
            />
          </div>
          <div class="navigator-logo-container">
            <img
              class="navigator-logo"
              src="../../img/logo_eeyes.png"
              alt="logo_eeyes"
            />
          </div>
        </div>
        <div class="navigator-flex-grow"></div>
        <ul class="navigator-actions">
          <li>
            <a href="#arrangement">赛事安排</a>
          </li>
          <li>
            <a href="#news">运动会新闻</a>
          </li>
          <li>
            <a href="#ranking">金牌排名</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  name: "Navigator",
  data() {
    return {
      fixed: false,
    };
  },
  mounted() {
    window.addEventListener("scroll", this.onScroll, { passive: true });
  },
  destroyed() {
    window.removeEventListener("scroll", this.onScroll);
  },
  methods: {
    getBoundaryOffset() {
      if (window.document.body.clientWidth < 480) {
        return 280;
      } else if (window.document.body.clientWidth < 640) {
        return 320;
      } else {
        return 440;
      }
    },
    onScroll() {
      const offset = document.documentElement.scrollTop;
      if (offset > this.getBoundaryOffset()) {
        this.fixed = true;
      } else {
        this.fixed = false;
      }
    },
  },
};
</script>

<style>
@keyframes myanime {
  0% {
    background-color: white;
    font-size: 1.3em;
  }
  100% {
    background-color: #438be9;
    font-size: 1.5em;
  }
}

.navigator-actions li:hover {
  animation: myanime 0.7s forwards;
}
.navigator {
  position: relative;
  z-index: 100;
  display: flex;
  justify-content: center;
  background: #fff;
  padding: 0 10px;
  box-shadow: 0 2px 6px #aaa;
  height: 80px;
}
.navigator-trigger,
.navigator-logos {
  padding: 20px 0;
  display: flex;
  align-items: center;
}
.navigator-inner {
  margin: 0 auto;
  width: 100%;
  max-width: 940px;
  display: flex;
}
.navigator-logos {
  flex: 1 1 auto;
  display: flex;
  align-items: center;
  max-width: 400px;
}
.navigator-logo-container {
  padding: 0 5px;
  width: 50%;
}
.navigator-logo {
  margin: 0 auto;
  display: block;
  max-width: 100%;
  height: auto;
}
.navigator-flex-grow {
  flex: 1 1 auto;
  align-self: stretch;
}
.navigator-actions {
  flex: 1 1 auto;
  display: none;
  color: #000;
  font-weight: bold;
  max-width: 320px;
}
.navigator-actions li {
  flex: 1 1 auto;
  display: flex;
  justify-content: center;
  align-items: center;
}
.navigator-actions li a {
  color: #000;
  font-size: 1.3em;
}
.navigator-outter {
  height: 80px;
}
.navigator-outter.fixed .navigator {
  position: fixed;
  top: 0;
  width: 100%;
  animation: slide-in 0.4s;
}
@media screen and (min-width: 640px) {
  .navigator-trigger {
    display: none;
  }
  .navigator-actions {
    display: flex;
  }
}
@keyframes slide-in {
  from {
    transform: translateY(-80px);
  }
  to {
    transform: none;
  }
}
</style>
