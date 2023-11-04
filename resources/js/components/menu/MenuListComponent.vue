<template>
  <div>
    <section v-if="menuItems.length > 0">
      <div
        v-for="menu_category in menuItems"
        :key="menu_category.id"
        class="bg-light mb-3 p-2 rounded"
      >
        <h5 class="text-underline">{{ menu_category.category_name }}</h5>
        <table class="table table-hover table-responsive table-sm">
          <thead>
            <tr>
              <th scope="col">le plat</th>
              <th scope="col">Description</th>
              <th scope="col" width="10%">Prix</th>
              <th scope="col" width="120">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="item in menu_category.items" :key="item.id">
              <td>
                <span> #{{ item.id }} {{ item.name }} </span>
              </td>

              <td>
                <span>{{ item.description }}</span>
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
                  Supprimer
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>
    <section v-else>
      <div class="text-muted">
        <p><u>No menu items yet.</u></p>
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
          // console.log(response);
          this.$emit("menu-item-deleted", response.data);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>


