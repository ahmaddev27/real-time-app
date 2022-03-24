
let login = require('./components/auth/login.vue').default;
let signup = require('./components/auth/signup.vue').default;
let forum = require('./components/Forum.vue').default;
let logout = require('./components/auth/logout.vue').default;
let home = require('./components/Home.vue').default;
// let CreateEmployee = require('./components/Employee/create.vue').default;
// let AllEmployees = require('./components/Employee/index.vue').default;
//
//

export const routes = [
    { path: '/home', component: home, name:'home'},
    { path: '/login', component: login, name:'/'},
    { path: '/signup', component: signup, name:'signup'},
    { path: '/forum', component: forum, name:'forum'},
    { path: '/logout', component: logout, name:'logout'},

    // { path: '/create-employee', component: CreateEmployee, name:'create-employee'},
    // { path: '/all-employee', component: AllEmployees, name:'all-employee'},


]
