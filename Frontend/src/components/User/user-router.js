import myProfile from "./myProfile";
import addBlogs from "./addBlogs";
import Blogs from "./blogs";
import myBlogs from "./myBlogs";

export default [
  {
    path: '/my-profile',
    name: 'myProfile',
    component: myProfile
  },
  {
    path: '/add-blogs',
    name: 'addBlogs',
    component: addBlogs
  },
  {
    path: '/blogs',
    name: 'Blogs',
    component: Blogs
  },
  {
    path: '/my-blogs',
    name: 'myBlogs',
    component: myBlogs
  }
]
