<template>
  <div class="body">
    <div class="container">
      <div class="row">

        <div  class="single-blog-item">
          <div class="panel panel-default">
            <div class="panel-heading">  <h3 >User Profile</h3></div>
            <div class="panel-body">

              <div class="box box-info">

                <div class="box-body">
                  <div class="col-sm-6">
                    <div  align="center"> <img alt="User Pic" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive">

                      <input id="profile-image-upload" class="hidden" type="file">
                      <div style="color:#999;" >click here to change profile image</div>
                      <!--Upload Image Js And Css-->

                    </div>

                    <br>

                    <!-- /input-group -->
                  </div>

                  <div class="clearfix"></div>
                  <hr style="margin:5px 0 5px 0;">


                  <div class="col-sm-5 col-xs-6 tital " >Name:</div><div class="col-sm-7 col-xs-6 ">{{user.name}}</div>
                  <div class="clearfix"></div>
                  <div class="bot-border"></div>

                  <div class="col-sm-5 col-xs-6 tital " >Surname:</div><div class="col-sm-7"> {{ user.surname }}</div>
                  <div class="clearfix"></div>
                  <div class="bot-border"></div>

                  <div class="col-sm-5 col-xs-6 tital " >Email:</div><div class="col-sm-7">{{user.email }}</div>
                  <div class="clearfix"></div>
                  <div class="bot-border"></div>

                  <div class="col-sm-5 col-xs-6 tital " >Age:</div><div class="col-sm-7">{{ user.age }}</div>

                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
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
  name: "myProfile",
  data() {
    return {

    }
  },
  computed: {
    user() {
        let user_data = localStorage.getItem('user')
        if (user_data) {
          user_data = JSON.parse(user_data)
        } else {
          this.$router.push({name: "Login"}).catch(() => {
          })
        }
        return this.$store.getters.getUser || user_data
    }
  },
  mounted() {
    let token = localStorage.getItem('token')
    let config = {
      headers: {
        'Authorization': `Bearer ${token} `
      }
    }
    this.axios.post('http://127.0.0.1:8000/api/auth/me', null,config)
      .then(res => {
        this.$store.commit('setUser', res.data)
      })
  }
}

</script>

<style scoped>

.container{

  width: 500px;
}
input.hidden {
  position: absolute;
  left: -9999px;
}

#profile-image1 {
  cursor: pointer;

  width: 100px;
  height: 100px;
  border:2px solid #03b1ce ;}
.tital{ font-size:16px; font-weight:500;}
.bot-border{ border-bottom:1px #f8f8f8 solid;  margin:5px 0  5px 0}
.single-blog-item {
  border: 1px solid #dfdede;
  box-shadow: 2px 5px 10px #dfdede;
  margin: 15px auto;
  padding: 5px;
  position: relative;
  background-color: white;
}
</style>
