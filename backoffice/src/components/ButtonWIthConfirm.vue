<template>
    <button class="button" @click="onClick">
        <span v-if="showConfirmation" class="confirmation-icon"><i class="fa fa-check"></i></span>
        <span :style="{ visibility: !showConfirmation ? 'visible' : 'hidden' }">{{ label }}</span>
    </button>
</template>

<script setup>
import { ref } from 'vue'
const emit = defineEmits(['onSubmit'])
const props = defineProps(['label']);

const showConfirmation = ref(false);

const onClick = () => {
    if (!showConfirmation.value) {
        showConfirmation.value = true;
    } else {
        emit('onSubmit');
        showConfirmation.value = false;
    }
}
</script>

<style scoped>
    .button {
        position: relative;
    }
    .confirmation-icon {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>
