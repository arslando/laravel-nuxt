<template>
  <div>
    <div class="full-row pt-0 pb-0 bg-gray">
      <div class="container">
        <div class="row ml-0 mr-0">
          <div class="col-md-12 mb-5 pl-0 pr-0">
            <div class="row ml-0 mr-0 mt-4 mb-3">
              <div class="col-lg-8 mx-auto pl-0 pr-0">
                <form action="#" method="POST">
                  <div class="form-row">
                    <div class="col-lg-3 col-12">
                      <div class="form-group mb-0 h-100 d-flex">
                        <div
                          class="p-2 property-search-result-bar d-flex align-items-center"
                        >
                          <fa
                            :icon="`filter`"
                            class="text-primary"
                            fixed-width
                            v-on:click="show_filter()"
                          />

                          <span class="propery-filter-result"
                            >{{ totalItems }} lejeboliger</span
                          >
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-9 col-12"></div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import SearchLocation from '../components/global/SearchLocation.vue';
export default {
  layout: 'second',

  components: { SearchLocation },
  head() {
    return {
      title: 'Ledigbolig - ledige boliger til leje i hele Danmark',
      meta: [
        {
          hid: 'keywords',
          name: 'keywords',
          content: 'Ledigbolig - ledige boliger til leje i hele Danmark'
        },
        {
          hid: 'description',
          name: 'description',
          content:
            'Søger du en ledig bolig? Mere end 6.000 lejeboliger herunder lejligheder, huse, værelser og deleboliger til leje på ledigbolig.dk. Danmarks bedste boligportal.'
        }
      ]
    };
  },
  data() {
    return {
      keyword: undefined,
      totalItems: 0
    };
  },
  methods: {
    show_filter: function () {}
  }
};
</script>

<style scoped>
.property-filter-icon {
  font-size: 22px;
  cursor: pointer;
  color: #53b141;
}

.property-filter-icon:hover {
  font-size: 22px;
  color: #349e33;
}
</style>
