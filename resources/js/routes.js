
let login = require('./components/auth/login.vue').default;
// let register = require('./components/auth/register.vue').default;
// let forget = require('./components/auth/forget.vue').default;
// let logout = require('./components/auth/logout.vue').default;
let home = require('./components/Home.vue').default;
// let CreateEmployee = require('./components/Employee/create.vue').default;
// let AllEmployees = require('./components/Employee/index.vue').default;
//
//

export const routes = [
    { path: '/login', component: login, name:'/'},
    // { path: '/register', component: register, name:'register'},
    // { path: '/forget', component: forget, name:'forget'},
    // { path: '/logout', component: logout, name:'logout'},
    { path: '/home', component: home, name:'home'},
    // { path: '/create-employee', component: CreateEmployee, name:'create-employee'},
    // { path: '/all-employee', component: AllEmployees, name:'all-employee'},


]