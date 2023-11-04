<template>
  <div class="card mt-4">
    <div class="card-header">
      <h5>Upload Images</h5>
    </div>
    <div class="card-body">
      <template v-if="images.length === 0">
        <p class="text-muted"><u>No images uploaded yet.</u></p>
      </template>
      <template v-else>
        <ListImages :images="images" @image-deleted="getrestaurantImages" />
      </template>
      <hr />
      <UploadImages :id="id" @upload="getrestaurantImages" />
    </div>
  </div>
</template>

<script>
import UploadImages from "./images/UploadComponent.vue";
import ListImages from "./images/ListImagesComponent.vue";

export default {
  components: {
    UploadImages,
    ListImages,
  },
  props: {
    id: {
      type: Number,
      required: true,
    },
  },
  data() {
    return {
      images: [],
      loading: false,
    };
  },
  methods: {
    getrestaurantImages() {
      this.loading = true;

      axios.get(`/api/restaurants/${this.id}/images`).then((response) => {
        this.images = response.data.images;
        this.loading = false;
      });
    },
  },
  created() {
    this.getrestaurantImages();
  },
};
</script>

