<template>
  <div class="page-frame">
    <div class="page" :style="this.stylePage" ref="page">
      <product v-for="n in items" :key="n.reference" :item="n" ></product>
    </div>
    <div class="page-detail">
      <PageDetails :dataStyle="this.stylePage"></PageDetails>
    </div>
  </div>

</template>

<script>
import Product from '../templates/Product.vue'
import PageDetails from '@/components/menu/PageDetails.vue'

export default {
  name: 'Page',
  components: {PageDetails, Product},
  props: {
    items: Array,
    containerStyle: Object
  },
  data () {
    return {
      stylePage: {}
    }
  },
  mounted() {
    let el = this.$refs.page
    this.stylePage = this.displayDetail(el)
  },
  methods: {
    displayDetail: function (element) {

      const { paddingLeft, paddingRight, paddingBottom, paddingTop, backgroundColor } = window.getComputedStyle(element)

      return {
        paddingLeft: paddingLeft,
        paddingRight: paddingRight,
        paddingTop: paddingTop,
        paddingBottom: paddingBottom,
        backgroundColor: backgroundColor
      }
    }
  }
}
</script>

<style scoped>
  .page-frame{
    display: flex;
    flex-direction: row;
    min-width: 297mm;
    width: 80vw;
  }
  .page {
    display: flex;
    position: relative;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: space-around;
    align-content: flex-start;
    width: 210mm;
    height: 297mm;
    background-color: white;
    margin: 1rem auto;
    color: black!important;
    background-clip: content-box;
  }

  .container-page-detail{
    display: flex;
    flex-direction: column;
    width: 30%;
    padding:0 auto;
  }

  .page:hover{
    outline: 2px solid blueviolet;
  }

  .page:after {
    content:"";
    width: 210mm;
    height: 297mm;
    background: rgb(194,240,194);
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;
  }
</style>