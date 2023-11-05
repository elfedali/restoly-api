<template>
  <div>
    <p>Ajouter une adresse</p>

    <div class="mb-3">
      <label for="address">Adresse</label>
      <input
        type="text"
        class="form-control"
        id="address"
        v-model="address"
        placeholder="Adresse"
      />
    </div>
    <!-- zip-code -->
    <div class="mb-3">
      <label for="zip_code">Code postal</label>
      <input
        type="text"
        class="form-control"
        id="zip_code"
        v-model="zip_code"
        placeholder="Code postal"
      />
    </div>
    <!-- city -->
    <div class="mb-3">
      <label for="city">Ville</label>
      <input
        type="text"
        class="form-control"
        id="city"
        v-model="city"
        placeholder="Ville"
      />
    </div>
    <!-- country -->
    <div class="mb-3">
      <label for="country">Pays</label>
      <input
        type="text"
        class="form-control"
        id="country"
        v-model="country"
        placeholder="Pays"
      />
    </div>
    <div class="text-end">
      <button type="submit" class="btn btn-primary">Ajouter</button>
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
      address: "",
      zip_code: "",
      city: "",
      country: "",
      loading: false,
    };
  },
  methods: {
    addAddress() {
      axios
        .post("/api/restaurants/" + this.id + "/address", {
          address: this.address,
        })
        .then((response) => {
          this.$emit("addressAdded");
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>

