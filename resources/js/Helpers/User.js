import Token from './Token'
import AppStorage from './AppStorage'

class User {
    responseAfterLogin(res) {
        const access_token = res.data.access_token
        const user = res.data.user
        if (Token.isValid(access_token)) {
            AppStorage.store(user, access_token)
        }

    }
    hasToken(){
        const storeToken = AppStorage.getToken()
        if (storeToken) {
            return Token.isValid(storeToken)? true : false
        }
       return false
    }




    loggedIn() {
        return this.hasToken()
    }

    name(){
        if(this.loggedIn()){
            return AppStorage.getUser()
        }
    }
    id(){
        if(this.loggedIn()){
           const payload=Token.payload(AppStorage.getToken())
            return payload.sub
        }
    }

    logout() {
      AppStorage.clear()
    }


}
export default User = new User();
