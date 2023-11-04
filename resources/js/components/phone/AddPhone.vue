<template>
  <div>
    <p>Ajouter un numéro de téléphone</p>
    <div v-if="errors.length > 0" class="alert alert-danger text-sm">
      <ul class="m-0">
        <li v-for="error in errors" :key="error">{{ error }}</li>
      </ul>
    </div>
    <div class="mb-3">
      <label for="phone">
        <i class="bi bi-telephone-fill"></i>
        Numéro de téléphone
      </label>
      <input
        type="text"
        class="form-control"
        id="phone"
        v-model="phone"
        placeholder="Entrer un numéro de téléphone"
      />
    </div>
    <div class="text-end">
      <button type="button" class="btn btn-primary mt-3" @click="addPhone">
        <i class="bi bi-plus-circle"></i>
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
  data() {
    return {
      phone: "",
      errors: [],
    };
  },
  methods: {
    addPhone() {
      axios
        .post("/api/restaurants/" + this.id + "/phones", {
          phone: this.phone,
        })
        .then((response) => {
          this.$emit("phoneAdded");
          this.phone = "";
        })
        .catch((err) => {
          console.log(err);
          this.errors = Object.values(err.response.data.errors).flat();
        });
    },
  },
};
</script>

