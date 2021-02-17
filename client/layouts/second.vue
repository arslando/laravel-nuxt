<template>
  <div id="page_wrapper">
    <app-second-header />
    <div class="header-top-pos">
    </div>
    <nuxt />
    <app-footer />
    <app-copy-right />
  </div>
</template>

<script>
import AppCopyRight from "../components/global/AppCopyRight.vue";
import AppFooter from "../components/global/AppFooter.vue";
import AppHeader from '../components/global/AppHeader.vue';

export default {
  components: {
    AppFooter,
    AppCopyRight,
    AppHeader,
  },
};
</script>

<style scoped>
#page_wrapper {
  background-color: #fff;
  margin-right: auto;
  margin-left: auto;
  width: 100%;
}
</style>
