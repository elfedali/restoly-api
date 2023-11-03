<template>
  <div>
    <!-- message error -->
    <div v-if="errors && errors.length > 0" class="alert alert-danger">
      {{ errors }}
    </div>
    <div class="mb-3">
      <label for="menu_category_id">Menu Category</label>
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
      <label for="name">Name</label>
      <input
        type="text"
        class="form-control"
        id="name"
        v-model="menuItem.name"
      />
    </div>
    <div class="mb-3">
      <label for="price">Price</label>
      <input
        type="text"
        class="form-control"
        id="price"
        v-model="menuItem.price"
      />
    </div>
    <div class="mb-3">
      <label for="description">Description</label>
      <textarea
        class="form-control"
        id="description"
        v-model="menuItem.description"
      ></textarea>
    </div>
    <button class="btn btn-primary" @click="addMenuItem">Add</button>
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