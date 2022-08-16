<template>
  <div>
    <page v-for="n in this.numberPage" :key="n - 1" :style="stylePage" :items="getProductByPage(n - 1)"></page>
  </div>
</template>

<script>
import Page from './Page.vue'
export default {
  name: 'PrintContainer',
  components: {Page},
  props: {
    container: Object
  },
  data () {
    return {
      stylePage: {
        marginTop: this.container.marginTop,
        marginBottom: this.container.marginBottom,
        marginLeft: this.container.marginLeft,
        marginRight: this.container.marginRight
      },
      mapping: []
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
    this.positionItems()
  }


}
</script>

<style scoped>

</style>