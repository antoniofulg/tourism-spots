import axios from 'axios'

export default () => {
  const axiosInstance = axios.create()
  return axiosInstance
}
