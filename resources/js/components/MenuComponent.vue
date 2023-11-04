<template>
  <div class="card mt-4">
    <div class="card-header">
      <h5>Menu editor</h5>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-6">
          <MenuCategory
            :id="id"
            @menu-category-added="getMenuCategories"
          ></MenuCategory>
          <hr />
          <MenuItem
            :menuCategories="menuCategories"
            @menu-item-added="getMenuItems"
          ></MenuItem>
        </div>
        <!-- /.col-6 -->
        <div class="col-6">
          <MenuList
            :menuItems="menuItems"
            @menu-item-deleted="getMenuItems"
          ></MenuList>
        </div>
        <!-- /.col-6 -->
      </div>
      <!-- /.row -->
    </div>
  </div>
  <!-- /.card mb-3 -->
</template>

<script>
import MenuCategory from "./menu/MenuCategoryComponent.vue";
import MenuItem from "./menu/MenuItemComponent.vue";
import MenuList from "./menu/MenuListComponent.vue";
export default {
  components: {
    MenuCategory,
    MenuItem,
    MenuList,
  },
  props: {
    id: {
      type: Number,
      required: true,
    },
  },
  data() {
    return {
      menuItems: [],
      menuCategories: [],
    };
  },
  methods: {
    getMenuCategories() {
      axios
        .get("/api/menu-category/" + this.id)
        .then((response) => {
          this.menuCategories = response.data.menu_categories;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getMenuItems() {
      axios
        .get("/api/menu-item/" + this.id)
        .then((response) => {
          this.menuItems = response.data.menu_items;
          console.log(response.data);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  created() {
    this.getMenuCategories();
    console.log("MenuComponent.vue created");
    this.getMenuItems();
  },
};
</script>
