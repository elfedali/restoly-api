<template>
  <div class="card mt-4">
    <div class="card-header">
      <h5>Téléphones</h5>
    </div>
    <div class="card-body">
      <add-phone :id="id" @phoneAdded="getPhones" />
      <template v-if="phones.length === 0">
        <p class="text-muted"><u>No phone added yet.</u></p>
      </template>
      <template v-else>
        <list-phone :phones="phones" @phoneDeleted="getPhones" />
      </template>
    </div>
  </div>
</template>

<script>
import AddPhone from "./phone/AddPhone.vue";
import ListPhone from "./phone/ListPhone.vue";
export default {
  props: {
    id: {
      type: Number,
      required: true,
    },
  },
  components: {
    AddPhone,
    ListPhone,
  },
  data() {
    return {
      phones: [],
    };
  },
  methods: {
    getPhones() {
      axios
        .get("/api/restaurants/" + this.id + "/phones")
        .then((response) => {
          this.phones = response.data.phones;
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
  created() {
    this.getPhones();
  },
};
</script>