import Login from "./Login";
import Signup from "./Signup";
import Logout from "./Logout";

export default  [
  {
    path: '',
    redirect: {name: 'Login'}
  },
  {
    path: '/login',
    name: 'Login',
    component: Login
  },
  {
    path: '/signup',
    name: 'Signup',
    component: Signup
  },
  {
    path: '/logout',
    name: 'Logout',
    component: Logout
  }
]
