<template>
  <div class="container">
    <div class="container-page">
      <page
          :id-page="n"
          v-for="n in this.pages.length"
          :key="n"
          :items="this.pages[n]"
          :containerStyle="this.stylePage">
      </page>
    </div>

  </div>
</template>

<script>
import Page from './Page.vue'
import {storeToRefs} from 'pinia';
import {useCatalogStore} from '@/stores/catalogStore'
import pagination from '@/services/Pagination'
import PageDetails from '@/components/menu/PageDetails.vue'

export default {
  setup () {
    const store = useCatalogStore()
    const { catalog, dataProduct, dataPages } = storeToRefs(store)
    return {
      store,
      catalog,
      dataProduct,
      dataPages
    }
  },
  name: 'PrintContainer',
  components: {PageDetails, Page},
  props: {
    container: Object
  },
  data () {
    return {
      stylePage: {
        paddingTop: this.container.marginTop,
        paddingBottom: this.container.marginBottom,
        paddingLeft: this.container.marginLeft,
        paddingRight: this.container.marginRight,
      },
      mapping: [],
      pages: []
    }
  },
  computed: {
    areaWidth: function () {
      return (210 - (this.container.marginLeft + this.container.marginRight)) / this.container.col
    },
    areaHeight: function () {
      return (297 - (this.container.marginTop + this.container.marginBottom)) / this.container.row
    },
    countItems: function () {
      return this.container.items.length
    },
    itemsPerPage: function () {
      return this.container.row * this.container.col
    },
    numberPage: function () {
      return Math.ceil(this.countItems / this.itemsPerPage)
    }
  },
  methods: {
    getMarginTop: function () {
      return this.container.marginTop;
    },
    getMarginBottom: function () {
      return this.container.marginTop;
    },
    positionItems: function () {
      let items = this.container.items
      let start = 0
      let end = this.itemsPerPage
      let index = 0;
      let explode = true
      while (explode) {
        let parts = items.slice(start, end)
        this.mapping[index] = parts

        if(parts.length < (end - start)){
          explode = false
        }

        start = end + 1
        end = end + this.itemsPerPage

        index++
      }
    },
    getProductByPage: function (index) {
      return this.mapping[index]
    }
  },
  mounted() {
     // this.positionItems() // -> si gestion par grille
    this.pages = pagination.makePagination(this.container, this.dataProduct)
  }
}
</script>

<style scoped>
  .container{
    display: flex;
    flex-direction: row;
    width: 100%;
    justify-content: space-between;
    align-content: space-between;
  }

  .container-page{
    display: flex;
    flex-direction: column;
    width: 70%;
  }
</style>