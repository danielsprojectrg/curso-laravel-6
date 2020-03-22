<?php

use Illuminate\Support\Facades\Route;

//maneira mais simples de fazer o abaixo, somente para views simples sem muita lógica se tiver que passar lógica o parametro está incorreto.
route::view('/view','welcome', ['id'=> 'teste']);


//route::get('/view', function(){
    return view('welcome');
//});

// redirecionamento de rotas mais limpo que o outro, o abaixo
route::redirect('/redirect1', 'redirect2');
// //aula 12 rotas redirect e view
// route::get('redirect1', function () {
//     return redirect('/redirect2');
// });

//aula 12 rotas redirect e view
route::get('redirect2', function () {
    return 'redirect 02';
});

//aula 11 rotas com parametros
route::get('/ponto/{idponto?}', function ($idponto= '') {
    return "Pontos(s) {$idponto}";
});

//aula 11 rotas com parametros
route::get('/categorias/{flag}/posts', function ($flag) {
    return "Posts da Categoria: {$flag}";
});

//aula 10 rotas com parametros
route::get('/categorias/{flag}', function ($flag) {
    return "Produtos da Categoria: {$flag}";
});

// aula 09 introcução rotas
route::get('/empresa', function () { 
    return 'Detalhes da Empresa';
});

// aula 09 introcução rotas
route::get('/produtos', function () { 
    return 'Sobre os Produtos';
});

// aula 09 introcução rotas, não precisa colocar . blade .php
route::get('/contato', function () { 
    return view('contact');
});

// aula 09 introcução rotas, não precisa colocar . blade .php, com subdiretorio
//route::get('/contato', function () { 
//    return view('site.contact');
//});

Route::get('/', function () {
    //return view('welcome');
    return 'Olá';
});
