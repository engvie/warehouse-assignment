<template>
  <AuthLayout>
    <h1 class="title is-1">Import product inventory</h1>

    <UploadFile url="/import/inventory" />
  </AuthLayout>
</template>

<script setup>
import AuthLayout from "@/components/layout/AuthLayout.vue"
import UploadFile from "@/components/UploadFIle.vue"
</script>
