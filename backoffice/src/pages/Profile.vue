<template>
  <AuthLayout>
    <div v-if="user">
      <h1 class="title is-1">{{ user.name }}</h1>
      <h4 class="title is-4">{{ user.email }}</h4>
    </div>
  </AuthLayout>
</template>

<script setup>
import AuthLayout from '@/components/layout/AuthLayout.vue'
import useApi from "@/composables/useApi"
import { ref, onMounted } from "vue"


const user = ref()
onMounted(async () => {
  const userResponse = await useApi.get('/user')
  user.value = userResponse.data;
});

</script>
