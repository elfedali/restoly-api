<template>
  <div>
    <input
      type="text"
      class="form-control"
      placeholder="Menu catgeory"
      v-model="menu_category"
    />
    <button class="btn btn-primary mt-2" @click="addMenuCategory">Add</button>
  </div>
</template>

<script>
export default {
  props: {
    id: {
      type: Number,
      required: true,
    },
  },
  data: function () {
    return {
      menu_category: "",
      url: "/api/menu-category",
    };
  },
  methods: {
    addMenuCategory(event) {
      if (this.menu_category.length > 0) {
        axios
          .post(this.url, {
            name: this.menu_category,
            id_restaurant: this.id,
          })
          .then((response) => {
            console.log(response);
            this.menu_category = "";
            this.$emit("menu-category-added", response.data);
          })
          .catch((error) => {
            console.log(error);
          });
      }
      event.preventDefault();
    },
  },
};
</script>

<style>
</style>