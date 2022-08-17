<template>
  <div>
    <product v-for="n in products" :key="n.reference" :item="n" :class="{productLoad: true}"></product>
  </div>
</template>

<script>
import {storeToRefs} from "pinia/dist/pinia";
import {useCatalogStore} from "../../stores/catalogStore";
import Product from '../templates/Product.vue'

export default {
  setup () {
    const main = useCatalogStore()
    const {catalog, getAllProducts, dataProduct} = storeToRefs(main)
    const store = storeToRefs(main)
    return {
      main,
      catalog,
      getAllProducts,
      dataProduct
    }
  },
  name: "PreLoader",
  components: {Product},
  computed: {
    products: function () {
      return this.getAllProducts
    }
  },
  mounted() {
    let elements = document.getElementsByClassName('productLoad')
    for (let i = 0; i < elements.length; i++) {
      let id = parseInt(elements[i].getAttribute('data-id'))
      console.log(id);
      this.dataProduct[id] = {width: elements[i].clientWidth, height: elements[i].clientHeight, id: id}
    }
  }
}
</script>

<style scoped>
  .listPreloader{
    display: flex;
    flex-direction: column;
    width: 25%;
    height: 100vh;
    margin-bottom: 2rem;
    overflow: scroll;
  }
</style>