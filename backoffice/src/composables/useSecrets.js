import useApi from "./useApi";
import {ref} from "vue";

export default function useSecrets() {
    const secrets = ref([]);

    const getSecrets = async () => {
        useApi.get('/api/secrets')
            .then(response => {
                if (response.data) secrets.value = response.data.data
            })
    }

    return {
        secrets,
        getSecrets
    }
}
