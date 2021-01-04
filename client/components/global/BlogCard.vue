<template>
  <div class="thumb-blog-overlay bg-white hover-text-PushUpBottom mb-4">
    <div class="post-image position-relative overlay-secondary">
      <img src="images/blog/1.png" alt="Image not found!" />
      <div class="position-absolute xy-center">
        <div class="overflow-hidden text-center">
          <a class="text-white first-push-up transation font-large" href="#"
            >+</a
          >
        </div>
      </div>
    </div>
    <div class="post-content p-35">
      <h6 class="d-block mb-3">
        <a href="#" class="transation text-dark hover-text-primary"
          >Guide til studieboliger</a
        >
      </h6>
      <p>
        At finde en studiebolig kan være svært. Jagten efter studiebolig sammen
        med tusindvis af andre unge op til studiestart kan være stressende. Især
        i de store studiebyer, hvor der er rigtig mange, der lige som dig gerne
        vil bo både centralt og billigt.
      </p>
      <div class="post-meta text-uppercase">
        <a href="#"><span>3 Mar, 2020</span></a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'BlogCard',

  props: {
    location: { type: Object, default: null }
  }
};
</script>
<style scoped>
.thumb-blog-overlay .post-image::before {
  content: '';
  position: absolute;
  opacity: 0;
  visibility: hidden;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
.thumb-blog-overlay:hover .post-image::before {
    visibility: visible;
    opacity: 1;
}
.xy-center, .slider-caption, .hover-classic-layer::before, .video-popup span {
    top: 50%;
    left: 50%;
    -moz-transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);
    -o-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}
.transation {
    opacity: 1;
    -webkit-transition: opacity 1s ease-in-out;
    -moz-transition: opacity 1s ease-in-out;
    -o-transition: opacity 1s ease-in-out;
    transition: opacity 1s ease-in-out;
}
.img-thumb-title-inside::before, .overlay-secondary::before {
    background-color: rgba(36, 50, 74, .8);
}
.hover-text-PushUpBottom:hover .first-push-up {
    transition-delay: 300ms;
}
.list-color-white li a, .list-color-white li, .list-color-white a, .text-white, .hover-text-white:hover *, a.hover-text-white:hover {
    color: #fff !important;
}
.hover-text-PushUpBottom .first-push-up, .hover-text-PushUpBottom .second-push-up, .hover-text-PushUpBottom .third-push-up {
    position: relative;
    bottom: -25px;
    visibility: hidden;
}
.hover-text-PushUpBottom:hover .first-push-up, .hover-text-PushUpBottom:hover .second-push-up, .hover-text-PushUpBottom:hover .third-push-up {
    bottom: 0;
    visibility: visible;
}
.thumb-blog-overlay .post-meta a span {
    font-size: 13px;
}
</style>

