<template>
  <div class="product" :data-id="this.item.reference">
    <div class="product-detail">
      <div class="product-detail-reference">
        {{ this.item.reference }}
      </div>
      <div class="product-detail-name">
        {{ this.item.name }}
      </div>
    </div>
    <div class="dfex product-image">
      <img :src="this.item.image" alt="une image">
    </div>
    <div class="dfex description">
      {{ this.item.description }}
    </div>
  </div>
</template>

<script>
export default {
  name: 'Product',
  props: {
    item: Object
  },
  mounted: function () {
    this.$nextTick(()=> {
      this.$emit('mounted')
    })
  }
}
</script>

<style scoped>

  .dfex{
    display: flex;
  }

  .product{
    display: flex;
    flex-direction: column;
    width: 9cm;
    height: auto;
  }

  .product-detail{
    display: flex;
    flex-direction: row;
  }

  .product-detail-reference{
    display: flex;
    flex-direction: row;
    font-weight: 700;
    color: darkblue;
    font-size: 16pt;
    text-align: left;
  }

  .product-detail-name{
    display: flex;
    flex-direction: row;
    font-weight: 700;
    color: black;
    font-size: 16pt;
    text-align: center;
  }

  .product:hover {
    outline: 2px solid darkgreen;
  }

</style>