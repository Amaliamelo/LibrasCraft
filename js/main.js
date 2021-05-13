$(document).ready(function(){
    
    $("#logar").click(function(){ // para criptografar a senha
        senha_md5=$.md5($("#senha").val());//pega a senha e codifica para a variavel md5
        $("#senha").val(senha_md5); // muda o valor da senha para md5(32 caracteres)
        console.log(senha_md5);
        $("#form_login").submit(); 
    })
});