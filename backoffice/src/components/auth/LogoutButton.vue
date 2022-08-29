<template>
  <a @click="logout" class="button is-danger">Logout</a>
</template>

<script setup>
import { requestLogout } from '@/composables/useAuth'
import { useRouter } from 'vue-router'
const router = useRouter();

const logout = async () => {
  requestLogout()
    .then((respone) => {
      router.push('login')
    })
}
</script>
