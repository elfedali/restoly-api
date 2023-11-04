<template>
  <div>
    <p>Ajouter un plat a la catégorie</p>
    <!-- message error -->
    <div v-if="errors && errors.length > 0" class="alert alert-danger">
      {{ errors }}
    </div>
    <div class="mb-3">
      <label for="menu_category_id">
        Catégorie de menu <span class="text-danger">*</span>
      </label>
      <select
        class="form-select"
        id="menu_category_id"
        v-model="menuItem.menuCategoryId"
      >
        <option
          v-for="menuCategory in menuCategories"
          :key="menuCategory.id"
          :value="menuCategory.id"
        >
          <!-- todo:: find a solution for .fr  -->
          {{ menuCategory.name.fr }}
        </option>
      </select>
    </div>
    <div class="mb-3">
      <label for="name">
        Le nom du plat<span class="text-danger">*</span>
      </label>
      <input
        type="text"
        class="form-control"
        id="name"
        v-model="menuItem.name"
      />
    </div>
    <div class="mb-3">
      <label for="price">
        Prix en (DH) du plat <span class="text-danger">*</span>
        <span class="text-muted"> (ex: 10.50) </span>
      </label>
      <input
        type="text"
        class="form-control"
        id="price"
        v-model="menuItem.price"
      />
    </div>
    <div class="mb-3">
      <label for="description"> Description du plat </label>
      <textarea
        class="form-control"
        id="description"
        v-model="menuItem.description"
      ></textarea>
    </div>
    <div class="text-end">
      <button class="btn btn-outline-primary" @click="addMenuItem">
        Ajouter
      </button>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    menuCategories: {
      type: Array,
      required: true,
    },
  },
  data() {
    return {
      menuItem: {
        menuCategoryId: "",
        name: "",
        price: "",
        description: "",
      },
      errors: {},

      url: "/api/menu-item",
    };
  },
  methods: {
    addMenuItem(event) {
      axios
        .post(this.url, {
          menu_category_id: this.menuItem.menuCategoryId,
          name: this.menuItem.name,
          price: this.menuItem.price,
          description: this.menuItem.description,
        })
        .then((response) => {
          this.menuItem.menuCategoryId = "";
          this.menuItem.name = "";
          this.menuItem.price = "";
          this.menuItem.description = "";
          this.$emit("menu-item-added", response.data);
        })
        .catch((error) => {
          this.errors = error.response.data.message;
        });
      event.preventDefault();
    },
  },
  mounted() {
    console.log("MenuItemComponent mounted");
  },
};
</script>

<style>
</style>