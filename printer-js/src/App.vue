<script setup>
import { RouterLink, RouterView } from 'vue-router'
import PrintContainer from './components/print/PrintContainer.vue'
import PreLoader from './components/print/PreLoader.vue'
</script>

<template>
  <div class="main">
    <div v-if="this.status === 'onload'" class="left-panel">
      <pre-loader @loadingEnd="loadingEnd"></pre-loader>
    </div>
    <div class="center-panel">
      <print-container v-if="this.status !== 'onload'" v-for="container in getContainers" :key="container.key" :container="container"></print-container>
    </div>
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
      stateCatalog: fixtures.get(),
      status: 'onload'
    }
  },
  computed: {
    getContainers: function () {
      return this.stateCatalog.children
    }
  },
  methods: {
    loadingEnd () {
      this.status = 'ready'
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

  .main{
    display: flex;
    flex-direction: row;
    width: 100%;
    height: 100%;
  }
  .left-panel{
    display: flex;
    flex-direction: column;
    width: 25%;
    height: 100vh;
    margin-bottom: 2rem;
    overflow: scroll;
  }
  .center-panel{
    display: flex;
    flex-direction: column;
    width: 75%;
    height: 100%;
  }
  .right-panel{
    display: flex;
    flex-direction: column;
    height: 100vh;
  }
</style>
