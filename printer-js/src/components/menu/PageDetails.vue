<template>
  <div class="form-page-details">
    <div class="input">
      <label for="">Padding Left :</label>
      <input id="inputPaddingLeft" type="text" :value="this.dataStyle.paddingLeft">
    </div>
    <div class="input">
      <label for="">Padding Right :</label>
      <input id="inputPaddingRight" type="text" :value="this.dataStyle.paddingRight">
    </div>
    <div class="input">
      <label for="">Padding Top :</label>
      <input id="inputPaddingTop" type="text" :value="this.dataStyle.paddingTop">
    </div>
    <div class="input">
      <label for="">Padding Bottom</label>
      <input id="inputPaddingBottom" type="text" :value="this.dataStyle.paddingBottom">
    </div>
  </div>
</template>

<script>
export default {
  name: 'PageDetails',
  props: {
    dataStyle: Object
  },
  mounted() {
    console.log(this.dataStyle)
  }
}
</script>

<style scoped>
  .form-page-details{
    display: flex;
    flex-direction: column;
  }
  .input {
    display: flex;
    flex-direction: row;
    margin-bottom: 0.5rem;
  }

  .input label{
    display: flex;
    width: 33%;
  }
  .input input{
    display: flex;
    width: 77%
  }
</style>