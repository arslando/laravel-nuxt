<template>
  <div class="angucomplete-holder">
    <input
      id="sl_value"
      type="text"
      v-model="searchStr"
      v-on:keyup="onKeyUp"
      @keypress="onEnter($event)"
      placeholder="Indtast by eller postnummer"
      autocomplete="off"
      class="form-control form-control-small w-100"
    />
    <div
      id="sl_dropdown"
      class="angucompletekeyword-dropdown"
      v-if="showDropdown"
    >
      <div class="angucomplete-searching" v-if="searching">Søger...</div>
      <div
        class="angucomplete-searching"
        v-if="!searching && (!results || results.length == 0)"
      >
        Ingen resultater fundet
      </div>

      <div class="row ml-0 mr-0" v-if="c_results.length">
        <div class="col-lg-12 pl-0 pr-0">By</div>
        <div
          class="col-lg-12 angucomplete-row"
          v-for="(result, index) in c_results"
          :key="`c_result-${index}`"
          :class="{
            'angucomplete-selected-row':
              index + r_results.length == currentIndex
          }"
        >
          <div>
            <div class="angucomplete-title" v-if="matchClass">
              {{ result.title }},
              <span class="search_result_zipcode">{{ result.zipcode }}</span>
            </div>
            <div class="angucomplete-title" v-if="!matchClass">
              {{ result.title }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'SearchLocation',
  data() {
    return {
      searchStr: '',
      lastSearchTerm: null,
      minLength: 3,
      showDropdown: false,
      currentIndex: null,
      results: [],
      r_results: [],
      c_results: [],
      searchTimer: null,
      searching: false,
      pause: 300,
      searchKeyword: null
    };
  },
  props: {
    titlefield: { type: String, default: null },
    matchClass: { type: String, default: null }
  },
  methods: {
    onEnter: function (event) {
      if (event.charCode === 13) {
        this.$parent.keyword_search(this.searchKeyword, true);
        this.showDropdown = false;
        this.results = [];
        event.preventDefault();
        event.stopPropagation();
      }
    },
    onKeyUp: function (event) {
      if (event.which === 40) {
        if (this.results && this.currentIndex + 1 < this.results.length) {
          this.currentIndex++;
          console.log(this.results);
          this.selectResult(this.results[this.currentIndex]);
          event.preventDefault();
          event.stopPropagation();
        }
      } else if (event.which === 38) {
        if (this.currentIndex >= 1) {
          this.currentIndex--;
          this.selectResult(this.results[this.currentIndex]);
          event.preventDefault();
          event.stopPropagation();
        }
      } else if (event.which === 13) {
        if (
          this.results &&
          this.currentIndex >= 0 &&
          this.currentIndex < this.results.length
        ) {
          this.enter_edit_elem();
          event.preventDefault;
          event.stopPropagation();
        } else {
          this.results = [];
          event.preventDefault;
          event.stopPropagation();
        }
      } else if (event.which == 27) {
        this.results = [];
        this.showDropdown = false;
      } else if (event.which == 8) {
      }

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
        axios
          .get(`/auto_soege/${str}`)
          .then(res => {
            this.searching = false;
            this.processResults(res.data, str);
          })
          .catch(err => {});
      }
    },
    processResults: function (responseData, str) {
      if (responseData && responseData.length) {
        this.results = [];
        this.c_results = [];
        this.r_results = [];

        var titleFields = [];
        if (this.titlefield && this.titlefield != '') {
          titleFields = this.titlefield.split(',');
        }
        for (var i = 0; i < responseData.length; i++) {
          var titleCode = [];

          for (var t = 0; t < titleFields.length; t++) {
            titleCode.push(responseData[i][titleFields[t]]);
          }
          var is_region = responseData[i]['is_region'];
          var zipcode = responseData[i]['zipcode'];
          var text = titleCode.join(' ');

          var resultRow = {
            title: text,
            zipcode: zipcode
            // description: description,
            // image: image,
            // originalObject: responseData[i]
          };

          if (is_region) {
            this.r_results[this.r_results.length] = resultRow;
          } else {
            this.c_results[this.c_results.length] = resultRow;
          }
          this.results[this.results.length] = resultRow;
        }
      } else {
        this.results = [];
        this.c_results = [];
        this.r_results = [];
      }
    },
    selectResult: function (result) {
      console.log(result);
      if (this.matchClass) {
        result.title = result.title.toString().replace(/(<([^>]+)>)/gi, '');
      }
      this.searchStr = this.lastSearchTerm = result.title;
      this.searchKeyword = result.title;
    },
    enter_edit_elem: function () {
      this.$parent.keyword_search(this.searchKeyword, true);
      this.showDropdown = false;
      this.results = [];
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
.angucomplete-row {
  padding: 5px;
  color: #000000;
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
.search_result_zipcode {
  font-size: 13px;
  color: #53b141;
}
</style>

