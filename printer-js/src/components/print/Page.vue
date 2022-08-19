<template>
  <div class="page" :style="containerStyle">
    <product v-for="n in items" :key="n.reference" :item="n" ></product>
  </div>
</template>

<script>
import Product from '../templates/Product.vue'
export default {
  name: 'Page',
  components: {Product},
  props: {
    items: Array,
    containerStyle: Object
  }
}
</script>

<style scoped>
  .page {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: space-around;
    align-content: flex-start;
    width: 210mm;
    height: 297mm;
    background-color: white;
    margin: 1rem auto;
    color: black!important;

  }

  .page:hover{
    outline: 2px solid blueviolet;
  }
</style>