<template>
  <div>
    <product v-if="active" v-for="n in products" :key="n.id" :item="n" :class="{productLoad: true}"></product>
  </div>
</template>

<script>
import {storeToRefs} from 'pinia/dist/pinia';
import {useCatalogStore} from '@/stores/catalogStore';
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
  data: function () {
    return {
      active: true
    }
  },
  computed: {
    products: function () {
      return this.getAllProducts
    }
  },
  mounted() {
    let elements = document.getElementsByClassName('productLoad')
    for (let i = 0; i < elements.length; i++) {
      let id = parseInt(elements[i].getAttribute('data-id'))
      this.dataProduct[id] = {width: this.pxToMm(elements[i].clientWidth), height: this.pxToMm(elements[i].clientHeight), id: id}
    }
    this.close()
  },
  methods: {
    close () {
      this.active = false
    },
    pxToMm (px) {
      return ( px * 25.4) / 138
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

  .preloader__loading {
    position: fixed;
    top: 50%;
    left: 50%;
    width: 40px;
    height: 40px;
    padding: 10px;
    margin-left: -20px;
    margin-top: -20px;
    background-color: #444;
    background-color: rgba(0,0,0,0.5);
    border-radius: 4px;
  }
  .preloader__loading:after{
     content:'';
     display: block;
     width: 20px;
     height: 20px;
     background-color: #fff;
     border-radius: 20px;
     animation: lightbox-loading .5s ease infinite;
  }

  @keyframes lightbox-loading {
    0% {
      opacity: .5;
      transform: scale(.75);
    }
    50% {
      opacity: 1;
      transform: scale(1);
    }
    100% {
      opacity: .5;
      transform: scale(.75);
    }
  }
</style>