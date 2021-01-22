<template>
  <div class="body">
    <div class="col-md-4 col-md-offset-4" id="login">
      <section id="inner-wrapper" class="login">
        <article>
          <form>

            <div class="form-group">
              <div>
                <input type="email" v-validate="`required|email`" v-model="user.email" name="email" class="form-control" placeholder="Email Address">
                <h6 class="text-danger"> {{ errors.first('email') }}</h6>
              </div>
            </div>

            <div class="form-group">
              <div >
                <input type="password" v-validate="`required|min:6`" v-model="user.password"  name="password"  class="form-control" placeholder="Password">
                <h6 class="text-danger"> {{ errors.first('password') }}</h6>
                <h5 class="text-danger" v-if="this.logon === 'false'" > Password or Login incorrect</h5>
                <h5 class="text-danger" v-if="this.logon === 'blocked'" > Admin is blocked you</h5>

              </div>
            </div>
            <button type="submit" @click="login($event)" class="btn btn-primary btn-block">Login</button>
          </form>
        </article>
      </section></div>
  </div>
</template>

<script>
export default {
  name: "Login",
  data() {
    return {
      user: {
        email: '',
        password: '',

      },
      logon: '',
    }
  },
  methods: {
    login($event) {
      $event.preventDefault();

      this.$validator.validateAll()
        .then(res => {
          if (res) {
            // console.log(this.user);


            this.axios.post('http://127.0.0.1:8000/api/auth/login', this.user)
              .then(res => {
                // console.log(res)
                let token = res.data.access_token
                localStorage.setItem('token', token);

                let config = {
                  headers: {
                    'Authorization': `Bearer ${token} `
                  }
                }
                this.axios.post('http://127.0.0.1:8000/api/auth/me', null, config)
                  .then(res => {
                    if (res.data.type === 'blocked') {
                      this.logon = 'blocked'
                      localStorage.removeItem('token')
                    }else {
                      let user = JSON.stringify(res.data)
                      localStorage.setItem('user', user);
                      localStorage.setItem('login', true)
                      this.$store.commit('setUser', res.data)
                      this.$router.push({name: "myProfile"}).catch(() => {
                      })
                    }
                  })
              })
            if (!localStorage.getItem('token')) {
              localStorage.setItem('login', false)
              this.logon = localStorage.getItem('login')
            }else {
              this.logon = localStorage.getItem('login')
            }
          }
        })

      return Object.keys(this.fields).every(field => this.fields[field].valid);
    }
  }
}
</script>

<style scoped>

#login {
  -webkit-perspective: 1000px;
  -moz-perspective: 1000px;
  perspective: 1000px;
  padding-top:80px;
  margin-left:30%;

}
.login {
  font-family: 'Josefin Sans', sans-serif;
  -webkit-transition: .3s;
  -moz-transition: .3s;
  transition: .3s;
  -webkit-transform: rotateY(40deg);
  -moz-transform: rotateY(40deg);
  transform: rotateY(40deg);
}
.login:hover {
  -webkit-transform: rotate(0);
  -moz-transform: rotate(0);
  transform: rotate(0);
}
.login article {

}
.login .form-group {
  margin-bottom:17px;
}
.login .form-control,
.login .btn {
  border-radius:0;
}
.login .btn {
  text-transform:uppercase;
  letter-spacing:3px;
}
.input-group-addon {
  border-radius:0;
  color:#fff;
  background:#f3aa0c;
  border:#f3aa0c;
}
.forgot {
  font-size:16px;
}
.forgot a {
  color:#333;
}
.forgot a:hover {
  color:#5cb85c;
}

#inner-wrapper, #contact-us .contact-form, #contact-us .our-address {
  color: #1d1d1d;
  font-size: 19px;
  line-height: 1.7em;
  font-weight: 300;
  padding: 50px;
  background: #fff;
  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
  margin-bottom: 100px;
}
.input-group-addon {
  color: #fff;
  background: #f3aa0c;
  border: #f3aa0c;
  border-right-color: rgb(243, 170, 12);
  border-right-style: none;
  border-right-width: medium;
}
</style>
