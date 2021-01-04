<template>
  <div class="col">
    <div class="hover-img-zoom text-center mb-4">
      <div
        class="overflow-hidden transation thumbnail-img bg-secondary landing-city-img-round"
      >
        <a href="/lejeboliger?keyword=København"
          ><img
            
            :src="`/images/resource/${location.background}`"
            class="landing-city-img"
            :alt="location.name"
        /></a>
      </div>
      <div class="mt-3">
        <h5 class="transation">
          <a href="/lejeboliger?keyword=København">{{location.name}}</a>
        </h5>
        <p>{{location.count}} lejeboliger</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "LocationCard",

  props: {
    location: { type: Object, default: null },
  },
};
</script>
<style scoped>
.landing-city-img-round {
    border-radius: 10px;
}
.landing-city-img {
    height: 346px;
    border-radius: 7px;
}
</style>

