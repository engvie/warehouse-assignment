import useApi from './useApi'
import profile from '../store/profile'

export const isAuthenticated = () => {
    return window.localStorage.getItem('api-bearer') != null
}

export const requestLogin = (credentials) => {
    return new Promise((resolve, reject) => {
        useApi.post('/login', credentials)
            .then((response) => {
                localStorage.setItem('api-bearer', response.data.access_token)
                resolve();
            })
            .catch(error => reject(error))
    })
}

export const forgetAuthentication = async () => {
    profile.clearProfile()
    localStorage.removeItem('api-bearer');
}

export const requestLogout = async () => {
    return new Promise((resolve, reject) => {
        useApi.post('/logout')
            .then((response) => {
                forgetAuthentication();
                resolve()
            })
            .catch((error) => reject(error))
    })
}
