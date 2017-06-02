<!-- Vue component -->
<template>
  <div>
    <multiselect v-model="value" :options="options"></multiselect>
  </div>
</template>

<script>

  export default {
    // OR register locally
    data () {
      return {
        value: null,
        options: ['list', 'of', 'options']
      }
    }
  }
</script>

