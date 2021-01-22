<template>
  <div class="body">
    <div class="container">
      <div class="row">
        <div class="col-md-4" v-for="users in users" >
          <div class="single-blog-item" v-for="user in users" v-if="user.type !== 'admin'" >
            <div class="blog-content"  >
              <h4><a href="#">{{user.name }}</a></h4>
              <p>Surname: {{user.surname}}</p>
              <p>Email: {{user.email}}</p>
              <p>Age: {{user.age}}</p>
              <button class=" btn btn-danger" v-if="user.type == 'user'" @click="blocker(user.id)" >Block</button>
              <button class=" btn btn-success" v-if="user.type == 'blocked'" @click="unBlock(user.id)" >Unblock</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "users",
  data() {
    return {
      users: [],
      block: {
        id: ''
      }
    }
  },
  mounted() {
    if(JSON.parse(localStorage.getItem('user')).type === 'admin') {
      let config = {
        headers: {
          'Authorization': `Bearer ${localStorage.getItem('token')} `
        }
      }
      this.axios.post('http://127.0.0.1:8000/api/auth/getUsers', null, config)
        .then(res => {
          this.users.push(res.data)
        })
    }else {
      this.$router.push({ name: "myProfile" }).catch(() => {})
    }
  },

  methods: {
    blocker(id) {
      this.block.id = id
      this.axios.post('http://127.0.0.1:8000/api/auth/blockUser',this.block )
        .then(res => {
          this.axios.post('http://127.0.0.1:8000/api/auth/getUsers', null,)
            .then(res => {
              this.users = []
              this.users.push(res.data)})
        })
    },
    unBlock(id) {
      this.block.id = id
      this.axios.post('http://127.0.0.1:8000/api/auth/unBlockUser',this.block )
        .then(res => {
          this.axios.post('http://127.0.0.1:8000/api/auth/getUsers', null,)
            .then(res => {
              this.users = []
              this.users.push(res.data)})
        })


    }
  }
}
</script>

<style scoped>
.single-blog-item {
  border: 1px solid #dfdede;
  box-shadow: 2px 5px 10px #dfdede;
  margin: 15px auto;
  padding: 5px;
  position: relative;
}
.blog-content {
  padding: 15px;
  background-color: white;
}
.blog-content h4 {
  font-size: 16px;
  font-weight: 500;
  margin-bottom: 10px;
  text-transform: uppercase;
}
.blog-content h4 a{
  color:#777;
}
.blog-content p{
  color: #999;
  font-size: 14px;
  font-weight: 300;
  line-height: 1.3333;
}

</style>
