<template>
  <header class="transparent-header nav-on-top fixed-top fixed-top-new">
    <div class="main-nav xs-p-0 pt-0 pb-0">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <nav
              class="navbar navbar-expand-lg nav-secondary nav-primary-hover nav-line-active"
            >
              <a class="navbar-brand" href="/"
                ><img class="nav-logo" src="logo.png" alt="ledigbolig logo"
              /></a>
            </nav>
          </div>
          <div class="col-lg-6 d-flex justify-content-end align-items-center">
            <ul class="nav-bar-top right sm-mx-none d-flex">
              <li class="nav-item menu-item">
                <a class="nav-link" href="/lejeboliger"> Søg bolig</a>
              </li>
              <li class="nav-item menu-item">
                <a class="nav-link" href="" ui-sref="landlord.bolig.create">
                  Udlej bolig</a
                >
              </li>
              <li class="nav-item menu-item">
                <a class="nav-link" href="" ui-sref="login"> Log ind</a>
              </li>
              <li class="nav-item menu-item">
                <a class="nav-link" href="" ui-sref="register"> Opret bruger</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </header>
</template>

<script>
export default {
  name: 'AppSecondHeader'
};
</script>
<style lang="scss" scoped>
.nav-on-top {
  animation-fill-mode: both;
  width: 100%;
  z-index: 999;
  top: 10px;
  position: absolute;
}
.nav-logo {
  height: 50px;
}
.nav-bar-top.right {
  float: right;
}
.nav-bar-top.right li:first-child {
  margin-left: 0;
}
.nav-bar-top li {
  line-height: 40px;
}
.menu-item a.nav-link {
  color: #fff;
  font-size: 15px;
}
header.fixed-top {
  position: fixed !important;
  top: -1px;
  right: 0;
  left: 0;
  z-index: 991;
  animation-duration: 1s;
  animation-name: menu-sticky;
  animation-timing-function: ease-in-out;
  margin: 0;
  box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.2);
  border: none;
}
.fixed-top-new {
  animation-duration: inherit !important;
  animation-name: inherit !important;
  animation-timing-function: unset !important;
}
.transparent-header-modern.fixed-top,
.transparent-header.fixed-top {
  /* background-color: var(--theme-dark-color); */
  background-color: #fff;
  padding: 0 !important;
}
.transparent-header.fixed-top .menu-item a {
  color: #000;
  &:hover {
    color: #53b141;
  }
}
.transparent-header.fixed-top .menu-item {
  border-bottom: 3px solid transparent;
  &:hover {
    border-bottom: 3px solid #1fc341;
  }
}

</style>
