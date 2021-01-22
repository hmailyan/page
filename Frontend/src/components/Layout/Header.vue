<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <a class="navbar-brand"  :to="{name: 'Blogs'}"><router-link class="nav-link" style="color: white" :to="{name: 'Blogs'}"> Blogs</router-link></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item" v-if="this.login === 'true'" >
            <router-link class="nav-link"  :to="{name: 'myProfile'}"> My Profile</router-link>
          </li>
          <li class="nav-item" v-if="this.login === 'true'">
            <router-link class="nav-link" :to="{name: 'myBlogs'}"> My Blogs</router-link>
          </li>
          <li class="nav-item" v-if="this.login === 'true'">
            <router-link class="nav-link" :to="{name: 'addBlogs'}"> Add Blogs</router-link>
          </li>
          <li class="nav-item" v-if="this.login === 'true' && this.admin === true">
            <router-link class="nav-link" :to="{name: 'Users'}"> Users</router-link>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <ul class="navbar-nav mr-auto" v-if="this.login === 'false'">
            <li class="nav-item"  >
              <router-link class="nav-link" :to="{name: 'Login'}"> Login</router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" :to="{name: 'Signup'}"> Signup</router-link>
            </li>

          </ul>
          <ul class="navbar-nav mr-auto" v-else>
            <li class="nav-item">

            </li>
            <li class="nav-item">
              <router-link class="nav-link" :to="{name: 'Logout'}"> Logout</router-link>
            </li>
          </ul>
        </form>
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  name: "Header",
  data() {
    return {
      login: '',
      admin: ''
    }
  },

  methods: {

  },
  mounted() {
    setInterval(()=>{
      this.login = localStorage.getItem('login')
      if (JSON.parse(localStorage.getItem('user')).type === 'admin') {
        this.admin = true
      }
    },1000);
  }
}
</script>

<style scoped>

</style>
