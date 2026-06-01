<template>
  <div id="app">
    <div class="heading">
      <h1>Chuds</h1>
    </div>
    <crud-component
      v-for="crud in cruds"
      v-bind="crud"
      :key="crud.id"
      @update="update"
      @delete="del"
    ></crud-component>
    <div>
      <button @click="create">Add</button>
    </div>
  </div>
</template>

<script>
import CrudComponent from './components/CrudComponent.vue';

export default {
  data() {
    return {
      cruds: [],
      mute: false
    }
  },
  methods: {
    async read() {
      const { data } = await window.axios.get('/api/cruds');
      data.forEach(crud => this.cruds.push(crud));
    },
    async create() {
      const { data } = await window.axios.get('/api/cruds/create');
      this.cruds.push(data);
    },
    async update(id, color) {
      this.mute = true;
      await window.axios.put(`/api/cruds/${id}`, { color });
      this.cruds.find(crud => crud.id === id).color = color;
      this.mute = false;
    },
    async del(id) {
      await window.axios.delete(`/api/cruds/${id}`);
      let index = this.cruds.findIndex(crud => crud.id === id);
      this.cruds.splice(index, 1);
    }
  },
  created() {
    this.read();
  },
  components: {
    CrudComponent
  }
}
</script>
