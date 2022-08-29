<template>
  <GuestLayout>
    <form class="columns is-vcentered" @submit.prevent="submitLoginForm">
      <div class="login column is-4 ">
        <section class="section">
          <div class="has-text-centered">
              <img class="login-logo" src="/logo.svg">
          </div>

          <div class="field">
            <label class="label">Username</label>
            <div class="control has-icons-right">
              <input class="input" type="text" required v-model="credentials.email">
              <span class="icon is-small is-right">
                <i class="fa fa-user"></i>
              </span>
            </div>
          </div>

          <div class="field">
            <label class="label">Password</label>
            <div class="control has-icons-right">
              <input class="input" type="password" required v-model="credentials.password">
              <span class="icon is-small is-right">
                <i class="fa fa-key"></i>
              </span>
            </div>
          </div>
          <div class="has-text-centered">
            <div class="is-flex is-align-items-center">
              <button type="submit" class="button is-primary is-outlined">Login</button>
              <a class="ml-5" @click="fillFormWithCredentials">(Fill)</a>
            </div>
          </div>
        </section>
      </div>
      <div class="login-bg column is-8">
      </div>
    </form>
  </GuestLayout>
</template>

<script setup>
import GuestLayout from '@/components/layout/GuestLayout.vue'
import { requestLogin } from '@/composables/useAuth.js'
import { ref } from 'vue'
import { useRouter } from 'vue-router'
const router = useRouter()

const credentials = ref({
  email: '',
  password: ''
})

//Fill forms to easier follow the demo of the project.
const fillFormWithCredentials = () => {
  credentials.value.email = 'albert.engvie@gmail.com'
  credentials.value.password = '123456789'
}

const submitLoginForm = async () => {
  requestLogin(credentials.value)
    .then((response) => {
      router.push('/')
    })
}
</script>

<style scoped lang="scss">
  .login-bg {
    height: 100vh;
    background-color: #00d1b2;
    box-shadow: inset 24px 4px 64px -24px rgba(71,71,71,1);
    padding: 0px;
      @media (max-width: 769px) {
        .interactive-bg{
          display: none
        }
      }
  }

  .input {
    border-radius: 50px;
  }

  .button {
    margin-top: 20px;
    margin-bottom: 20px;
    min-width: 150px;
  }

  .login-logo {
    margin: 0 auto;
    margin-bottom: 50px;
    max-height: 100px;

  }

  .columns{
    margin: 0px;
  }

</style>
