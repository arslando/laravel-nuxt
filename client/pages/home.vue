<template>
  <div>
    <div
      class="full-row p-0"
      style="
        background-image: url('images/resource/search_background.png');
        background-position: center top;
      "
    >
      <div class="container">
        <div class="row justify-content-md-center">
          <div class="col-md-8">
            <div class="banner-search">
              <h1 class="text-center mx-auto text-white home-page-landing-text">
                Find en ledig bolig
              </h1>
              <form action="#" class="banner-search-form p-2" method="POST">
                <div class="form-row">
                  <div class="col-lg-12 col-12">
                    <div class="form-group mb-0">
                      <search-location />
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="full-row pt-4">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <div class="text-secondary text-center mb-5">
              <h2 class="text-secondary mx-auto mb-1 home-page-landing-text">
                Lejeboliger i hele Danmark
              </h2>
              <span class="d-table w-50 w-sm-100 sub-title mx-auto text-center"
                >Ledig boliger til leje i København, Aarhus, Odense og
                Aalborg</span
              >
            </div>
          </div>
        </div>
        <div class="row row-cols-lg-5 row-cols-md-5 row-cols-sm-2 row-cols-1">
          <location-card
            v-for="(l, index) in locations"
            :key="`location-${index}`"
            :location="l"
          ></location-card>
        </div>
      </div>
    </div>

    <!--============== Property Tab Start ==============-->
    <div class="full-row bg-light">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-8">
            <h2 class="main-title down-line w-50 mb-5 w-sm-100">
              Seneste lejeboliger
            </h2>
          </div>
          <div class="col-md-4">
            <a
              href="/lejeboliger"
              class="my-3 btn-link text-secondary hover-text-primary transation font-700 float-right"
              >Vis flere boliger ></a
            >
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div
              class="mix-element row row-cols-lg-3 row-cols-md-2 row-cols-1 mt-1"
            >
              <div
                class="col"
                v-for="(property, index) in properties"
                :key="`property-${index}`"
              >
                <property-item :property="property"> </property-item>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--============== Property Tab End ==============-->

    <div class="full-row bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <span
              class="pb-2 d-table w-50 w-sm-100 text-primary m-auto text-center tagline fz26"
              >Blog om boliger</span
            >
            <h5 class="down-line w-50 w-sm-100 mx-auto text-center mb-5">
              Få boliginspiration fra mange af vores artikler
            </h5>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <blog-card />
          </div>
          <div class="col-lg-4 col-md-6">
            <blog-card />
          </div>
          <div class="col-lg-4 col-md-6">
            <blog-card />
          </div>
        </div>
      </div>
    </div>
    <!--============== Blog Section End ==============-->

    <!--============== Register Section Start ==============-->
    <div class="full-row bg-primary py-4">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-8 col-md-8">
                <h4 class="text-white xs-text-center my-20">
                  Digital fremvisning af din bolig?
                </h4>
              </div>
              <div class="col-lg-4 col-md-4">
                <a
                  href="javascript:;"
                  class="btn btn-white y-center position-relative d-table xs-mx-auto ml-auto btn-subscribe"
                  >Udlej din bolig</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--============== Register Section End ==============-->
  </div>
</template>
<script>
import BlogCard from '../components/global/BlogCard.vue';
import LocationCard from '../components/global/LocationCard.vue';
import PropertyItem from '../components/global/PropertyItem.vue';
import SearchLocation from '../components/global/SearchLocation.vue';
export default {
  components: { LocationCard, PropertyItem, BlogCard, SearchLocation },
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
      locations: [
        { name: 'København', count: 1794, background: 'destination-1.jpg' },
        { name: 'Aarhus', count: 398, background: 'destination-2.jpg' },
        { name: 'Aalborg', count: 514, background: 'destination-3.jpg' },
        { name: 'Odense', count: 329, background: 'destination-4.jpg' },
        { name: 'Esbjerg', count: 196, background: 'destination-5.jpg' }
      ],
      properties: [
        {
          id: '1',
          slug: 'slug',
          thumbnail:
            'images/propertyimages/1e5df0f3f9b19327e3e2b7e50b667670.jpg',
          price_dk: '50000',
          headline_dk: 'headline',
          address: 'address',
          rooms: 'rooms',
          size: 'size'
        },
        {
          id: '1',
          slug: 'slug',
          thumbnail:
            'images/propertyimages/1e5df0f3f9b19327e3e2b7e50b667670.jpg',
          price_dk: '50000',
          headline_dk: 'headline',
          address: 'address',
          rooms: 'rooms',
          size: 'size'
        }
      ]
    };
  }
};
</script>

<style scoped>
.banner-search {
  width: 100%;
  padding-top: 250px;
  padding-bottom: 270px;
}
.banner-search-form {
    background: rgb(248 249 250 / 90%);
    border-radius: 5px;
    padding: 7px !important;
    box-shadow: 0 0.3rem 2rem rgba(0, 0, 0, .50)!important;
}
</style>
