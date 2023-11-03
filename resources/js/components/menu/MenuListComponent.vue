<template>
  <div>
    <section v-if="menuItems.length > 0">
      <div
        v-for="menu_category in menuItems"
        :key="menu_category.id"
        class="-bg-light mb-3 p-2 rounded"
      >
        <h5 class="text-underline">{{ menu_category.category_name }}</h5>
        <table class="table table-hover table-responsive table-sm">
          <thead>
            <tr>
              <th scope="col">Item</th>
              <th scope="col" width="10%">Price</th>
              <th scope="col" width="10%">Delete</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="item in menu_category.items" :key="item.id">
              <td>
                <span> #{{ item.id }} {{ item.name }} </span>
              </td>

              <td>
                <span>{{ item.price }}</span>
              </td>
              <td class="text-end">
                <button
                  type="button"
                  class="btn btn-danger btn-sm"
                  @click="deleteItem(item)"
                >
                  <i class="bi bi-trash"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>
    <section v-else>
      <div class="alert alert-info">
        <h5 class="text-center">No menu items yet.</h5>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  props: {
    menuItems: {
      type: Array,
      required: true,
    },
  },
  methods: {
    deleteItem(item) {
      let answer = confirm("Are you sure you want to delete this item?");
      if (!answer) {
        return;
      }
      axios
        .delete("/api/menu-item/" + item.id)
        .then((response) => {
          console.log(response);
          this.$emit("menu-item-deleted", response.data);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>


