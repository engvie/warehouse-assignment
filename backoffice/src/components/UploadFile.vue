<template>
  <div>
    <h6 class="title is-6">(only .json)</h6>

    <DropZone
      ref="dropzone"
      :url="uploadUrl"
      :uploadOnDrop="false"
      :acceptedFiles="['json']"
      @errorAdd="onError"
      @addedFile="onFileChange"
      @removedFile="onFileChange"
      @uploaded="uploadedFinished"
    />

    <a class="button is-primary mt-3" @click="upload" v-if="hasSelectedFiles">Upload selected files</a>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useToast } from "vue-toastification";
const toast = useToast();

const props = defineProps(['url'])
const dropzone = ref(null);
let hasSelectedFiles = ref(false);

const onFileChange = () => {
  hasSelectedFiles.value = Object.keys(dropzone.value.all).length > 0
}

const uploadUrl = import.meta.env.VITE_API_URL + props.url;

const upload = () => {
  dropzone.value.processQueue();
}

const onError = (error) => {
  toast.error(error.error);
}

const uploadedFinished = () => {
  toast.success('The file was uploaded and processed');
}
</script>
