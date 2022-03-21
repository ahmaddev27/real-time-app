class AppStorage{

    store(user,token){
        localStorage.setItem('user',user);
        localStorage.setItem('token',token);
    }

    clear(){
        localStorage.removeItem('token');
        localStorage.removeItem('user');
    }

    getToken(){

        return localStorage.getItem('token');
    }
    getUser(){
        return localStorage.getItem('user');
    }
}

export default AppStorage=new AppStorage();
