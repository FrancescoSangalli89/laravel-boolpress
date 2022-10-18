<template>
  <header>
    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Boolpress</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li v-for="(item, index) in menuItems" class="nav-item" :key="index">
              <router-link class="nav-link active" :to="{name: item.routeName}">{{item.label}}</router-link>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
</template>

<script>
export default {
  name: "MyHeader",
  data() {
    return {
        menuItems: [
            {
                label: 'Homepage',
                routeName: 'homePage'
            },
            {
                label: 'Posts',
                routeName: 'postsPage'
            },
            {
                label: 'About Us',
                routeName: 'aboutUs'
            },
            {
                label: 'Contact',
                routeName: 'contact'
            }
        ]
    }
  }
};
</script>

<style>
</style>