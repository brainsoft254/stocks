<template>
  <div class="dpicker">
    <select @change="onChange($event.target.value)">
      <option v-for="(option,key) in options"
        :key="key" :value="option.id"
      >{{option.text}}</option>
    </select>
  </div>
</template>

<script>
export default {
    name:'Selectpicker',
  props: ['modelValue', 'options'],
  computed: {
    selected () { return this.value }
  },
  methods: {
    onChange(value) {
        console.log(value);
    	if (value === '') {
      	value = null;
      }
    	this.$emit('update:modelValue', value);
    }
  }
};
</script>