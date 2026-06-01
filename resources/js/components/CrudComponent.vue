<template>
  <div class="crud">
    <div class="col-1">
      <img :src="image"/>
    </div>
    <div class="col-2">
      <h3>Name: {{ properCase(name) }}</h3>
      <select @change="update">
        <option
          v-for="col in ['red', 'green']"
          :value="col"
          :key="col"
          :selected="col === color ? 'selected' : ''"
        >{{ properCase(col) }}</option>
      </select>
      <button @click="del">Delete</button>
    </div>
  </div>
</template>

<script>
export default {
  computed: {
    image() {
      return `/images/${this.color}.png`;
    }
  },
  methods: {
    properCase(string) {
      return string.charAt(0).toUpperCase() + string.slice(1);
    },
    update(val) {
      this.$emit('update', this.id, val.target.selectedOptions[0].value);
    },
    del() {
      this.$emit('delete', this.id);
    }
  },
  props: ['id', 'color', 'name']
}
</script>
