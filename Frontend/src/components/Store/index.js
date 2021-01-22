import Vue from "vue";
import Vuex from 'vuex';
import axios from "axios";
Vue.use(Vuex)
const store = new Vuex.Store({
  state: {
    user: null,
    blog: []
  },
  getters: {
    getBlog (state) {
      return state.blog
    }
  },
  actions: {

  },
  mutations: {
    setUser (state, user) {
      state.user = (user)
    },
    setBlog (state,data) {
      state.blog = data
    }
  }
})
export default store
