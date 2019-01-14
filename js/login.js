/**
 * Created by Kay on 2016/3/8.
 */
function login() {
    var username = document.getElementsByName("username")[0];
    var pwd = document.getElementsByName("password")[0];
 	console.log(username)
    if (username.value == "") {
        alert("请输入用户名");
    } else if (pwd.value  == "") {
        alert("请输入密码");
    } else if(username.value == "admin" && pwd.value == "123456"){
        window.location.href="index.html";
    } else {
        alert("请输入正确的用户名和密码！")
    }
}