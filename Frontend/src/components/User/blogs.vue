<template>
  <div class="body">
    <div class="container">
      <div class="row md-form">
        <div class="col-md-8 " v-for="blogs in blogs" >
          <div class="single-blog-item" v-for="(blog) in blogs">
            <div class="blog-content" >
              <h4>{{blog.title}}</h4>
              <p>{{blog.description}}</p>
              <button class=" btn btn-danger" v-if="admin === true" @click="deletePost(blog.id)">Delete</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "blogs",
  data() {
    return {
      blogs: [],
      del_id: {
        id: ''
      },
      admin: null
    }
  },
  computed: {
  },
  mounted() {
    let config = {
      headers: {
        'Authorization': `Bearer ${localStorage.getItem('token')} `
      }
    }
    this.axios.post('http://127.0.0.1:8000/api/auth/getDB', null,config)
      .then(res => {
        this.blogs.push(res.data)
        if (localStorage.getItem('user') && JSON.parse(localStorage.getItem('user')).type === 'admin' ) {
          this.admin = true
        }
      })

  },
  methods: {
    deletePost(post) {
        this.del_id.id = post
        this.axios.post('http://127.0.0.1:8000/api/auth/delete-blog', this.del_id)
          .then(res => {
            this.blogs = []
            this.axios.post('http://127.0.0.1:8000/api/auth/getDB', null,)
              .then(res => {
                this.blogs.push(res.data)
              })
          })
    },

  }
}
</script>

<style scoped>

img {
  width: 100%;
  height: auto;
}
.form-control {
  width: 800px;
}

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
