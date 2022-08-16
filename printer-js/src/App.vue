<script setup>
import { RouterLink, RouterView } from 'vue-router'
import PrintContainer from './components/print/PrintContainer.vue'
</script>

<template>
  <div>
    <print-container v-for="container in getContainers" :key="container.key" :container="container"></print-container>
  </div>
</template>

<script>

import {useCatalogStore} from "./stores/catalogStore";
import {storeToRefs} from "pinia";
import fixtures from "./Fixtures";

export default {
  setup () {
    const store = useCatalogStore()
    const { catalog } = storeToRefs(store)

    return {
      store,
      catalog
    }
  },
  name: 'app',
  data () {
    return {
      stateCatalog: fixtures.get()
    }
  },
  computed: {
    getContainers: function () {
      return this.stateCatalog.children
    }
  }
}

</script>

<style scoped>
  * {
    box-sizing: border-box;
  }

  body{
    background-color: lightgray;
    width: 100%;
    height: 100%;
  }
</style>
