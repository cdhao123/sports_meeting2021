import axios from '../axios'

export function fetchNews() {
  return axios({
    url: '/api/news',
    method: 'get'
  })
}

export function fetchTeams() {
  return axios({
    url: '/api/teams',
    method: 'get'
  })
}

export function fetchGames() {
  return axios({
    url: '/api/games',
    method: 'get'
  })
}

export function fetchPhotos() {
  return axios({
    url: '/api/photos',
    method: 'get'
  })
}
