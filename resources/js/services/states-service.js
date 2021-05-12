import api from './api'

export default {
  search(params) {
    return api().get('/api/states', { params })
  },
}
