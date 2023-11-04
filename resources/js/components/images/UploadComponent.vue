<template>
  <div>
    <!-- if errors -->
    <div class="alert alert-danger" v-if="errors.length">
      {{ errors }}
    </div>
    <input
      class="form-control"
      type="file"
      @change="onFileChange"
      multiple
      accept="image/*"
      max="6"
    />
    <button
      type="button"
      class="btn btn-outline-success mt-3"
      @click="upload"
      v-if="!loading"
      :disabled="images.length === 0"
    >
      Upload
    </button>
    <button type="button" class="btn btn-outline-success mt-3" disabled v-else>
      <span
        class="spinner-border spinner-border-sm"
        role="status"
        aria-hidden="true"
      ></span>
      Uploading...
    </button>
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
      images: [],
      image: null,
      errors: [],
      loading: false,
    };
  },
  methods: {
    onFileChange(e) {
      this.images = e.target.files || e.dataTransfer.files;
    },
    upload() {
      let formData = new FormData();
      for (var i = 0; i < this.images.length; i++) {
        let file = this.images[i];
        formData.append("images[]", file);
      }
      this.loading = true;
      axios
        .post(`/api/restaurants/${this.id}/images`, formData, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then((response) => {
          this.image = response.data;
          this.errors = [];
          this.loading = false;

          this.$emit("upload", this.image);
        })
        .catch((error) => {
          this.loading = false;
          this.errors = error.response.data.errors;
          console.log(error.response.data);
        });
    },
  },
};
</script>

