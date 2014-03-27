function ValRegister()
{
    var ValRet = 1;
    var InputUsername = document.getElementsByName("RegEmail");
    var InputPassword = document.getElementsByName("RegPassword");
    var InputComfirmPassword = document.getElementsByName("RegConfirmPassword");
    
    var ValUsername = document.getElementsByName("ValRegUsername");
    var ValPassword = document.getElementsByName("ValRegPassword");
    var ValComfirmPassword = document.getElementsByName("ValRegComfirmPassword");
    
    if(InputUsername.value.length < 1){
        ValUsername.innerHTML = "Email不能为空";
        ValRet = 0;
    }
    
    if(InputUsername.value.length < 10){
        ValUsername.innerHTML = "Email长度不能少于10个字节";
        ValRet = 0;
    }
    
    if(InputUsername.value.length > 50){
        ValUsername.innerHTML = "Email长度不能大于50个字节";
        ValRet = 0;
    }
    
    checkUserExist();
    
    if(InputPassword.value.length < 1){
        ValPassword.innerHTML = "密码不能为空";
        ValRet = 0;
    }
    
    if(InputPassword.value.length < 10){
        ValPassword.innerHTML = "密码长度不能少于10个字节";
        ValRet = 0;
    }
    
    if(InputPassword.value.length > 50){
        ValPassword.innerHTML = "密码长度不能大于50个字节";
        ValRet = 0;
    }
    
    if(InputComfirmPassword.value.length < 1){
        ValComfirmPassword.innerHTML = "验证密码不能为空";
        ValRet = 0;
    }
    
    if(InputComfirmPassword.value.length < 10){
        ValComfirmPassword.innerHTML = "验证密码长度不能少于10个字节";
        ValRet = 0;
    }
    
    if(InputComfirmPassword.value.length > 50){
        ValComfirmPassword.innerHTML = "验证密码长度不能大于50个字节";
        ValRet = 0;
    }
    if(ValRet == 0){
        return false;
    }
    if(InputPassword.value != InputComfirmPassword.value){
        ValComfirmPassword.innerHTML = "两次输入密码不一致";
        return false;
    }
    return true;
}

function ValLogin(){
    
    var ValRet = 1;
    var LoginUsername = document.getElementByName("LoginEmail");
    var LoginPassword = document.getElementByName("LoginPassword");
    
    var ValUsername = document.getElementByName("ValLoginName");
    var ValPassword = document.getElementByName("ValLoginPassword");
    
    if(InputUsername.value.length < 1){
        ValUsername.innerHTML = "Email不能为空";
        ValRet = 0;
    }
    
    if(InputUsername.value.length < 10){
        ValUsername.innerHTML = "Email长度不能少于10个字节";
        ValRet = 0;
    }
    
    if(InputUsername.value.length > 50){
        ValUsername.innerHTML = "Email长度不能大于50个字节";
        ValRet = 0;
    }
    
    if(InputPassword.value.length < 1){
        ValPassword.innerHTML = "密码不能为空";
        ValRet = 0;
    }
    
    if(InputPassword.value.length < 10){
        ValPassword.innerHTML = "密码长度不能少于10个字节";
        ValRet = 0;
    }
    
    if(InputPassword.value.length > 50){
        ValPassword.innerHTML = "密码长度不能大于50个字节";
        ValRet = 0;
    }
    
    if(ValRet != 0){
        return true;
    }else{
        return false;
    }
}


function checkUserExist(){
    var InputUsername = document.getElementsByName("RegEmail");
    
    if(InputUsername.length == 0){
        return;
    }
    
    var xmlhttp;
    if (window.XMLHttpRequest)
    {
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.open("POST","../check_user.php", true);
    xmlhttp.send("checkEmail="+InputUsername);
    xmlDoc=xmlhttp.responseXML;
    document.getElementsByName("ValRegUsername").innerHTML=xmlDoc;

}

function ValSearch()
{
    var search = document.getElementByNameId("searchtext");
    
    if(search.value.length == 0){
        return false;
    }else{
        return true;
    }
}