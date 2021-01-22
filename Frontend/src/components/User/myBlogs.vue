<template>
  <div class="body">
    <div class="container">
      <div class="row">
        <div class="col-md-8" v-for="blogs in blogs" >
          <div class="single-blog-item" v-for="blog in blogs" v-if="blog.user_id === id">
            <div class="blog-content" >
              <div v-if="active_row[blog.id]">
                <input type="text" class="form-control" v-model="edit_blog.title"  >
              </div>
              <h4 v-else><a href="#" >{{blog.title }}</a></h4>

              <div v-if="active_row[blog.id]">
                <input type="text" class="form-control" v-model="edit_blog.description" >
              </div>
              <p v-else>{{blog.description}}</p>

              <div v-if="active_row[blog.id]">
              <button class=" btn btn-danger" @click="cancelCreate" >Cancel</button>
              <button class="btn btn-success" @click="saveCreate(blog.id)">Save</button>
              </div>

              <div v-else>
                <button class=" btn btn-danger"  @click="deletePost(blog.id)">Delete</button>
                <button class="btn btn-success"  @click="editPost(blog.id)" >Create</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "myBlogs",
  data() {
    return {
      blogs: [],
      id: null ,
      del_id: {
        id: ''
      },
      edit_blog: {
        id: '',
        title: '',
        description: ''
      },
      active_row: {}
    }
  },
  computed: {

  },
  mounted() {
    this.id = JSON.parse(localStorage.getItem('user')).id
    this.axios.post('http://127.0.0.1:8000/api/auth/getDB', )
      .then(res => {
        this.blogs.push(res.data)
      })
  },
  methods: {
    deletePost(post) {
      this.del_id.id = post
      this.axios.post('http://127.0.0.1:8000/api/auth/delete-blog', this.del_id)
      .then(res => {
      })
      this.$router.push({ name: "Blogs" }).catch(() => {})
    },
    editPost(blog_id) {
      this.edit_blog.id = blog_id
      this.$set(this.active_row, blog_id, true)
      console.log(this.blogs)
    },
    cancelCreate() {
      this.active_row = {}
    },
    saveCreate(blog_id) {
      this.axios.post('http://127.0.0.1:8000/api/auth/createPost', this.edit_blog)
      .then(res => {
        this.blogs = []
        this.active_row = {}
        this.axios.post('http://127.0.0.1:8000/api/auth/getDB', )
          .then(res => {
            this.blogs.push(res.data)
          })
      })

    }
  },
}
</script>

<style scoped>
img {
  width: 100%;
  height: auto;
}
.form-control {
  margin-bottom: 5px;
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
