<template>
  <div class="page">
    <product v-for="n in items" :key="n.reference" :item="n" ></product>
  </div>
</template>

<script>
import Product from '../templates/Product.vue'
export default {
  name: 'Page',
  components: {Product},
  props: {
    items: []
  }
}
</script>

<style scoped>
  .page {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: space-around;
    width: 210mm;
    height: 297mm;
    background-color: white;
    margin: 1rem auto;
    color: black!important;

  }
</style>