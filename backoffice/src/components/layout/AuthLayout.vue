<template>
  <div id="app-layout">
    <aside id="app-sidebar">
      <div class="logo-bar">
        <router-link to="/">
          <img class="login-logo" src="/logo.svg">
        </router-link>
      </div>

      <div class="sidebar-menu">
        <p class="menu-label">General</p>
        <ul class="menu-list">
          <li>
            <router-link to="/">Dashboard</router-link>
          </li>
          <li>
            <router-link to="/profile">Profile</router-link>
          </li>
        </ul>

        <p class="menu-label">Products</p>
        <ul class="menu-list">
          <li>
            <router-link to="/products">Products</router-link>
          </li>
        </ul>

        <p class="menu-label">Import</p>
        <ul class="menu-list">
          <li>
            <router-link to="/import-products">Import products</router-link>
          </li>
          <li>
            <router-link to="/import-product-parts">Import product inventory</router-link>
          </li>
        </ul>
      </div>

      <div class="bottom">
        <LogoutButton class="is-fullwidth" />
      </div>

    </aside>
    <main id="app-content">
      <slot></slot>
    </main>
  </div>

</template>

<script setup>
import LogoutButton from "@/components/auth/LogoutButton.vue"
import { useHead } from "@vueuse/head"

useHead({
  link: [
    {
      rel: 'stylesheet',
      type: 'text/css',
      crossorigin: 'anonymous',
      referrerpolicy: 'no-referrer',
      href: 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css',
      integrity: 'sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==',
    },
  ],
})

</script>
