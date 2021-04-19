import Vue from 'vue'
import Vuex from 'vuex'
import { fetchNews } from './api/data'
import { fetchTeams } from './api/data'
import { fetchGames } from './api/data'
import { fetchPhotos } from './api/data'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    initOver: false,
    news: {
      data: []
    },
    photos: {
      data: []
    },
    teams: {
      teams_ranked_golden: {
        data: []
      },
      teams_ranked_medal: {
        data: []
      }
    },
    games: {
      games_23am_track: {
        data: []
      },
      games_23am_field: {
        data: []
      },
      games_23pm_track: {
        data: []
      },
      games_23pm_field: {
        data: []
      },
      games_24am_track: {
        data: []
      },
      games_24am_field: {
        data: []
      },
      games_24pm_track: {
        data: []
      },
      games_24pm_field: {
        data: []
      },
    }
  },
  getters: {
    teamsRankedGolden: state => state.teams.teams_ranked_golden.data,
    teamsRankedMedal: state => state.teams.teams_ranked_medal.data,
    news: state => state.news.data,
    photos: state => state.photos.data,
    games_23am_track: state => state.games.games_23am_track.data,
    games_23am_field: state => state.games.games_23am_field.data,
    games_23pm_track: state => state.games.games_23pm_track.data,
    games_23pm_field: state => state.games.games_23pm_field.data,
    games_24am_track: state => state.games.games_24am_track.data,
    games_24am_field: state => state.games.games_24am_field.data,
    games_24pm_track: state => state.games.games_24pm_track.data,
    games_24pm_field: state => state.games.games_24pm_field.data,
  },
  mutations: {
    setInitOver(state, flag = true) {
      state.initOver = flag
    },

    setNews(state, payload) {
      state.news = payload
    },

    setTeams(state, teams) {
      state.teams = teams
    },

    setGames(state, games) {
      state.games = games
    },
    setPhotos(state, photos) {
      state.photos = photos
    }
  },
  actions: {
    async fetchData({ commit }) {
      try {
        commit('setNews', await fetchNews())
        commit('setTeams', await fetchTeams())
        commit('setGames', await fetchGames())
        commit('setPhotos', await fetchPhotos())
        commit('setInitOver')
      } catch (error) {
        console.error(error)
        Vue.prototype.$toast.message.error(error.message)
      }
    }
  }
})
