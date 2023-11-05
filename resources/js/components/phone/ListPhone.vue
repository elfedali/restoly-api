<template>
  <div>
    <p>La liste des téléphones</p>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Numéro de téléphone</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(phone, index) in phones" :key="index">
          <td>{{ phone.phone }}</td>
          <td>
            <button
              type="button"
              class="btn btn-danger"
              @click="deletePhone(phone.id)"
            >
              Supprimer
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  props: {
    phones: {
      type: Array,
      required: true,
    },
  },
  methods: {
    deletePhone(id) {
      let confirmDelete = confirm(
        "Tu es sûr de vouloir supprimer ce numéro de téléphone ?"
      );
      if (!confirmDelete) {
        return;
      }
      axios
        .delete("/api/restaurants/phones/" + id)
        .then((response) => {
          this.$emit("phoneDeleted");
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>

