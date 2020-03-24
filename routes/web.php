<?php

use Illuminate\Support\Facades\Route;

// aula 13 e 14 rotas nomeadas no laravel 24/03
// no final da aula aos 16:41 ele viu que o codigo ficou muito grande, agora vamos fazer um codigo enxuto de toda a linha 45 a 77.

//criou a parte de admin mas não está com autenticação
//route::get('/admin/dashboard', function(){
 //   return 'Home Admin';
    // para proteger e autenticar inicialmente chamamos um middleware no final do metodo
//})->middleware('auth');

// não vai jogar para nada vai dar erro, sendo asim criamos uma rota com o nome de login

route:: get('/login', function (){
    return 'Login';
})->name('login');

//route::get('/admin/financeiro', function(){
  //  return 'Fianceiro Admin';
//})->middleware('auth');

//route::get('/admin/produtos', function(){
//    return 'Produtos Admin';
//})->middleware('auth');

//tem varios midlewares descritos no codigo para ficar mais enxuto podemos criar um grupo de midllewares

// route::middleware(['auth'])->group(function(){
    
//     route::get('/admin/dashboard', function(){
//         return 'Home Admin';
//     });
//     route::get('/admin/financeiro', function(){
//     return 'Fianceiro Admin';
//     });
//     route::get('/admin/produtos', function(){
//     return 'Produtos Admin';
//     });
// });


//se tiver que mudar a rota admin teria que mudar em todos é possivel otimizar colocando um prefixo assim:

/* route::middleware([])->group(function(){
  
    route::prefix('admin')->group(function(){
            
      route::namespace('Admin')->group(function(){
        
        route::name('admin.')->group(function() {
           
             //removendo o diretorio tambem do name. abaixo
            
            route::get('/dashboard', 'TesteController@teste')->name('dashboard');

            route::get('/financeiro', 'TesteController@teste')->name('financeiro');
    
            route::get('/produtos', 'TesteController@teste')->name('products');    

       
            //route::get('/dashboard', 'TesteController@teste')->name('admin.dashboard');

      //  route::get('/financeiro', 'TesteController@teste')->name('admin.financeiro');

       // route::get('/produtos', 'TesteController@teste')->name('admin.products');

        // se quiser acessar o / pode redirecionar para o admin dashboard
        //route::get('/', 'TesteController@teste')->name('admin.home');
        route::get('/', function(){
            return redirect()->route('admin.dashboard');
         })->name('home');
       });
    });
 });
}); */
//tudu isso acima foi resumido no codigo abaixo.
//fim da aula 13 e 14 abaixo *********
route::group([
    'middleware'=>[],
    'prefix'=>'admin',
    'namespace'=>'Admin', 
    'name'=>'admin.'
],    function () {
        route::get('/dashboard', 'TesteController@teste')->name('dashboard');

        route::get('/financeiro', 'TesteController@teste')->name('financeiro');

        route::get('/produtos', 'TesteController@teste')->name('products');

        route::get('/', function(){
            return redirect()->route('admin.dashboard');
         })->name('home');
    
});

// no final da aula aos 16:41 ele viu que o codigo ficou muito grande, agora vamos fazer um codigo enxuto de toda a linha 45 a 77.


            //route::get('/dashboard', function(){
        //return 'Home Admin';
    //});
   //fim da aula, só que o namespace ainda é Admin lá do controller, podemos fazer rotas ainda.
    //route::get('/financeiro', 'Admin\TesteController@teste');
   // route::get('/dashboard', 'Admin\TesteController@teste');
    //route::get('/financeiro', function(){
   // return 'Fianceiro Admin';
   // });
   // route::get('/produtos', function(){
  //  return 'Produtos Admin';
   // });
   // fica melhor passar um controler basta passar o nome do controller (rota) e o @ método (Teste) 
    // 
   // route::get('/','Admin\TesteController@teste');
    //route::get('/', function(){    
    //return 'Admin';
    //agora duplica os exemplos para os demais
 


// fim da aula 12
route:: get('/nome-url', function (){
    return 'hey hey hey';
})->name('url.name');

//sem passar o nome da rota fica mais facil atribuir um nome como abaixo
//route::get('redirect3', function () {
//    return redirect('/nome-url') ;
//});

route::get('redirect3', function () {
    return redirect()->route('url.name') ;
});


//maneira mais simples de fazer o abaixo, somente para views simples sem muita lógica se tiver que passar lógica o parametro está incorreto.
route::view('/view','welcome', ['id'=> 'teste']);


//route::get('/view', function(){
 //   return view('welcome');
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
