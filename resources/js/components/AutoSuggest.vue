<template>
  
    <!-- <div
      class="
        relative
        flex
        items-center
        text-gray-400
        focus-within:text-gray-500
      "
    > -->
      <!-- <SearchIcon
        class="text-gray-500 h-6 w-6 absolute ml-3 pointer-events-none"
      /> -->
    <div class="form-group">
    <div class="input-group ">
        <span class="input-group-addon success">{{label}}</span>
        <div class="autocomplete w-auto" ref="container">
      <input
        v-model="searchText"
        @keyup="onTextChange($event.target.value)"
        @keydown.down="onArrowDown"
        @keydown.up="onArrowUp"
        @keydown.enter="onEnter"
        @blur="handleOnBlur($event.target.value)"
        type="text"
        tabindex="arrowCounter"
        class="
          form-control
          pr-3
          pl-10
          py-2
          font-semibold
          placeholder-gray-500
          border-none
          ring-2 ring-gray-300
          focus:ring-gray-500 focus:ring-2
          rounded-lg
        "
        :class="[
          { 'bg-red-50': isNewVal, 'text-red-500': isNewVal },
          {
            'bg-green-50 text-green-500 border-green-800 font-bold': !isNewVal,
          },
        ]"
        :placeholder="placeholder"
      />
    <span class="autocomplete-results">
    <ul
      class="autocomplete-results_options"
      v-show="isOpen"
    >
      <li
        v-for="(item,i) in filteredRes"
        :key="i"
        @click="setResults(item)"
        class="
          autocomplete-result
          p-1
          font-medium
          w-full
          hover:text-white hover:bg-blue-700
          cursor-pointer
        "
        :class="{ 'bg-blue-500 text-white': i === arrowCounter }"
      >
        {{ item }}
      </li>
    </ul>
    </span>      
    </div>
    </div>
  </div>

</template>

<script>
import { onMounted, reactive, watch, toRefs, onUnmounted } from "vue";
import tailwind from 'tailwind-rn';

export default {
  name: "Autosuggest",
  props: {
    items: {
      type: Array,
      required: false,
    },
    label: {
      type: String,
      required: true,
    },
    placeholder:{
      type:String,
      required:false
    }
  },
  setup(props, context) {
    const state = reactive({
      searchText: "",
      selectedText: "",
      filteredRes: [],
      isOpen: false,
      isNewVal: false,
      container: [],
      arrowCounter: -1,
    });

    const onTextChange = (val) => {
      state.isOpen = val.trim() != "";
      state.searchText = val;
    };

    const filterResults = () => {
      state.filteredRes = props.items.filter(
        (item) =>
          item.trim().toLowerCase().indexOf(state.searchText.trim().toLowerCase()) > -1
      );
    };

    const handleClickOutside = (event) => {
      if (!state.container.contains(event.target)) {
        state.isOpen = false;
        state.arrowCounter = -1;
      }
    };
    const setResults = (result) => {
      state.searchText = result;
      state.isOpen = false;
    };
    const handleOnBlur= (value) => {
     // console.log('blur happened',value);
      if(state.isNewVal){
            context.emit('update:newSalesrep',state.searchText);
        }
    };
    const onArrowDown = () => {
      if (state.arrowCounter < state.filteredRes.length) {
        state.arrowCounter = state.arrowCounter + 1;
      }
    };

    const onArrowUp = () => {
      if (state.arrowCounter > 0) {
        state.arrowCounter = state.arrowCounter - 1;
        
      }
    };

    const onEnter = () => {
      if (state.arrowCounter >= 0) {
        setResults(state.filteredRes[state.arrowCounter]);
        state.arrowCounter = -1;
      } else {
        state.isOpen = false;
      }
    };

    watch(
      () => state.searchText,
      (newVal, oldVal) => {
        context.emit('update:modelValue', newVal);  
        filterResults();
        state.isNewVal = state.filteredRes.length == 0;
      }
    );

    onMounted(() => {
      console.log(state.container);
      state.filteredRes = props.items;
      console.log("Filtered", state.filteredRes);
      document.addEventListener("click", handleClickOutside);
    });

    onUnmounted(() => {
      document.removeEventListener("click", handleClickOutside);
    });

    return {
      handleOnBlur,
      onArrowDown,
      onArrowUp,
      onEnter,
      setResults,
      onTextChange,
      ...toRefs(state),
    };
  },
};
</script>

<style lang="scss" scoped>

.bg-blue-500{
  background-color: #337ab7;
  color:#fff !important;
}
.text-green-500{
  color: rgba(16, 185, 129,1);
}
.bg-green-50{
 background-color: rgba(236, 253, 245,1);
}
.text-red-500{
  color: rgba(239, 68, 68,1);
}
.bg-red-50{
 background-color: rgba(254, 242, 242,1);
}
.autocomplete{
  display: flex;
  align-items: center;
  flex-flow: column;
  width:100%;
  overflow:hidden;
  padding: 0%;
  margin:0%;

}
.autocomplete-results{
  display: block;
  background-color: #fff;
  position:absolute;
  top:3.5rem;
  right:0rem;
  height:auto;
  padding: 0%;
  margin:0%;
  min-width:72%;
  z-index:9999;
}
.autocomplete-results_options{
  padding:0%;
  margin:0%;
  display:block;
  width:100%;
  border:solid 1px #337ab7;
}
.autocomplete-result{
 
  white-space: nowrap;
  list-style: none;
  cursor: pointer;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  
}
.autocomplete-result:hover{
  color:#fff;
  background-color: #337ab7;
}
</style>