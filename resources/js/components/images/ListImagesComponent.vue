<template>
  <div class="row">
    <div v-for="image in images" :key="image.id" class="col-md-2 my-2 mx-auto">
      <div class="text-center">
        <img :src="image.url" class="img-fluid rounded" width="200" />
      </div>
      <div class="text-center">
        <button
          type="button"
          class="btn btn-outline-danger btn-sm mt-2"
          @click="deleteImage(image.id)"
        >
          <i class="bi bi-trash"></i>
        </button>
      </div>
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
      let confirmDelete = confirm(
        "Tu es sûr de vouloir supprimer cette image ?"
      );
      if (!confirmDelete) {
        return;
      }
      this.loading = true;
      axios.delete(`/api/restaurants/images/${id}`).then(() => {
        this.loading = false;
        this.$emit("image-deleted");
      });
    },
  },
};
</script>
