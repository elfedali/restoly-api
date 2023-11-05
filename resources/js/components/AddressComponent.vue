<template>
  <div>
    <div class="card mt-4">
      <div class="card-header">
        <h3 class="card-title">Liste des adresses</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <template v-if="addresses.length === 0">
          <p class="text-muted"><u>Aucune adresse enregistrée.</u></p>
        </template>
        <template v-else>
          <ListAddress :addresses="addresses" />
        </template>
        <hr />
        <AddAddress :id="id" />
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</template>

<script>
import AddAddress from "./address/AddAddressComponent.vue";
import ListAddress from "./address/ListAddressComponent.vue";
export default {
  components: {
    AddAddress,
    ListAddress,
  },
  props: {
    id: {
      type: Number,
      required: true,
    },
  },
  data() {
    return {
      loading: false,
      addresses: [],
    };
  },
  methods: {
    getAddresses() {
      this.loading = true;
      axios.get(`/api/restaurants/${this.id}/addresses`).then((response) => {
        this.addresses = response.data.addresses;
        this.loading = false;
      });
    },
  },
};
</script>
 