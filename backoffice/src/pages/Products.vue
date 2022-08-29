<template>
  <AuthLayout>
    <h1 class="title is-1">Products</h1>

    <ul class="product-list">
      <li
        v-for="product in products"
        :key="product.id"
      >
        <div class="card">
          <div class="card-image">
            <figure class="image is-4by3">
              <img :src="product.image">
            </figure>
          </div>
          <div class="card-content">
            <h3 class="title is-3">{{ product.name }}</h3>
            <h5
              :class="[
                'subtitle is-6',
                { 'has-text-success': product.isAvailable },
                { 'has-text-danger': !product.isAvailable },
              ]"
            ><i class="fa-solid fa-cubes-stacked mr-3"></i>{{ product.available }} in stock</h5>

            <h5 class="title is-5 mt-5 mb-2">Components</h5>
            <ul>
              <li
                v-for="component in product.components"
                :key="`component-${component.id}`"
              >
                - {{ component.amount_of }} pcs of {{ component.name }} <small :class="{ 'has-text-danger': !component.isAvailable }">(Stock: {{ component.stock }})</small>
              </li>
            </ul>

            <div class="mt-5">
              <div v-if="product.isAvailable">
                <ButtonWithConfirm class="is-success" label="Buy this item" @onSubmit="orderProduct(product.id)" />
              </div>
              <div class="is-flex is-align-items-center" v-else>
                <button class="button is-danger" disabled>Item is out of stock</button> <small @click="orderProduct(product.id)" class="ml-3" style="cursor: pointer">(Try anyway)</small>
              </div>
            </div>
          </div>
        </div>
      </li>
    </ul>

  </AuthLayout>
</template>

<script setup>
import AuthLayout from '@/components/layout/AuthLayout.vue'
import ButtonWithConfirm from '@/components/ButtonWithConfirm.vue'
import { ref, onMounted } from 'vue'
import useApi from '@/composables/useApi'
import { useToast } from "vue-toastification";
const toast = useToast();

const products = ref()

const fetchProducts = async () => {
  const productsResponse = await useApi.get('/products')
  products.value = productsResponse.data.data
}

fetchProducts();

const orderProduct = (productId) => {
  useApi.post(`/order/${productId}`)
    .then((response) => {
      fetchProducts();
      toast.success('success');
    })
    .catch((error) => toast.error(error.response.data.error))
}

</script>
