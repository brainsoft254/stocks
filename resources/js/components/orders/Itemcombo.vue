<template>
  <div class="item-combo">
    <select   @change="onChange($event.target.value,$event.target.selectedIndex)" class='form-control-grid select2-selection-grid col-xs-5'>
        <option v-if="showselectText" value='-1' selected>--Select Code--</option>
        <option v-for="(option,key) in options" :key="key"  :value='option.value'>{{option.text}}</option>
    </select>
    
  </div>
</template>

<script>
export default {
    name:'Itemcombo',
    props: {'modelValue':null, 'options':null,'showselectText':{default:true}},
      computed: {
        selected () { return this.value }
      },
    data(){
      return{
        selectedIndex:null
      }
    },
    mounted(){
    //    console.log('mounted:',this.options);
    },
    created(){
      //  console.log('created:',this.options);
    },
    methods: {
        onChange(value,selIndex) {
            //console.log(value);
            if (value === '') {
            value = null;
        }
            this.selectedIndex=selIndex;
            this.$emit('update:modelValue', value);
        },
        logIndex(){
          console.log('SelectedINDEX=',this.selectedIndex);
        }


    }
};
</script>
<style scoped>
    select{
        border-radius:0px !important;width:auto;
    }
</style>