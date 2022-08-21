<template>
  <div class="form-page-details">
    <div class="input">
      <label for="">Padding Left :</label>
      <input id="inputPaddingLeft" type="text" v-model="this.dataStyle.paddingLeft" @input="updateCss">
    </div>
    <div class="input">
      <label for="">Padding Right :</label>
      <input id="inputPaddingRight" type="text" v-model="this.dataStyle.paddingRight" @input="updateCss">
    </div>
    <div class="input">
      <label for="">Padding Top :</label>
      <input id="inputPaddingTop" type="text" v-model="this.dataStyle.paddingTop" @input="updateCss">
    </div>
    <div class="input">
      <label for="">Padding Bottom</label>
      <input id="inputPaddingBottom" type="text" v-model="this.dataStyle.paddingBottom" @input="updateCss">
    </div>
    <div class="input">
      <label for="">Background-color</label>
      <input id="inputPaddingBottom" type="text" v-model="this.dataStyle.backgroundColor" @input="updateCss">
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
  },
  methods: {
    updateCss: function () {

    }
  }
}
</script>

<style scoped>
  .form-page-details{
    display: flex;
    flex-direction: column;
    padding: 2rem 1rem;
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