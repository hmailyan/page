<template>
  <div class="body">
    <div class="container">
      <div class="row">

        <div class="col-md-8 col-md-offset-2">

          <h1>Create post</h1>

          <form >
            <div class="form-group">
              <label >Title <span class="require">*</span></label>
              <input type="text" v-validate="`required`" v-model="new_blog.title" class="form-control" name="title" />
              <h6 class="text-danger"> {{ errors.first('title') }}</h6>
            </div>

            <div class="form-group">
              <label >Description</label>
              <textarea rows="5" v-validate="`required`" v-model="new_blog.description" class="form-control" name="description" ></textarea>
              <h6 class="text-danger"> {{ errors.first('description') }}</h6>

            </div>

            <div class="form-group">

              <button  @click="add($event)" class="btn btn-primary">
                Create
              </button>

            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "addBlogs",
  data() {
    return {
      new_blog: {
        user_id: '',
        title: '',
        description: ''
      }
    }
  },
  methods: {
    add($event) {
      $event.preventDefault();
      this.$validator.validateAll()
        .then(res => {
          if (res) {
            this.new_blog.user_id = JSON.parse(localStorage.getItem('user')).id
            this.axios.post('http://127.0.0.1:8000/api/auth/add-blogs', this.new_blog, {
              headers: {
                "Authorization": `Bearer ${localStorage.getItem('token')} `
              }
            })
            .then(res => {
              this.$router.push({ name: "Blogs" }).catch(() => {})
            })
          }
        })
          return Object.keys(this.fields).every(field => this.fields[field].valid);
        }
    },

  }
</script>

<style scoped>

.require {
  color: #666;
}
label small {
  color: #999;
  font-weight: normal;
}
</style>
