<template>
 <div class="body">
     <div class="modal-content">
       <p class="text">
         Do you really want to leave</p>
       <button class="yes btn btn-success" @click="yes">Yes</button>
       <button class="no btn btn-danger" @click="no">No</button>
     </div>
 </div>
</template>

<script>
export default {
  name: "logout",
  data() {
    return {
      show: false
    };
  },
  methods: {
    yes() {
      localStorage.setItem('login', false)
      localStorage.removeItem('token')
      localStorage.removeItem('user')
      this.$router.push({ name: "Login" }).catch(() => {})
    },
    no() {
      this.$router.push({ name: "myProfile" }).catch(() => {})
    }
  },
}
</script>


<style  scoped>
/* Modal Content */

.modal-content {

  background-color: #03b1ce;
  margin: auto;
  padding: 20px;
  padding-top: 200px;
  border: 0px;

}
.text {
  text-align: center;
}
.close {
  text-align: right;
}

</style>

