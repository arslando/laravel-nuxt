<template>
  <div class="angucomplete-holder">
    <input
      id="sl_value"
      type="text"
      v-model="searchStr"
      v-on:keyup="onKeyUp"
      placeholder="Indtast by eller postnummer"
      autocomplete="off"
      class="form-control form-control-small w-100"
    />
    <div id="sl_dropdown" class="angucompletekeyword-dropdown" v-if="showDropdown">
      <div class="angucomplete-searching" v-if="searching">Søger...</div>
      <div
        class="angucomplete-searching"
        v-if="!searching && (!results || results.length == 0)"
      >
        Ingen resultater fundet
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'SearchLocation',
  data() {
    return {
      searchStr: '',
      searchKeyword: '',
      lastSearchTerm: null,
      minLength: 3,
      showDropdown: false,
      currentIndex: null,
      results: [],
      searchTimer: null,
      searching: false,
      pause: 300
    };
  },
  props: {
    property: { type: Object, default: null }
  },
  methods: {
    onKeyUp: function (event) {
      if (!(event.which == 38 || event.which == 40 || event.which == 13)) {
        this.searchKeyword = this.searchStr;
        if (!this.searchStr || this.searchStr == '') {
          this.showDropdown = false;
          this.lastSearchTerm = null;
        } else if (
          this.isNewSearchNeeded(this.searchStr, this.lastSearchTerm)
        ) {
          this.lastSearchTerm = this.searchStr;
          this.showDropdown = true;
          this.currentIndex = -1;
          this.results = [];

          if (this.searchTimer) {
            clearTimeout(this.searchTimer);
          }

          this.searching = true;

          this.searchTimer = setTimeout(() => {
            this.searchTimerComplete(this.searchStr);
          }, this.pause);
        }
      } else {
        event.preventDefault();
      }
    },
    isNewSearchNeeded: function (newTerm, oldTerm) {
      return newTerm.length >= this.minLength && newTerm != oldTerm;
    },
    searchTimerComplete: function (str) {
      if (str.length >= this.minLength) {
      }
    }
  }
};
</script>
<style scoped>
.angucomplete-holder {
  position: relative;
}
.angucompletekeyword-dropdown {
  border-color: #ececec;
  border-width: 1px;
  border-style: solid;
  border-radius: 2px;
  width: 100%;
  padding: 6px;
  cursor: pointer;
  z-index: 9999;
  position: absolute;
  background-color: #ffffff;
  box-shadow: 0 0 30px rgba(0, 0, 0, 0.2) !important;
}
.angucomplete-searching {
  color: #acacac;
  font-size: 14px;
}
.angucomplete-searching {
  color: #acacac;
  font-size: 14px;
}
.angucompletekeyword-dropdown .angucomplete-row {
  padding: 5px 21px;
  color: #000000;
  display: flex;
}
.angucomplete-title {
  font-weight: 500;
  font-size: 14px;
  float: left;
  margin-right: 7px;
}
.search_result_zipcode {
  font-size: 13px;
  color: #53b141;
}
.angucomplete-selected-row,
.angucomplete-row:hover {
  background-color: lightblue;
  color: #ffffff;
}
</style>

