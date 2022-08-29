import axios from 'axios'
import { forgetAuthentication } from './useAuth'

const apiClient = axios.create({
    baseURL: import.meta.env.VITE_API_URL,
    headers: { Authorization: `Bearer ${window.localStorage.getItem('api-bearer')}` }
});

//Handle errors and non authenticated requests
apiClient.interceptors.response.use(response => response, error => {
    if (error.response) {
        console.log(error.response, error.error);
        // Request made and server responded
        if (error.response.status === 401 || error.response.status === 419) {
            forgetAuthentication()
            localStorage.removeItem('api-bearer')
            window.location.href = 'login'
        }

        return Promise.reject(error)
    } else if (error.request) {
        // The request was made but no response was received
    } else {
    }
    return error
})

export default apiClient
