<template>
  <div class="row">
    <div v-for="image in images" :key="image.id" class="col-md-2 my-2">
      <img :src="image.url" class="img-fluid rounded" width="200" />
      <button
        type="button"
        class="btn btn-outline-danger btn-sm mt-2"
        @click="deleteImage(image.id)"
      >
        Delete
      </button>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    images: {
      type: Array,
      required: true,
    },
  },
  data() {
    return {
      loading: false,
    };
  },

  methods: {
    deleteImage(id) {
      this.loading = true;
      axios.delete(`/api/restaurants/images/${id}`).then(() => {
        this.loading = false;
        this.$emit("image-deleted");
      });
    },
  },
};
</script>
