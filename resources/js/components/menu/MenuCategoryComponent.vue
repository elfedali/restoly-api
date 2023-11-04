<template>
  <div>
    <p>Ajouter une catégorie de menu</p>
    <!-- help -->
    <div v-if="errors.length > 0" class="alert alert-danger text-sm">
      <ul class="m-0">
        <li v-for="error in errors" :key="error">{{ error }}</li>
      </ul>
    </div>
    <!-- todo:: make input border red when erros about the field -->
    <input
      type="text"
      class="form-control"
      placeholder="Entrer une catégorie de menu"
      v-model="menu_category"
    />

    <div class="text-end">
      <button
        type="button"
        class="btn btn-outline-primary btn-sm mt-2"
        @click="addMenuCategory"
      >
        Ajouter
      </button>
    </div>
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
      errors: [],
      message: "",
    };
  },
  methods: {
    addMenuCategory(event) {
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
          this.errors = Object.values(error.response.data.errors).flat();
        });
    },
  },
};
</script>

<style>
</style>