<template>
  <div
    class="property-grid-1 bg-white property-block border transation-this hover-shadow mb-30"
  >
    <div
      class="overflow-hidden position-relative transation thumbnail-img bg-secondary hover-img-zoom"
    >
      <a href="javascript:;">
        <img
          :src="`https://ledigbolig.dk/{{property.thumbnail}}`"
          alt="Image Not Found!"
          onerror="this.src='/images/resource/empty_thumb.jpg'"
        />
      </a>
    </div>
    <div class="property_text p-3" style="position: relative">
      <div class="price">
        <span class="mt-1 mb-1">
          {{ cutLastDecimalZero(property.price_dk) }} kr./md.
        </span>
      </div>
      <h6 class="mt-5 text-overflow">
        <a class="fz14 font-600 text-secondary" href="">{{
          property.headline_dk
        }}</a>
      </h6>
      <span class="my-3 d-block text-overflow">
        <fa :icon="`map-marker-alt`" class="text-primary" fixed-width />
        {{ property.address }}</span
      >
      <div class="quantity">
        <ul class="d-flex">
          <li class="d-flex align-items-center">
            <i class="icon icon-xl property-rooms"></i>
            <span class="ml-1">{{ property.rooms }} værelser</span>
          </li>
          <li class="d-flex align-items-center">
            <i class="icon icon-xl property-size"></i>
            <span class="ml-1">{{ property.size }} m<sup>2</sup></span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'PropertyItem',

  props: {
    property: { type: Object, default: null }
  },
  methods: {
    cutLastDecimalZero(price) {
      if (price == undefined) {
        return value;
      }
      if (price.indexOf(',') != -1) {
        price = price.substr(0, price.indexOf(','));
      }
      var value = price;
      var price_length = price.length;
      var last_decimal = price.substring(price_length - 3, price_length);
      if (last_decimal) {
        if (last_decimal.indexOf('.') > -1) {
          value = price.substring(0, price_length - 3);
        }
      }
      if (value.indexOf('.') == -1) {
        if (value.length > 3) {
          var value1 = value.substring(0, value.length - 3);
          var value2 = value.substring(value.length - 3, value.length);
          value = value1 + '.' + value2;
        }
      }
      var valueArray = value.split('.');
      if (valueArray.length > 1) {
        if (valueArray[1] == '000') {
          value = valueArray[0] + '.000';
        } else {
          value = valueArray[0] + '.' + valueArray[1];
        }
      }
      return value;
    }
  }
};
</script>
<style scoped>
.price {
  position: absolute;
  top: 10px;
  left: -6px;
  background-color: #53b141;
  color: #fff;
  padding: 2px 20px 2px 10px;
  z-index: 10;
  -webkit-border-radius: 0 4px 4px 0;
  -moz-border-radius: 0 4px 4px 0;
  border-radius: 0 4px 4px 0;
}
.price:before {
  content: ' ';
  position: absolute;
  left: 0;
  bottom: -6px;
  border-color: rgba(0, 0, 0, 0) #417c1d rgba(0, 0, 0, 0) rgba(0, 0, 0, 0);
  border-style: solid;
  border-width: 0 6px 6px 0;
  height: 0;
  width: 0;
}
.price span {
  display: block;
  font-size: 15px;
  font-weight: 700;
  margin-top: -4px;
  line-height: 1.4;
}
.quantity li {
  padding-right: 15px;
}
</style>

